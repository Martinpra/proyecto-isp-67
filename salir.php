<?php
session_start();
session_destroy();
header("Location: ingresa_admin.php");
?>