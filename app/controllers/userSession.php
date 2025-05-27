<?php
session_start();
function loginAdmin($admin) {
    $_SESSION['id'] = $admin['id'];
    $_SESSION['username'] = $admin['username'];
    $_SESSION['email'] = $admin['email'];
    header("Location: " . BASE_URL . "/admin/posts/index.php");
    exit();

}