<?php 
session_start();
unset($_SESSION['usuarioEmail']);
header('Location: ../../Public/landing.php');
exit();