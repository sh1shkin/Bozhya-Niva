<?php
require_once("../app/controllers/userSession.php");
require_once (__DIR__."/../app/controllers/UserSession.php");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Пожертвовать — Божья Нива</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
<?php require_once(__DIR__ . '/../app/include/header.php'); ?>

<main class="container" style="padding: 30px; max-width: 600px;">
    <h1>Пожертвовать</h1>
    <form method="POST" action="https://yoomoney.ru/quickpay/confirm.xml" target="_blank">
        <input type="hidden" name="receiver" value="410011161616877" /> <!-- замените на ваш кошелек -->
        <input type="hidden" name="formcomment" value="Пожертвование на служение" />
        <input type="hidden" name="short-dest" value="Пожертвование" />
        <input type="hidden" name="quickpay-form" value="donate" />
        <input type="hidden" name="targets" value="Помощь служению" />

        <label for="sum">Сумма (рублей):</label><br>
        <input type="number" id="sum" name="sum" min="10" step="1" required style="width: 100%; padding: 8px; margin-top: 8px; margin-bottom: 16px;">

        <button type="submit" class="donate-btn" style="width: 100%;">Пожертвовать</button>
    </form>
</main>

<?php require_once(__DIR__ . '/../app/include/footer.php'); ?>
</body>
</html>
