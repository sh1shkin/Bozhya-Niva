<?php
    require_once("../../templates/path.php");
    require_once("../controllers/userSession.php");
    session_destroy();
    header("Location: " . BASE_URL. "/templates/index.php");
    exit();