<?php
    session_start();
    session_destroy();

    header("Location: doodles-login.php");
?>