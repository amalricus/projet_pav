<?php

try
{
    $db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$statements = $db->prepare('UPDATE agent 
                        SET nom_a = :nom, prenom_a = :prenom, tel_a = :tel 
                        WHERE id_a = :id');

$statements->bindParam(':nom', $_POST['nom_a']);
$statements->bindParam(':prenom', $_POST['prenom_a']);
$statements->bindParam(':tel', $_POST['tel_a']);
$statements->bindParam(':id', $_POST['id_a']);
$statements->execute();

header("location:http://localhost:8888/projet_pav/?page=agent/liste_agent");
?>