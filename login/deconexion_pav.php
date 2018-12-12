<?php
if(!isset($_SESSION['account']))
{
    header("Location:formulaire_login.php");
    die();
}

session_destroy();
header('location:formulaire_login.php');
?>