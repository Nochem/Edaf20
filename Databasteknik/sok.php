<?php session_start();
if (!isset($_SESSION['login_user'])){header("location: index.php");}
include_once "topmeny.php";
show_header('sok');?>