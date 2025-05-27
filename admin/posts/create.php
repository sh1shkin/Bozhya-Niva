<?php
require_once("../../templates/path.php");
require_once("../../app/database/database.php");
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
            <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="<?=BASE_URL?>/admin/posts/index.php">
                                <i class="bi bi-file-earmark-text me-2"></i> Записи
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <i class="bi bi-people me-2"></i> Пользователи
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <i class="bi bi-tags me-2"></i> Категории
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

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

                <form action="#" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="postTitle" class="form-label">Заголовок</label>
                        <input type="text" class="form-control" id="postTitle" name="title" required>
                        <div class="invalid-feedback">
                            Пожалуйста, введите заголовок.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="postContent" class="form-label">Содержимое</label>
                        <textarea class="form-control" id="postContent" name="content" rows="6" required></textarea>
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
                        <select class="form-select" id="postCategory" name="topic" required>
                            <option selected disabled value="">Выберите категорию</option>
                            <option value="1">Новости</option>
                            <option value="2">Обзоры</option>
                            <option value="3">Руководства</option>
                        </select>
                        <div class="invalid-feedback">
                            Выберите категорию для записи.
                        </div>
                    </div>



                    <button type="submit" class="btn btn-success">Добавить запись</button>
                </form>
            </main>
        </div>
    </div>

    <?php require_once "../../app/include/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
<?php
