<?php require_once(__DIR__."/path.php");
require_once (__DIR__."/../app/controllers/UserSession.php");
require_once (__DIR__."/../app/controllers/videos.php");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Божья Нива</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<body class="initial-load">
<?php require_once(__DIR__ . "/../app/include/header.php") ?>
<main class="container">
    <section class="section mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold">Все видео</h2>
        </div>

        <div class="video-slider d-flex overflow-auto gap-4 pb-3">
            <?php if (empty($allVideos)): ?>
                <p class="text-muted">Видео ещё не добавлены.</p>
            <?php else: ?>
                <?php foreach ($allVideos as $video): ?>
                    <div class="video-card flex-shrink-0" style="width: 320px;">
                        <a href="<?= htmlspecialchars($video['video_url']) ?>" target="_blank" class="position-relative d-block">
                            <img
                                    src="https://img.youtube.com/vi/<?= extractYoutubeId($video['video_url']) ?>/hqdefault.jpg"
                                    alt="<?= htmlspecialchars($video['video_title']) ?>"
                                    class="img-fluid rounded"
                            >
                            <i class="bi bi-play-circle-fill position-absolute top-50 start-50 translate-middle fs-1 text-white"></i>
                        </a>
                        <div class="mt-2 fw-semibold"><?= htmlspecialchars($video['video_title']) ?></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php require_once("../app/include/footer.php")?>