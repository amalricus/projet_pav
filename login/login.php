<?php
$account="admin";
$password="pav33000";



if($_POST['account'] == $account && $_POST['pass'] == $password)
{
    session_start();
    $_SESSION['account'] = $account;
    header('location:http://localhost:8888/projet_pav/?page=liste_pav');
}
else
{
    header('location:formulaire_login.php');
};


echo 'pre>';
print_r($_SESSION);
echo 'pre>';

