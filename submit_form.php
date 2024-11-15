<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize the input data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Simple Validation
    if(empty($name) || empty($email) || empty($message)) {
        echo "Please fill out all required fields.";
        exit;
    }

    // Set the recipient email (replace with your actual email address)
    $to = "your-email@example.com";
    $subject_line = "New Contact Form Submission: " . $subject;
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Create the email content
    $email_body = "<html><body>";
    $email_body .= "<h2>Contact Form Submission</h2>";
    $email_body .= "<p><strong>Name:</strong> " . $name . "</p>";
    $email_body .= "<p><strong>Email:</strong> " . $email . "</p>";
    $email_body .= "<p><strong>Phone:</strong> " . $phone . "</p>";
    $email_body .= "<p><strong>Subject:</strong> " . $subject . "</p>";
    $email_body .= "<p><strong>Message:</strong><br>" . nl2br($message) . "</p>";
    $email_body .= "</body></html>";

    // Send the email
    if (mail($to, $subject_line, $email_body, $headers)) {
        // Redirect to a thank-you page or display a success message
        header('Location: thank_you.html');
        exit;
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
}
?>
