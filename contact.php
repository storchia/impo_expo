<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $message = trim($_POST["message"]);

    // Validate the form data
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($phone)) {
        echo "Invalid form data. Please fill out the form correctly.";
        exit;
    }

    // Set the recipient email address
    $recipient = "sergiotorchia@hotmail.com"; // Replace with your email address

    // Set the email subject
    $subject = "New Contact Form Submission from $name";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers
    $email_headers = "From: $name <$email>";

    // Send the email
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        echo "Thank you for your message. We'll be in touch soon!";
    } else {
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
}
?>
