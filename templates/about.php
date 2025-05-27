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
            <h2>О нашей церкви</h2>
            <p>Церковь "Божья Нива" — это община людей, объединённых верой, любовью и служением. Мы стремимся не только проводить богослужения, но и поддерживать каждого, кто приходит к нам в поисках истины, утешения или надежды.</p>

            <p>Наша история началась двадцать лет назад с небольшой группы верующих. Сегодня это — духовный дом для множетсва людей, место, где звучит живое слово Божье, где молятся, поют, служат и растут.</p>

            <p>Мы открыты для всех: для тех, кто давно в вере, и для тех, кто только начинает свой путь. Добро пожаловать в Божью Ниву!</p>
        </section>

        <section class="section">
            <h2>Наши ценности</h2>
            <ul class="about-list">
                <li><strong>Вера:</strong> Слово Божье как основа жизни.</li>
                <li><strong>Любовь:</strong> К Богу и друг к другу.</li>
                <li><strong>Служение:</strong> Помощь ближнему, забота о слабых.</li>
                <li><strong>Рост:</strong> Духовное развитие, ученичество, единство в истине.</li>
            </ul>
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
