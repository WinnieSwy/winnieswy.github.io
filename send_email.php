<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject_input = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    // Your Email Address
    $recipient = "winnie.swy1212@gmail.com";

    // Email Content
    $subject = "$subject_input";
    $email_content = "Name: $name\n";
    $email_content .= "From: $email\n";
    $email_content .= "Message:\n$message\n";

    // Email Headers
    $email_headers = "From: $name <$email>";

    // Send the email
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        echo "<script>alert('Thank you! Your message has been sent.'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Oops! Something went wrong.'); window.history.back();</script>";
    }
} else {
    header("Location: index.html");
}
?>