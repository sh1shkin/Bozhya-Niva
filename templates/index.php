<?php require_once(__DIR__."/path.php")?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Божья Нива</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900display=swap" rel="stylesheet">
        
</head>
<body class="initial-load">
    <?php require_once(__DIR__ . "/../app/include/header.php") ?>

    <main class="container">
        <section id="events" class="section">
            <h2>Ближайшие события</h2>
            <p class="placeholder">События пока не добавлены</p>
        </section>

        <section id="videos" class="section">
            <h2>Последние видео</h2>
            <p class="placeholder">Видео пока не добавлены</p>
        </section>
    </main>


    <script src="../assets/js/burger.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/activeLink.js"></script>
    

</body>
</html>
