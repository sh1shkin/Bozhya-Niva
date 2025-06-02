<header>
    <div class="container header-inner">
        <div class="logo">
            <a href="<?= BASE_URL ?>/templates/index.php" class="logo">
                <div class="logo-wrapper">
                    <img src="<?= BASE_URL ?>/assets/img/logo.png" alt="Божья Нива">
                </div>
            </a>   
        </div>

        <div class="menu-block">
            <div class="burger" id="burger" aria-label="Открыть меню">
                <span></span><span></span><span></span>
            </div>
            <div class="nav-wrapper" id="navWrapper">
                <nav>
                    <a href="<?= BASE_URL ?>/templates/index.php">Главная</a>
                    <a href="<?= BASE_URL ?>/templates/about.php">О нас</a>
                    <a href="<?= BASE_URL ?>/templates/events.php">События</a>
                    <a href="<?= BASE_URL ?>/templates/services.php">Богослужения</a>
                    <a href="<?= BASE_URL ?>/templates/contacts.php">Контакты</a>


                    <div class="auth-wrapper">
                        <?php if (!isset($_SESSION['username'])): ?>
                            <a href="<?= BASE_URL ?>/templates/login.php" class="auth-btn">Авторизоваться</a>
                        <?php else: ?>
                            <a href="<?= BASE_URL ?>/admin/posts/index.php" class="auth-btn">
                                <?= htmlspecialchars($_SESSION['username']) ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <button class="donate-btn" id="donateBtn">Пожертвовать</button>

                </nav>
            </div>
        </div>
    </div>
</header>


<script>
    document.getElementById('donateBtn').addEventListener('click', function() {
        window.open('<?= BASE_URL ?>/templates/donatForm.php', 'donateWindow', 'width=500,height=600');
    });
</script>

