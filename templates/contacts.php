<?php require_once(__DIR__."/path.php")?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Контакты — Божья Нива</title>
  <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>
<body>
  <?php require_once(__DIR__ . "/../app/include/header.php") ?>

  <main class="container">
    <section class="section">
      <h2>Контактная информация</h2>
      <div class="contacts-grid">
        <div class="contact-info">
          <p><strong>Адрес:</strong><br />г. Липецк, ул. Ударников, д. 24А</p>
          <p><strong>Телефон:</strong><br /><a href="tel:+79056884075">+7 (905) 688-40-75</a></p>
          <p><strong>Email:</strong><br /><a href="mailto:info@bozhyaniva.ru">maksim_shishkin_04@inbox.ru</a></p>
          <p><strong>Соцсети:</strong><br />
            <a href="https://vk.com/nivachurch" target="_blank">ВКонтакте</a> |
            <a href="#" target="_blank">Telegram</a>
          </p>
        </div>
        <div class="map-container">
            <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/9/lipetsk/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Липецк</a><a href="https://yandex.ru/maps/9/lipetsk/house/ulitsa_udarnikov_24a/Z0AYcg9kQUEBQFtofXl2c3VgYw==/?ll=39.485080%2C52.572838&utm_medium=mapframe&utm_source=maps&z=18.17" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Ударников, 24А — Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/?ll=39.485080%2C52.572838&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgozNjY1MzU5NDI0EnHQoNC-0YHRgdC40Y8sINCb0LjQv9C10YbQuiwg0LzQuNC60YDQvtGA0LDQudC-0L0g0KHRi9GA0YHQutC40Lkg0KDRg9C00L3QuNC6LCDRg9C70LjRhtCwINCj0LTQsNGA0L3QuNC60L7QsiwgMjTQkCIKDXzwHUIVr0pSQg%2C%2C&z=18.17" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
        </div>
      </div>
    </section>

      <form method="post" class="mt-4">
          <div class="mb-3">
              <label for="name" class="form-label">Ваше имя</label>
              <input type="text" class="form-control" name="name" id="name" required>
          </div>

          <div class="mb-3">
              <label for="email" class="form-label">Ваш email</label>
              <input type="email" class="form-control" name="email" id="email" required>
          </div>

          <div class="mb-3">
              <label for="message" class="form-label">Сообщение</label>
              <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
          </div>

          <button type="submit" name="send" class="btn btn-warning">Отправить</button>


      </form>
      </section>
  </main>

  <footer>
    <div class="container">
      <p>&copy; 2025 Божья Нива. Все права защищены.</p>
      <p><a href="#">Политика конфиденциальности</a></p>
    </div>
  </footer>
  <script src="../assets/js/burger.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/activeLink.js"></script>
  <script src="<?= BASE_URL ?>/assets/js/drop.js"></script>
</body>
</html>
