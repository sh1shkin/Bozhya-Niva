<?php
require_once("../../templates/path.php");
require_once("../../app/database/database.php");
require_once("../../app/controllers/videos.php");
require_once("../../app/controllers/topics.php");
global $video_id;
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Редактирование видео</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<?php require_once("../../app/include/header-admin.php"); ?>

<div class="container-fluid flex-grow-1">
    <div class="row h-100">
        <?php require_once("../../app/include/section.php"); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4 mb-0"><i class="bi bi-camera-video me-2"></i>Редактирование видео</h2>
                <a href="index.php" class="btn btn-warning">
                    <i class="bi bi-card-list me-1"></i> Вернуться
                </a>
            </div>

            <form action="../../app/controllers/videos.php" method="post" class="needs-validation" novalidate>
                <input type="hidden" name="video_id" value="<?= $video_id ?>">

                <div class="mb-3">
                    <label for="videoTitle" class="form-label">Название</label>
                    <input type="text" class="form-control" id="videoTitle" name="title" value="<?= htmlspecialchars($video_title) ?>" required>
                    <div class="invalid-feedback">Введите название.</div>
                </div>

                <div class="mb-3">
                    <label for="videoDescription" class="form-label">Описание</label>
                    <textarea class="form-control" id="videoDescription" name="description" rows="4"><?= htmlspecialchars($video_description ?? '') ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="videoUrl" class="form-label">Ссылка на видео (YouTube / VK видео)</label>
                    <input type="url" class="form-control" id="videoUrl" name="video_url" value="<?= htmlspecialchars($video_url) ?>" required>
                    <div class="invalid-feedback">Укажите ссылку на видео.</div>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="videoStatus" name="video_status" <?= $video_status ? 'checked' : '' ?>>
                    <label class="form-check-label" for="videoStatus">Опубликовать</label>
                </div>

                <button type="submit" class="btn btn-success" name="btn-update-video">Сохранить изменения</button>
            </form>
        </main>
    </div>
</div>

<?php require_once("../../app/include/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
