<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Set the recipient email address
    $to = "miladmo68@gmail.com";

    // Set the email subject
    $email_subject = "New Contact Form Message: $subject";

    // Set the email body
    $email_body = "You have received a new message from the contact form.\n\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Message:\n$message";

    // Set headers
    $headers = "From: info@miladweb.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>document.querySelector('.sent-message').style.display = 'block';</script>";
    } else {
        echo "<script>document.querySelector('.error-message').style.display = 'block';</script>";
    }
}
?>
