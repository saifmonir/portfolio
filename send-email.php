<?php
header('Content-Type: text/html; charset=UTF-8');

$recipientEmail = 'your-email@example.com';

function sanitizeInput($value) {
    return trim(strip_tags($value));
}

function redirectWithMessage($type, $message) {
    $redirectUrl = 'index.html';
    $query = http_build_query(['status' => $type, 'message' => $message]);
    header('Location: ' . $redirectUrl . '?' . $query);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirectWithMessage('error', 'Invalid request method.');
}

if (!isset($_POST['full_name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
    redirectWithMessage('error', 'Please complete all required fields.');
}

$fullName = sanitizeInput($_POST['full_name']);
$email = sanitizeInput($_POST['email']);
$subject = sanitizeInput($_POST['subject']);
$message = sanitizeInput($_POST['message']);

if ($fullName === '' || $email === '' || $subject === '' || $message === '') {
    redirectWithMessage('error', 'All fields are required.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirectWithMessage('error', 'Please enter a valid email address.');
}

$subjectLine = 'Portfolio Contact: ' . $subject;

$body = "Name: {$fullName}\n";
$body .= "Email: {$email}\n\n";
$body .= "Subject: {$subject}\n\n";
$body .= "Message:\n{$message}\n";

$headers = [];
$headers[] = 'From: no-reply@localhost';
$headers[] = 'Reply-To: ' . $email;
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-Type: text/plain; charset=UTF-8';

$sent = mail($recipientEmail, $subjectLine, $body, implode("\r\n", $headers));

if ($sent) {
    redirectWithMessage('success', 'Thank you! Your message has been sent successfully.');
}

redirectWithMessage('error', 'Sorry, your message could not be sent at this time. Please try again later.');
