<?php require_once(__DIR__."/../controllers/userSession.php"); ?>
<div class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link active" href="<?=BASE_URL?>/admin/posts/index.php">
                    <i class="bi bi-file-earmark-text me-2"></i> Записи
                </a>
            </li>
            <?php if($_SESSION['root'] === 1):?>
            <li class="nav-item mb-2">
                <a class="nav-link" href="../../admin/users/index.php">
                    <i class="bi bi-people me-2"></i> Пользователи
                </a>
            </li>
            <?php endif;?>
            <li class="nav-item mb-2">
                <a class="nav-link" href="../../admin/topics/index.php">
                    <i class="bi bi-tags me-2"></i> Категории
                </a>
            </li>
        </ul>
    </div>
</div>
