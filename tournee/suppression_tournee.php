<?php 

try
{
	$db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$statements = $db->prepare('DELETE FROM pav_tournee 
                            WHERE id_t = :id');
$statements->bindParam(':id', $_POST['id_t']);
$statements->execute();


$statements = $db->prepare('DELETE FROM tournee
                        WHERE id_t = :id');
$statements->bindParam(':id', $_POST['id_t']);
$statements->execute();

header("location:http://localhost:8888/projet_pav/?page=tournee/liste_tournee");

?>