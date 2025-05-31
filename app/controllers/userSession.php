<?php
session_start();
function loginAdmin($admin) {
    $_SESSION['id'] = $admin['admins_id'];
    $_SESSION['username'] = $admin['admins_username'];
    $_SESSION['email'] = $admin['admins_email'];
    $_SESSION['root'] = $admin['admins_root'];
    header("Location: " . BASE_URL . "/admin/posts/index.php");
    exit();
}