<?php require_once(__DIR__."/path.php");
require_once (__DIR__."/../app/controllers/posts.php");
require_once (__DIR__."/../app/database/database.php");
require_once (__DIR__."/../app/controllers/videos.php");

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Божья Нива</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">




</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<body class="initial-load">
    <?php require_once(__DIR__ . "/../app/include/header.php") ?>

    <main class="container">
        <h2>Ближайшие события</h2>
        <div class="carousel-wrapper">
            <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <?php
                    $activeSet = false; // Флаг для отслеживания первого активного элемента
                    foreach ($allPosts as $index => $post):

                        // Проверяем, что пост опубликован (status = 1)
                        if ($post['posts_status'] == 1):

                            // Если это первый подходящий пост, делаем его active
                            $isActive = !$activeSet ? 'active' : '';
                            $activeSet = true; // Устанавливаем флаг, чтобы больше не было active
                            ?>
                            <div class="carousel-item <?= $isActive ?>">
                                <div class="post-card mx-auto">
                                    <a href="post.php?id=<?= $post['posts_id'] ?>" class="text-decoration-none text-dark">
                                        <div class="image-wrapper">
                                            <img src="<?= $post['posts_img'] ?>" alt="<?= htmlspecialchars($post['posts_title']) ?>">
                                        </div>
                                        <p class="post-title"><?= htmlspecialchars($post['posts_title']) ?></p>
                                        <p class="post-content"><?= htmlspecialchars($post['posts_content']) ?></p>
                                    </a>
                                </div>
                            </div>
                        <?php
                        endif;
                    endforeach;
                    ?>
                </div>

                <!-- Стрелки -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
            </div>
        </div>

        <section class="section mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold">Последние видео</h2>
                <a href="<?php echo BASE_URL . "templates/allVideo.php" ?>" class="btn btn-outline-warning rounded-pill">Все видео</a>
            </div>

            <div class="video-slider d-flex overflow-auto gap-4 pb-3">
                <?php
                $hasVideos = false;
                foreach ($allVideos as $video):
                    if ($video['video_status']):
                        $hasVideos = true;
                        ?>
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
                    <?php
                    endif;
                endforeach;

                if (!$hasVideos): ?>
                    <h2>Видео еще не добавлены</h2>
                <?php endif; ?>
            </div>
        </section>

    </main>


    <?php require_once("../app/include/footer.php")?>
    <script src="../assets/js/burger.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/activeLink.js"></script>
    

</body>
</html>
