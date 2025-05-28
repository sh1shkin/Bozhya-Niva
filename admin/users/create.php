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

                <form action="#" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="login" class="form-label">Логин</label>
                        <input type="text" id="login" name="login" class="form-control" placeholder="example" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="example@mail.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="firstPassword" class="form-label">Пароль</label>
                        <input type="password" id="firstPassword" name="firstPassword" class="form-control" placeholder="Не менее 8 символов" required>
                    </div>

                    <div class="mb-3">
                        <label for="secondPassword" class="form-label">Повторите пароль</label>
                        <input type="password" id="secondPassword" name="secondPassword" class="form-control" placeholder="Повторите пароль" required>
                    </div>

                    <button type="submit" class="btn btn-success" name="btn-create-users">Добавить запись</button>
                </form>

            </main>
        </div>
    </div>

    <?php require_once "../../app/include/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
<?php
