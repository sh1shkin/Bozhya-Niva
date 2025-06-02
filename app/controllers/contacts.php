<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['send'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    $to = "maksim_shishkin_04@inbox.ru";
    $subject = "Новое сообщение с сайта Божья Нива";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    $fullMessage = "Имя: $name\nEmail: $email\n\nСообщение:\n$message";

    if (mail($to, $subject, $fullMessage, $headers)) {
        $success = true;
    } else {
        $error = true;
    }
}
?>
