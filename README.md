# Personal Portfolio Website

A clean and professional personal portfolio website built with HTML5, CSS3, and PHP.

## Features

- Responsive portfolio layout for desktop, tablet, and mobile devices
- Header with cover image, profile photo, name, designation, and workplace
- Sticky top navigation menu
- Project gallery with project cards and descriptions
- Qualification section for education and achievements
- Experience timeline for work history
- Contact form with PHP email processing

## Project Structure

```text
.
├── index.html
├── style.css
├── script.js
├── send-email.php
└── README.md
```

## Files Overview

- `index.html` - Main portfolio page structure
- `style.css` - Layout, themes, responsiveness, and styling
- `script.js` - Mobile navigation toggling and form status handling
- `send-email.php` - Server-side PHP email processing

## Setup

1. Clone or download this repository.
2. Make sure PHP is installed on your machine.
3. Open the project folder in a terminal.
4. Start a local PHP server:

```bash
php -S localhost:8000
```

5. Open the following URL in your browser:

```text
http://localhost:8000
```

## Configure Email Recipient

Open `send-email.php` and replace the placeholder email with your own recipient address:

```php
$recipientEmail = 'your-email@example.com';
```

Example:

```php
$recipientEmail = 'hello@yourdomain.com';
```

## Contact Form

The contact form submits to `send-email.php` and validates:

- required fields
- valid email address
- sanitized input values
- proper server-side submission

The form uses the sender's email as the `Reply-To` header and sends the message to the configured recipient.

## Notes

- The PHP `mail()` function requires a working mail server configuration.
- On local machines, `mail()` may not work without server-side mail setup.
- For production environments, using SMTP with PHPMailer is recommended for reliable email delivery.

## License

This project is open for personal and educational use.
