<?php
    require_once("userSession.php");
    require_once(__DIR__ . "/../database/database.php");
    require_once("../../templates/path.php");

    // Очищаем предыдущее сообщение об ошибке
    unset($_SESSION['errorMsg']);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["button-aut"])) {
        $email = mb_strtolower(trim($_POST["email"]));
        $password = trim($_POST["password"]);

        // Валидация
        if ($email === "" || $password === "") {
            $_SESSION['errorMsg'] = "Не все поля заполнены";
        } elseif (mb_strlen($email) < 5) {
            $_SESSION['errorMsg'] = "Почта не может быть короче 8 символов";
        } elseif (mb_strlen($password) < 5) {
            $_SESSION['errorMsg'] = "Пароль не может быть короче 8 символов";
        } else {
            $admin = selectOne('admins', ['admins_email' => $email]);

            if ($admin && password_verify($password, $admin["admins_password_hash"])) {
                loginAdmin($admin);
                exit();
            } else {
                $_SESSION['errorMsg'] = "Неверный логин или пароль";
            }
        }

        // Если есть ошибка - возвращаем на форму авторизации
        if (isset($_SESSION['errorMsg'])) {
            header("Location: " . BASE_URL . "/templates/login.php"); // Укажите правильный путь
            exit();
        }
    }