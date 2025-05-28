<?php
    require_once(__DIR__."/../database/database.php");
    require_once(__DIR__."/../controllers/userSession.php");
    $errorMsg = '';
    $id = '';
    $title = '';
    $description = '';
    $allTopics = selectAll("topics");
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['button-create-category'])) {
        $title = trim($_POST['title']);
        $description = trim($_POST['content']);

        if($title == "" || $description == "") {
            $errorMsg = "Некоторые поля пустые, пожалуйста заполните их";
        } elseif(mb_strlen($title) < 5) {
            $errorMsg = "Заголовок не может быть меньше 5 символов";
        } else {
            $existens = selectOne("topics", ['topics_name'=>trim($title)]);
            if($existens && $existens['topics_name'] === $title) {
                $errorMsg = "Такая категория уже существует";
            } else {
                $topics = [
                    'topics_name' => $title,
                    'topics_description' => $description,
                ];
                $id = Insert("topics", $topics);
                $topic = selectOne("topics", ['topics_id'=>$id]);
            }
        }
    }
    if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['topics_id'])) {
        $id = $_GET['topics_id'];
        $topic = selectOne("topics", ['topics_id' => $id]);
        $id = $topic['topics_id'];
        $title = $topic['topics_name'];
        $description = $topic['topics_description'];
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['topic-edit'])) {
        $title = trim($_POST['title']);
        $description = trim($_POST['content']);

        if($title == "" || $description == "") {
            $errorMsg = "Некоторые поля пустые, пожалуйста заполните их";
        } elseif(mb_strlen($title) < 5) {
            $errorMsg = "Заголовок не может быть меньше 5 символов";
        } else {
            $existens = selectOne("topics", ['topics_name'=>trim($title)]);
            if($existens && $existens['topics_name'] === $title) {
                $errorMsg = "Такая категория уже существует";
            } else {
                $topics = [
                    'topics_name' => $title,
                    'topics_description' => $description,
                ];
                $id = $_POST['topics_id'];
                update("topics", $id, $topics);
                $topic = selectOne("topics", ['topics_id'=>$id]);
            }
        }
    }
    if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['del_id'])) {
        $id = $_GET['del_id'];
        delete('topics', $id);
        header("Location: " . BASE_URL . "/admin/topics/index.php");
        exit;
    }