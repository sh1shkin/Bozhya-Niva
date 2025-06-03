<?php require_once(__DIR__."/path.php");
require_once(__DIR__ . "/../app/controllers/ministries.php");
require_once (__DIR__."/../app/controllers/UserSession.php");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Богослужения — Божья Нива</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900display=swap" rel="stylesheet" />
</head>
<body>
<?php require_once(__DIR__ . "/../app/include/header.php") ?>

<main class="container">
    <section class="section">
        <h2>Расписание богослужений</h2>

        <?php
        $year = date('Y');
        $month = date('m');
        if (isset($_GET['year'])) $year = (int)$_GET['year'];
        if (isset($_GET['month'])) $month = (int)$_GET['month'];

        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $firstDayWeek = date('N', strtotime("$year-$month-01"));

        $prevMonth = $month == 1 ? 12 : $month - 1;
        $prevYear = $month == 1 ? $year - 1 : $year;
        $daysInPrevMonth = cal_days_in_month(CAL_GREGORIAN, $prevMonth, $prevYear);

        $totalCells = 42;
        $today = date('Y-m-d');
        $eventsByDate = [];
        foreach ($ministries as $m) {
            if (!empty($m['ministries_date'])) {
                $eventsByDate[$m['ministries_date']][] = $m;
            }
        }
        ?>

        <div class="calendar-wrapper">
            <table class="calendar-table" role="grid" aria-label="Календарь богослужений">
                <thead>
                <tr>
                    <th>ПН</th><th>ВТ</th><th>СР</th><th>ЧТ</th><th>ПТ</th><th>СБ</th><th>ВС</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $day = 1;
                for ($cell = 0; $cell < $totalCells; $cell++) {
                    if ($cell % 7 === 0) echo '<tr>';

                    if ($cell < $firstDayWeek - 1) {
                        $dateNum = $daysInPrevMonth - ($firstDayWeek - 2 - $cell);
                        $displayDate = sprintf('%04d-%02d-%02d', $prevYear, $prevMonth, $dateNum);
                        $isPrevNext = true;
                    } elseif ($day > $daysInMonth) {
                        $dateNum = $day - $daysInMonth;
                        $nextMonth = $month == 12 ? 1 : $month + 1;
                        $nextYear = $month == 12 ? $year + 1 : $year;
                        $displayDate = sprintf('%04d-%02d-%02d', $nextYear, $nextMonth, $dateNum);
                        $isPrevNext = true;
                        $day++;
                    } else {
                        $dateNum = $day;
                        $displayDate = sprintf('%04d-%02d-%02d', $year, $month, $dateNum);
                        $isPrevNext = false;
                        $day++;
                    }

                    $isToday = ($displayDate === $today);
                    $tdClass = $isToday ? 'today' : '';
                    $textClass = $isPrevNext ? 'date-prev-next' : '';

                    echo "<td class='$tdClass'>";
                    $fullDateFormatted = date('d.m.Y', strtotime($displayDate));
                    echo "<div class='date-number $textClass' title='$displayDate'>$fullDateFormatted</div>";

                    if (!empty($eventsByDate[$displayDate])) {
                        usort($eventsByDate[$displayDate], fn($a, $b) => strcmp($a['ministries_start_time'], $b['ministries_start_time']));
                        foreach ($eventsByDate[$displayDate] as $event) {
                            $time = substr($event['ministries_start_time'], 0, 5);
                            $name = htmlspecialchars($event['ministries_name']);
                            echo "<div class='event-item'><span class='event-time'>$time</span>$name</div>";
                        }
                    }
                    echo "</td>";

                    if ($cell % 7 === 6) echo '</tr>';
                }

                ?>
                </tbody>
            </table>
        </div>

    </section>

    <section class="section">
        <h2>Место проведения</h2>
        <p>Все служения проходят в молитвенном зале по адресу:<br><strong>г. Липецк, ул. Ударинкова, д. 24А</strong></p>
    </section>

    <section class="section invitation">
        <h2>Приглашаем вас!</h2>
        <p>Мы рады видеть вас на наших служениях. Независимо от того, давно ли вы в вере или только в поиске — приходите, вы найдёте здесь поддержку и слово от Бога.</p>
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
