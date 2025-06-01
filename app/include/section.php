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
            <li class="nav-item mb-2">
                <a class="nav-link" href="../../admin/video/index.php">
                    <i class="bi bi-camera-video me-2"></i> Видео
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="../../admin/ministries/index.php">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         width="16" height="16"
                         fill="currentColor"
                         class="me-2 align-text-bottom"
                         viewBox="0 0 512 512"
                         role="img"
                         aria-label="Cross icon">
                        <path fill="currentColor" d="M446.503,141.994H320.017V0H192.015v141.994H49.497v128.01h142.518V512h128.002V269.996l142.486,0.008v-128.01H446.503zM430.503,237.996H288.017V480h-64.001V237.996H81.497v-64.001h142.518V31.992h64.001v142.002h142.486V237.996z"/>
                    </svg>
                    Служения
                </a>
            </li>

        </ul>
    </div>
</div>
