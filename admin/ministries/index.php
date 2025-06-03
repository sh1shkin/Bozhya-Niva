<?php
require_once("../../templates/path.php");
require_once("../../app/database/database.php");
require_once("../../app/controllers/ministries.php");
require_once("../../app/controllers/userSession.php");
global $ministries;

$ministries = getAllMinistries();

function dayOfWeekName($num) {
    $days = [1=>'Понедельник',2=>'Вторник',3=>'Среда',4=>'Четверг',5=>'Пятница',6=>'Суббота',7=>'Воскресенье'];
    return $days[$num] ?? 'Неизвестно';
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Управление служениями</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<?php require_once("../../app/include/header-admin.php"); ?>

<!-- Main and Sidebar layout -->
<div class="container-fluid flex-grow-1">

    <div class="row h-100">
        <!-- Sidebar -->
        <?php require_once("../../app/include/section.php"); ?>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 mb-0">Управление служениями</h2>
                <div>
                    <a href="create.php" class="btn btn-success me-2">
                        <i class="bi bi-plus-circle me-1"></i> Добавить служение
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                    <tr>
                        <th scope="col" style="width: 5%">ID</th>
                        <th scope="col" style="width: 25%">Название</th>
                        <th scope="col" style="width: 23%">Описание</th>
                        <th scope="col" style="width: 10%">День недели</th>
                        <th scope="col" style="width: 7%">Время начала</th>
                        <th scope="col" style="width: 15%">Место проведения</th>
                        <th scope="col" style="width: 10%">Редактировать</th>
                        <th scope="col" style="width: 10%">Удалить</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($ministries as $ministry): ?>
                        <tr>
                            <td><?= htmlspecialchars($ministry["ministries_id"]) ?></td>
                            <td><?= htmlspecialchars($ministry["ministries_name"]) ?></td>
                            <td><?= nl2br(htmlspecialchars($ministry["ministries_content"])) ?></td>
                            <td><?= dayOfWeekName($ministry["ministries_day"]) ?></td>
                            <td><?= htmlspecialchars($ministry["ministries_start_time"]) ?></td>
                            <td><?= htmlspecialchars($ministry["ministries_location"]) ?></td>
                            <td>
                                <a href="edit.php?id=<?= $ministry['ministries_id'] ?>" class="btn btn-outline-primary btn-sm w-100">Редактировать</a>
                            </td>
                            <td>
                                <a href="index.php?delete_id=<?= $ministry['ministries_id'] ?>" class="btn btn-outline-danger btn-sm w-100" onclick="return confirm('Удалить это служение?')">Удалить</a>
                            </td>
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
