<?php
require_once("../../templates/path.php");
require_once("../../app/database/database.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My block</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">

</head>
<body>
<?php
require_once("../../app/include/header-admin.php");
?>
<!-- Main and Sidebar layout -->
<div class="container-fluid flex-grow-1">

    <div class="row h-100">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link active" href="<?=BASE_URL?>/admin/posts/index.php">
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
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 mb-0">Управление записями</h2>
                <div>
                    <a href="create.php" class="btn btn-success me-2">
                        <i class="bi bi-plus-circle me-1"></i> Add Post
                    </a>
                    <a href="#" class="btn btn-warning">
                        <i class="bi bi-card-list me-1"></i> Manage Posts
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                    <tr>
                        <th scope="col" style="width: 5%">ID</th>
                        <th scope="col" style="width: 45%">Заголовок</th>
                        <th scope="col" style="width: 20%">Автор</th>
                        <th scope="col" style="width: 15%">Редактировать</th>
                        <th scope="col" style="width: 15%">Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Статья</td>
                        <td>Admin</td>
                        <td><a href="#" class="btn btn-sm btn-outline-primary">Edit</a></td>
                        <td><a href="#" class="btn btn-sm btn-outline-danger">Delete</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Другая статья</td>
                        <td>Admin</td>
                        <td><a href="#" class="btn btn-sm btn-outline-primary">Edit</a></td>
                        <td><a href="#" class="btn btn-sm btn-outline-danger">Delete</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Еще одна статья</td>
                        <td>Admin</td>
                        <td><a href="#" class="btn btn-sm btn-outline-primary">Edit</a></td>
                        <td><a href="#" class="btn btn-sm btn-outline-danger">Delete</a></td>
                    </tr>
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
