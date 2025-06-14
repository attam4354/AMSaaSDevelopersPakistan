<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $data = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message\n------------------\n";
    file_put_contents("contacts.txt", $data, FILE_APPEND | LOCK_EX);

    // Redirect with message
    echo "<script>alert('Thank you for contacting us!'); window.location.href='index.html';</script>";
    exit();
}
?>
