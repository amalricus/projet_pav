<?php

try
{
    $db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$statements = $db->prepare('SELECT id_t
                            FROM tournee
                            WHERE id_a = :id');

$statements->bindParam(':id', $_POST['id_a']);
$statements->execute();
$results_id_tournee = $statements->fetchAll();

/*
echo "<pre>";
print_r($results_id_tournee);
echo "<pre>";
*/

$statements = $db->prepare('DELETE FROM pav_tournee
                            WHERE id_t = :id');

for ($i=0; $i < count($results_id_tournee); $i++) { 
    $statements->bindParam(':id', $results_id_tournee[$i]['id_t']);
    $statements->execute();
}

$statements = $db->prepare('DELETE FROM tournee
                            WHERE id_a = :id');
$statements->bindParam(':id', $_POST['id_a']);
$statements->execute();


$statements = $db->prepare('DELETE FROM agent
                            WHERE id_a = :id');
$statements->bindParam(':id', $_POST['id_a']);
$statements->execute();


header("location:http://localhost:8888/projet_pav/?page=agent/liste_agent");

?>