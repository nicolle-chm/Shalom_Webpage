<?php
$name = htmlspecialchars($_POST['name']);
$visitor_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : '';
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);

$email_from = 'info@shalomlima.xyz';
$email_subject = 'New Form Submission';
$email_body = "User Name: $name\n".
              "User Email: $visitor_email\n".
              "Subject: $subject\n".
              "User Message:\n$message\n";

$to = 'nicolle.chm3@gmail.com';
$headers = "From: $email_from\r\n" .
           "Reply-to: $visitor_email\r\n" .
           "Content-Type: text/plain; charset=UTF-8\r\n";

try {
    if ($visitor_email !== '') {
        mail($to, $email_subject, $email_body, $headers);
        header("Location: contact.html");
        exit();
    } else {
        echo "Invalid email address";
    }
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
?>


