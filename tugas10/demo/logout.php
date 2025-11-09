<?php
session_start();
include 'config.php';
session_destroy();
header("location:" . BASE_URL . "login.php?pesan=logout");
?>