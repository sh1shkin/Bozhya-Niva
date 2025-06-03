<?php
require_once("userSession.php");
require_once(__DIR__."/../database/database.php");

if (!isset($_SESSION['id'])) {
    header('Location: /login.php');
    exit();
}

$table = 'video';

$errors = [];
$video_id = '';
$video_title = '';
$video_url = '';
$video_status = 0;
$admins_id = $_SESSION['id'];

$allVideos = selectAll($table);
$latestVideos = selectAllVideo($table, ['video_status' => 1]);

if (isset($_POST['btn-create-video'])) {
    $video_title = trim($_POST['video_title']);
    $video_url = trim($_POST['video_url']);
    $video_status = isset($_POST['video_status']) ? 1 : 0;

    if ($video_title === '') $errors[] = "Введите название видео";
    if ($video_url === '') $errors[] = "Укажите ссылку на видео";

    if (count($errors) === 0) {
        $video = [
            'video_title' => $video_title,
            'video_url' => $video_url,
            'upload_date' => date('Y-m-d H:i:s'),
            'admins_id' => $admins_id,
            'video_status' => $video_status
        ];
        insert($table, $video);
        header('Location: ../../admin/video/index.php');
        exit();
    }
}

if (isset($_GET['video_id'])) {
    $video = selectOne($table, ['video_id' => $_GET['video_id']]);
    if ($video) {
        $video_id = $video['video_id'];
        $video_title = $video['video_title'];
        $video_url = $video['video_url'];
        $video_status = $video['video_status'];
    }
}

if (isset($_POST['btn-update-video'])) {
    $video_id = $_POST['video_id'];
    $video_title = trim($_POST['title']); // в edit.php поле называется name="title"
    $video_url = trim($_POST['video_url']);
    $video_status = isset($_POST['publish']) ? 1 : 0;

    if ($video_title === '') $errors[] = "Введите название видео";
    if ($video_url === '') $errors[] = "Укажите ссылку на видео";

    if (count($errors) === 0) {
        $videoData = [
            'video_title' => $video_title,
            'video_url' => $video_url,
            'video_status' => $video_status
        ];
        update($table, $video_id, $videoData);
        header('Location: ../../admin/video/index.php');
        exit();
    }
}

if (isset($_GET['delete_id'])) {
    delete($table, $_GET['delete_id']);
    header('Location: ../../admin/video/index.php');
    exit();
}

if (isset($_GET['publish']) && isset($_GET['video_id'])) {
    $video_id = $_GET['video_id'];
    $publish_status = $_GET['publish'] ? 1 : 0;

    update($table, $video_id, ['video_status' => $publish_status]);
    header('Location: ../../admin/video/index.php');
    exit();
}
