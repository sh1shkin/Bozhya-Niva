<?php

    require_once(__DIR__ . "/../database/database.php");
    require_once(__DIR__ . "/../controllers/userSession.php");
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btn-create-users'])) {
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passFirst = trim($_POST['firstPassword']);
    $passLast = trim($_POST['secondPassword']);

    if($login == "" || $email == "" || $passFirst == "" || $passLast == "") {
        $errorMsg = "Некоторые поля пустые, пожалуйста заполните их";
    } elseif(mb_strlen($login) < 5) {
        $errorMsg = "Логин не может быть меньше 5 символов";
    } elseif(mb_strlen($passFirst) < 5 || mb_strlen($passLast) < 5) {
        $errorMsg = "Пароль не может быть меньше 5 символов";
    } elseif ($passFirst !== $passLast) {
        $errorMsg = "Пароли не совпадают";
    } else {
        $existens = selectOne("admins", ['admins_email'=>trim($email)]);
        if($existens && $existens['admins_email'] === $email) {
            $errorMsg = "Такой пользователь уже существует";
        } else {
            $admins = [
                'admins_name' => $login,
                'admins_email' => $email,
                'admins_password_hash' => password_hash($passFirst, PASSWORD_DEFAULT),
                'admins_created_at' => date("Y-m-d H:i:s"),
                'admins_root' => 0
            ];
            $id = Insert("admins", $admins);
            $admin = selectOne("admins", ['admins_id'=>$id]);
        }
    }
}