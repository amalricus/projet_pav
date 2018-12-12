<?php

/*
echo "<pre>";
print_r($_POST);
echo "<pre>";
*/

try
{
    $db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$statements = $db->prepare('UPDATE pav_tournee 
                            SET taux_p = :taux, com_p = :commentaire 
                            WHERE id_t = :id_tournee
                            AND id_p = :id_pav');

$statements->bindParam(':taux', $_POST['taux_p']);
$statements->bindParam(':commentaire', $_POST['com_p']);
$statements->bindParam('id_tournee', $_POST['id_t']);
$statements->bindParam(':id_pav', $_POST['id_p']);
$statements->execute();

header("location:http://localhost:8888/projet_pav/?page=formulaire/liste_agents");

?>