<?php
require_once(__DIR__ . "/../../templates/path.php");
require_once(__DIR__ . "/../database/database.php");
require_once(__DIR__ . "/../controllers/userSession.php");
require_once(__DIR__ . "/../controllers/topics.php");

$allTopics = selectAll("topics");
$allPosts = selectAll("posts");
$postsAdm = selectAllFromPosts('posts', 'admins');
$errorMsg = '';
$id = '';
$title = '';
$content = '';
$img = '';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btn-create-posts'])) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic-posts']);
    $publish = isset($_POST['publish']) ? 1 : 0;

    if ($title === "" || $content === "" || $topic === "") {
        $errorMsg = "Некоторые поля пустые, пожалуйста заполните их";
    } elseif (mb_strlen($title) < 5) {
        $errorMsg = "Заголовок не может быть меньше 5 символов";
    } else {
        // Обработка изображения
        if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
            $imgName = time() . '_' . basename($_FILES['img']['name']);
            $destination = '/bozhya_niva/uploads/' . $imgName; // относительный путь для БД
            $fullPath = $_SERVER['DOCUMENT_ROOT'] . $destination; // абсолютный путь на сервере

            // Перемещение файла
            if (!move_uploaded_file($_FILES['img']['tmp_name'], $fullPath)) {
                $errorMsg = "Не удалось загрузить изображение";
                $img = '';
            } else {
                $img = $destination;
            }
        } else {
            $img = '';
        }

        // Если нет ошибок — сохраняем
        if ($errorMsg === '') {
            $posts = [
                'admins_id' => $_SESSION['id'],
                'posts_title' => $title,
                'posts_content' => $content,
                'posts_img' => $img,
                'posts_status' => $publish,
                'topics_id' => $topic,
                'posts_created_date' => date('Y-m-d H:i:s')
            ];

            Insert("posts", $posts);
            header("Location: " . BASE_URL . "/admin/posts/index.php");
            exit();
        }
    }
} if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['posts_id'])) {
    $id = $_GET['posts_id'];
    $post = selectOne("posts", ['posts_id' => $id]);
    $title = $post['posts_title'];
    $content = $post['posts_content'];
    $topic = $post['topics_id'];
    $publish = $post['posts_status'];
}if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['posts-edit'])) {
    $id = $_POST['posts_id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic-posts']);
    $publish = isset($_POST['publish']) ? 1 : 0;

    // Доббаваляю картинку
    if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
        $imgName = time() . '_' . basename($_FILES['img']['name']);
        $destination = '/bozhya_niva/uploads/' . $imgName;
        $fullPath = $_SERVER['DOCUMENT_ROOT'] . $destination;

        if (move_uploaded_file($_FILES['img']['tmp_name'], $fullPath)) {
            $img = $destination;
        } else {
            $img = '';
        }
    } else {
        $oldPost = selectOne("posts", ['posts_id' => $id]);
        $img = $oldPost['posts_img']; // оставить старую картинку
    }

    $updatedPost = [
        'posts_title' => $title,
        'posts_content' => $content,
        'posts_img' => $img,
        'posts_status' => $publish,
        'topics_id' => $topic,
    ];

    update("posts", $id, $updatedPost);
    header("Location: " . BASE_URL . "/admin/posts/index.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['publish']) && isset($_GET['posts_id'])) {
    $id = $_GET['posts_id'];
    $status = $_GET['publish'] == 1 ? 1 : 0;
    update("posts", $id, ['posts_status' => $status]);
    header("Location: " . BASE_URL . "/admin/posts/index.php");
    exit();
} if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('posts', $id);
    header('location: ' . BASE_URL . 'admin/posts/index.php');
}
