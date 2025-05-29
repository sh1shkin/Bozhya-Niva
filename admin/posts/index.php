<?php
require_once("../../templates/path.php");
require_once("../../app/database/database.php");
require_once("../../app/controllers/posts.php");
require_once("../../app/controllers/userSession.php");
global $allPosts;
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
        <?php require_once("../../app/include/section.php"); ?>

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
                        <th scope="col" style="width: 10%">Редактировать</th>
                        <th scope="col" style="width: 7%">Удалить</th>
                        <th scope="col" style="width: 23%">Публикация</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($allPosts as $key => $post): ?>
                        <tr>
                            <td><?php echo $key + 1;?></td>
                            <td><?php echo $post["posts_title"]?></td>
                            <td><?php echo $_SESSION['username']?></td>
                            <td><a href="edit.php?posts_id=<?= $post['posts_id'] ?>" class="btn btn-sm btn-outline-primary">Редактировать</a></td>
                            <td><a href="edit.php?del_id=<?= $post['posts_id'] ?>" class="btn btn-sm btn-outline-danger">Удалить</a></td>



                            <?php if($post['posts_status'] === 1): ?>
                                <td><a href="index.php?publish=0&posts_id=<?= $post['posts_id'] ?>" class="btn btn-sm btn-outline-warning">Снять с публикации</a></td>
                            <?php else: ?>
                                <td><a href="index.php?publish=1&posts_id=<?= $post['posts_id'] ?>" class="btn btn-sm btn-outline-success">Опубликовать</a></td>
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
