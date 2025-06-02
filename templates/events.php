<?php require_once(__DIR__."/path.php"); ?>
<?php require_once (__DIR__."/../app/controllers/posts.php"); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас — Божья Нива</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/event.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php require_once(__DIR__ . "/../app/include/header.php") ?>

<main class="container mt-5">
    <section class="section">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold">Все посты</h2>
        </div>

        <!-- Сетка карточек -->
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <?php foreach ($allPosts as $post): ?>
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <img src="../uploads/1748478492_image_1.jpg" class="card-img-top" alt="Изображение">
                        <div class="card-body">
                            <h5 class="card-title post-card-title"><?= htmlspecialchars($post["posts_title"]) ?></h5>
                            <p class="card-text text-muted"><?= htmlspecialchars($post["posts_content"]) ?></p>
                            <a href="cards.php?id=<?= $post['posts_id'] ?>" class="btn btn-warning mt-3">Подробнее</a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </section>
</main>

<?php require_once("../app/include/footer.php")?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/drop.js"></script>
<script src="../assets/js/burger.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/activeLink.js"></script>
</body>
</html>