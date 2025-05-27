<?php
    require_once("../database/database.php");
    session_destroy();
    header("Location: " . BASE_URL. "/templates/index.php");
    exit();