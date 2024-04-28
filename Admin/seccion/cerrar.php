<?php
session_start();
session_destroy();
header('Location:/tienda/Admin/login.php');
?>