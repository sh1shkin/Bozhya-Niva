<?php
require_once(__DIR__ . "/../app/database/database.php");
require_once(__DIR__ . "/../app/controllers/posts.php");
require_once (__DIR__."/../app/controllers/UserSession.php");
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Некорректный идентификатор поста");
}

$postId = $_GET['id'];
$post = selectOne('posts', ['posts_id' => $postId]);

if (!$post) {
    die("Пост не найден");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post['posts_title']) ?> | Божья Нива</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/card.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php require_once(__DIR__ . "/../app/include/header.php"); ?>

<main class="post-page container py-5">
    <h1 class="post-title"><?= htmlspecialchars($post['posts_title']) ?></h1>
    <img src="<?= htmlspecialchars($post['posts_img']) ?>" alt="Изображение поста" class="img-fluid rounded mb-4">
    <p class="post-content"><?= nl2br(htmlspecialchars($post['posts_content'])) ?></p>
</main>

<?php require_once(__DIR__ . "/../app/include/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
