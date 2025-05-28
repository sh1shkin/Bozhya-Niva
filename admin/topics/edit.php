<?php
require_once("../../templates/path.php");
require_once("../../app/database/database.php");
require_once("../../app/controllers/topics.php");
$errorMsg = "";
global $id;
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['topics_id'])) {
    $topic = selectOne("topics", ['topics_id' => $_GET['topics_id']]);
    if ($topic) {
        $id = $topic['topics_id'];
    }
}
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
    <?php
    require_once("../../app/include/header-admin.php");
    ?>

    <div class="container-fluid flex-grow-1">
        <div class="row h-100">
            <!-- Sidebar -->
            <?php require_once("../../app/include/section.php"); ?>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h4 mb-0">Обновление категории</h2>
                    <div>
                        <a href="#" class="btn btn-warning">
                            <i class="bi bi-card-list me-1"></i> Manage Category
                        </a>
                    </div>
                </div>

                <form action="edit.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <input type="hidden" name="topics_id" value="<?= htmlspecialchars($id) ?>">

                    <div class="mb-3">
                        <label for="postTitle" class="form-label">Название категории</label>
                        <input type="text" class="form-control" id="postTitle" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="postContent" class="form-label">Описание категории</label>
                        <textarea class="form-control" id="postContent" name="content" rows="6" required></textarea>
                        <div class="invalid-feedback">
                            Пожалуйста, введите содержимое записи.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" name="topic-edit">обновить</button>
                </form>
            </main>
        </div>
    </div>

    <?php require_once "../../app/include/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
<?php
