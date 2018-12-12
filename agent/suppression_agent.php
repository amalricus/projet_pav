<?php

try
{
    $db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$statements = $db->prepare('DELETE FROM agent
                            WHERE id_a = :id');
$statements->bindParam(':id', $_POST['id_a']);
$statements->execute();


header("location:http://localhost:8888/projet_pav/?page=agent/liste_agent");

?>