<?php
session_start();

$_SESSION['id'] = '';
$_SESSION['name'] = '';
$_SESSION['image'] = '';
$_SESSION['email'] = '';

unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['image']);
unset($_SESSION['email']);

session_unset();
session_destroy();
header('Location:login.php');
