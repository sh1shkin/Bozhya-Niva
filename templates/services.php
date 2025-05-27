<?php require_once(__DIR__."/path.php")?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Богослужения — Божья Нива</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900display=swap" rel="stylesheet">
</head>
<body>
   <?php require_once(__DIR__ . "/../app/include/header.php") ?>

    <main class="container">
        <section class="section">
            <h2>Расписание богослужений</h2>

            <!-- Плейсхолдер до появления данных -->
            <p class="placeholder">Расписание пока не добавлено. Следите за обновлениями.</p>

            <!-- Блок для будущей динамической таблицы -->
            <div class="schedule-container">
                <!-- Таблица будет добавлена администратором -->
            </div>
        </section>

        <section class="section">
            <h2>Место проведения</h2>
            <p>Все служения проходят в молитвенном зале по адресу:<br><strong>г. Липецк, ул. Ударинкова, д. 24А</strong></p>
        </section>

        <section class="section invitation">
            <h2>Приглашаем вас!</h2>
            <p>Мы рады видеть вас на наших служениях. Независимо от того, давно ли вы в вере или только в поиске — приходите, вы найдёте здесь поддержку и слово от Бога.</p>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 Божья Нива. Все права защищены.</p>
            <p><a href="#">Политика конфиденциальности</a></p>
        </div>
    </footer>
    <script src="../assets/js/burger.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/activeLink.js"></script>
    <script src="<?= BASE_URL ?>/assets/js/drop.js"></script>
</body>
</html>
