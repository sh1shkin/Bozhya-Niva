<?php
require_once("../../templates/path.php");
require_once("../../app/database/database.php");
require_once("../../app/controllers/posts.php");
require_once("../../app/controllers/topics.php");
global $allTopics;
global $id;
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<?php require_once("../../app/include/header-admin.php"); ?>

<div class="container-fluid flex-grow-1">
    <div class="row h-100">
        <!-- Sidebar -->
        <?php require_once("../../app/include/section.php"); ?>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4 mb-0">Добавление записи</h2>
                <div>
                    <a href="#" class="btn btn-warning">
                        <i class="bi bi-card-list me-1"></i> Manage Posts
                    </a>
                </div>
            </div>

            <form action="../../app/controllers/posts.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <input type="hidden" name="delete_id" value="<?=$id; ?>">
                <div class="mb-3">
                    <label for="postTitle" class="form-label">Заголовок</label>
                    <input type="text" class="form-control" id="postTitle" name="title" value="<?= htmlspecialchars($title) ?>" required>

                    <div class="invalid-feedback">
                        Пожалуйста, введите заголовок.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="postContent" class="form-label">Содержимое</label>
                    <textarea class="form-control" id="postContent" name="content" rows="6" required><?= htmlspecialchars($content) ?></textarea>

                    <div class="invalid-feedback">
                        Пожалуйста, введите содержимое записи.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="postImage" class="form-label">Изображение</label>
                    <input class="form-control" type="file" id="postImage" name="img">
                </div>

                <div class="mb-3">
                    <label for="postCategory" class="form-label">Категория</label>
                    <select class="form-select" id="postCategory" name="topic-posts" required>
                        <?php foreach ($allTopics as $topic): ?>
                            <option value="<?= $topic['topics_id'] ?>" <?= $topic['topics_id'] == $topic ? 'selected' : '' ?>>
                                <?= $topic['topics_name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="postStatus" name="publish" <?= $publish ? 'checked' : '' ?>>

                    <label class="form-check-label" for="postStatus">
                        Опубликовать пост
                    </label>
                </div>

                <button type="submit" class="btn btn-success" name="btn-create-posts">Добавить запись</button>
            </form>
        </main>
    </div>
</div>

<?php require_once "../../app/include/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>