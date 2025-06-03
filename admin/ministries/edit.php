<?php
require_once("../../templates/path.php");
require_once("../../app/database/database.php");
require_once("../../app/controllers/ministries.php");
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Редактирование служения</title>
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
                <h2 class="h4 mb-0">Редактирование служения</h2>
                <div>
                    <a href="index.php" class="btn btn-warning">
                        <i class="bi bi-card-list me-1"></i> Вернуться
                    </a>
                </div>
            </div>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="edit.php" method="post" class="needs-validation" novalidate>
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="ministries_id" value="<?= htmlspecialchars($id) ?>">

                <div class="mb-3">
                    <label for="ministries_name" class="form-label">Название служения</label>
                    <input type="text" class="form-control" id="ministries_name" name="ministries_name" required
                           value="<?= htmlspecialchars($formData['ministries_name'] ?? '') ?>">
                    <div class="invalid-feedback">
                        Пожалуйста, введите название служения.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="ministries_content" class="form-label">Описание служения</label>
                    <textarea class="form-control" id="ministries_content" name="ministries_content" rows="5"><?= htmlspecialchars($formData['ministries_content'] ?? '') ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="ministries_day" class="form-label">День недели</label>
                    <select class="form-select" id="ministries_day" name="ministries_day" required>
                        <option value="">-- Выберите день --</option>
                        <?php
                        $days = [1=>'Понедельник',2=>'Вторник',3=>'Среда',4=>'Четверг',5=>'Пятница',6=>'Суббота',7=>'Воскресенье'];
                        foreach ($days as $num => $dayName) {
                            $selected = (isset($formData['ministries_day']) && $formData['ministries_day'] == $num) ? 'selected' : '';
                            echo "<option value=\"$num\" $selected>$dayName</option>";
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите день недели.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="ministries_start_time" class="form-label">Время начала</label>
                    <input type="time" class="form-control" id="ministries_start_time" name="ministries_start_time" required
                           value="<?= htmlspecialchars($formData['ministries_start_time'] ?? '') ?>">
                    <div class="invalid-feedback">
                        Пожалуйста, укажите время начала служения.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="ministries_location" class="form-label">Место проведения</label>
                    <input type="text" class="form-control" id="ministries_location" name="ministries_location"
                           value="<?= htmlspecialchars($formData['ministries_location'] ?? '') ?>">
                </div>

                <button type="submit" class="btn btn-success">Сохранить изменения</button>
            </form>
        </main>
    </div>
</div>

<?php require_once "../../app/include/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
<script>
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
</body>
</html>
