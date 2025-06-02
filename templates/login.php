<?php
require_once(__DIR__ . "/../app/controllers/userSession.php");
require_once(__DIR__ . "/../app/database/database.php");
require_once(__DIR__ . "/path.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Божья Нива</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/regstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900display=swap" rel="stylesheet">
</head>
<body class="initial-load">

<?php require_once(__DIR__ . "/../app/include/header.php") ?>

<!-- ✅ Вывод ошибок -->


<h1 class="form-title">Авторизация</h1>


<div class="form-wrapper">
    <div class="form-container">
        <?php if (isset($_SESSION['errorMsg'])): ?>
            <div class="form-error-box">
                <span class="form-error-icon">⚠️</span>
                <span class="form-error-text"><?= htmlspecialchars($_SESSION['errorMsg']) ?></span>
            </div>
            <?php unset($_SESSION['errorMsg']); ?>
        <?php endif; ?>
        <h1 class="form-title">Авторизация</h1>
        <form class="registration-form" action="../app/controllers/controllerLogin.php" method="post" novalidate>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="example@mail.com" required />
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" id="password" name="password" class="form-input" placeholder="Не менее 8 символов" required />
            </div>

            <button type="submit" class="submit-btn" name="button-aut">Авторизоваться</button>
        </form>
    </div>
</div>

<footer>
    <div class="container">
        <p>&copy; 2025 Божья Нива. Все права защищены.</p>
        <p><a href="#">Политика конфиденциальности</a></p>
    </div>
</footer>

<script src="../assets/js/burger.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/activeLink.js"></script>

</body>
</html>
