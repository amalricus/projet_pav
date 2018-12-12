<?php

try
{
    $db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$statements = $db->prepare('INSERT INTO agent(nom_a, prenom_a, tel_a) 
                            VALUES(:nom, :prenom, :tel)');

$statements->bindParam(':nom', $_POST['nom_a']);
$statements->bindParam(':prenom', $_POST['prenom_a']);
$statements->bindParam(':tel', $_POST['tel_a']);
$statements->execute();

header("location:http://localhost:8888/projet_pav/?page=agent/liste_agent");
?>