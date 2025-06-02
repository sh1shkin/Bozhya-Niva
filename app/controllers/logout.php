<?php
    require_once("../../templates/path.php");
    require_once("../controllers/userSession.php");
    session_destroy();
    header("Location: http://localhost/bozhya_niva/templates/login.php");

exit();