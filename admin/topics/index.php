<?php
require_once("../../templates/path.php");
require_once("../../app/database/database.php");
require_once("../../app/controllers/topics.php");
    global $allTopics;
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
                <!-- Sidebar -->
            <?php require_once("../../app/include/section.php"); ?>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h4 mb-0">Категории</h2>
                    <div>
                        <a href="create.php" class="btn btn-success me-2">
                            <i class="bi bi-plus-circle me-1"></i> Добавить категории
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 10%">ID</th>
                            <th scope="col" style="width: 70%">Название категории</th>
                            <th scope="col" style="width: 10%">Редактировать</th>
                            <th scope="col" style="width: 10%">Удалить</th>
                        </tr>
                        </thead>
                        <?php foreach ($allTopics as $key => $topic) : ?>
                        <tbody>
                        <tr>
                            <td><?php echo $key  + 1;?></td>
                            <td><?php echo $topic['topics_name']?></td>
                            <td><a href="edit.php?topics_id=<?= $topic['topics_id'] ?>" class="btn btn-sm btn-outline-primary">Редактировать</a></td>
                            <td><a href="edit.php?del_id=<?= $topic['topics_id'] ?>" class="btn btn-sm btn-outline-danger">Удалить</a></td>
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
<?php
