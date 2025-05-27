<?php require_once(__DIR__."/path.php")?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас — Божья Нива</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once(__DIR__ . "/../app/include/header.php") ?>

    <main class="container">
        <section class="section">
            <h2>Ближайшие события</h2>

            <!-- Плейсхолдер, если нет событий -->
            <p class="placeholder">События пока не добавлены. Следите за обновлениями!</p>

            <!-- Когда появятся события, сюда вставляются карточки -->
            <div class="events-list">
                <!-- Карточки событий будут динамически добавляться -->
            </div>
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
