<?php 

try
{
	$db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$statements = $db->prepare('UPDATE pav 
                        SET nom_p = :nom, numrue_p = :numrue, rue_p = :rue, cp_p = :cp, ville_p = :ville 
                        WHERE id_p = :id');

$statements->bindParam(':nom', $_POST['nom_p']);
$statements->bindParam(':numrue', $_POST['numrue_p']);
$statements->bindParam(':rue', $_POST['rue_p']);
$statements->bindParam(':cp', $_POST['cp_p']);
$statements->bindParam(':ville', $_POST['ville_p']);
$statements->bindParam(':id', $_POST['id_p']);
$statements->execute();

header("location:http://localhost:8888/projet_pav/?page=pav/liste_pav");
?>