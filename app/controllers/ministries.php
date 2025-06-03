<?php
require_once(__DIR__ . '/../database/database.php');


$ministries = selectAll("ministries");
$errors = [];
$formData = [
    'ministries_name' => '',
    'ministries_content' => '',
    'ministries_day' => '',
    'ministries_start_time' => '',
    'ministries_location' => '',
];

// Удаление
if (isset($_GET['delete_id'])) {
    deleteMinistry((int)$_GET['delete_id']);
    header('Location: index.php');
    exit;
}

// Создание
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'create') {
    $formData = [
        'ministries_name' => trim($_POST['ministries_name'] ?? ''),
        'ministries_content' => trim($_POST['ministries_content'] ?? ''),
        'ministries_day' => (int)($_POST['ministries_day'] ?? 0),
        'ministries_start_time' => $_POST['ministries_start_time'] ?? '',
        'ministries_location' => trim($_POST['ministries_location'] ?? ''),
    ];

    if (!$formData['ministries_name']) $errors[] = 'Введите название служения';
    if ($formData['ministries_day'] < 1 || $formData['ministries_day'] > 7) $errors[] = 'Выберите корректный день недели';
    if (!$formData['ministries_start_time']) $errors[] = 'Введите время начала служения';

    if (empty($errors)) {
        createMinistry($formData);
        header('Location: index.php');
        exit;
    }
}

// Редактирование
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'edit') {
    $id = (int)($_POST['ministries_id'] ?? 0);
    $formData = [
        'ministries_name' => trim($_POST['ministries_name'] ?? ''),
        'ministries_content' => trim($_POST['ministries_content'] ?? ''),
        'ministries_day' => (int)($_POST['ministries_day'] ?? 0),
        'ministries_start_time' => $_POST['ministries_start_time'] ?? '',
        'ministries_location' => trim($_POST['ministries_location'] ?? ''),
    ];

    if (!$formData['ministries_name']) $errors[] = 'Введите название служения';
    if ($formData['ministries_day'] < 1 || $formData['ministries_day'] > 7) $errors[] = 'Выберите корректный день недели';
    if (!$formData['ministries_start_time']) $errors[] = 'Введите время начала служения';

    if (empty($errors)) {
        updateMinistry($id, $formData);
        header('Location: index.php');
        exit;
    }
}

// подгрузка текущх данных
$editingMinistry = null;
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $editingMinistry = getMinistryById($id);
    if ($editingMinistry) {
        $formData = $editingMinistry;
    }
}

$year = date('Y');
$month = date('m');
if (isset($_GET['year'])) $year = (int)$_GET['year'];
if (isset($_GET['month'])) $month = (int)$_GET['month'];

$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
$firstDayWeek = date('N', strtotime("$year-$month-01"));

$prevMonth = $month == 1 ? 12 : $month - 1;
$prevYear = $month == 1 ? $year - 1 : $year;
$daysInPrevMonth = cal_days_in_month(CAL_GREGORIAN, $prevMonth, $prevYear);


$eventsByDate = [];
foreach ($ministries as $m) {
    $date = $m['ministries_date'] ?? null;
    if ($date) {
        $eventsByDate[$date][] = $m;
    }
}
$today = date('Y-m-d');
$totalCells = 42;