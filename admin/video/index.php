<?php
require_once("../../templates/path.php");
require_once("../../app/database/database.php");
require_once("../../app/controllers/videos.php");
require_once("../../app/controllers/userSession.php");
global $allVideos;
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Управление видео</title>
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
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 mb-0">Управление видео</h2>
                <div>
                    <a href="create.php" class="btn btn-success me-2">
                        <i class="bi bi-plus-circle me-1"></i> Добавить видео
                    </a>
                    <a href="#" class="btn btn-warning">
                        <i class="bi bi-collection-play me-1"></i> Все видео
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                    <tr>
                        <th scope="col" style="width: 5%">ID</th>
                        <th scope="col" style="width: 40%">Название</th>
                        <th scope="col" style="width: 20%">Автор</th>
                        <th scope="col" style="width: 10%">Редактировать</th>
                        <th scope="col" style="width: 7%">Удалить</th>
                        <th scope="col" style="width: 18%">Публикация</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($allVideos as $key => $video): ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= htmlspecialchars($video["video_title"]) ?></td>
                            <td><?= $_SESSION['username'] ?></td>
                            <td>
                                <a href="edit.php?video_id=<?= $video['video_id'] ?>" class="btn btn-sm btn-outline-primary">Редактировать</a>
                            </td>
                            <td>
                                <a href="index.php?delete_id=<?= $video['video_id'] ?>" class="btn btn-sm btn-outline-danger">Удалить</a>
                            </td>

                            <?php if ($video['video_status'] == 1): ?>
                                <td>
                                    <a href="index.php?publish=0&video_id=<?= $video['video_id'] ?>" class="btn btn-sm btn-outline-warning">Снять с публикации</a>
                                </td>
                            <?php else: ?>
                                <td>
                                    <a href="index.php?publish=1&video_id=<?= $video['video_id'] ?>" class="btn btn-sm btn-outline-success">Опубликовать</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<?php require_once "../../app/include/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
<script src="main.js"></script>
</body>
</html>
