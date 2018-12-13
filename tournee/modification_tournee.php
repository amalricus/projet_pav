<?php

echo "<pre>";
print_r($_POST);
echo "<pre>";

$db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');

$statements = $db->prepare('UPDATE tournee 
                            SET date_t = :date, id_a = :id_agent 
                            WHERE id_t = :id_tournee');
$statements->bindParam(':date', $_POST['date_t']);
$statements->bindParam(':id_agent', $_POST['agent_id']);
$statements->bindParam(':id_tournee', $_POST['id_t']);
$statements->execute();

$statements = $db->prepare('DELETE FROM pav_tournee
                            WHERE id_p = :id_pav');
$statements->bindParam(':id_pav', $oldPav);

for ($i = 0; $i < $_POST['taille_old_pav']; $i++)
{   
    $oldPav = $_POST['old_pav' .$i];
    $statements->execute();
}

$statements = $db->prepare('INSERT INTO pav_tournee (id_t, id_p, taux_p, date_p, com_p) 
                            VALUES (:id_tournee, :id_pav, :taux, :date, :com)');
$statements->bindParam(':id_tournee', $_POST['id_t']);
$statements->bindParam(':id_pav', $idPAV);
$statements->bindValue(':taux', 0);
$statements->bindParam(':date', $_POST['date_t']);
$statements->bindValue(':com', 'Votre commentaire');

for ($i = 1; $i < count($_POST); $i++)
{
    $idPAV = $_POST['tournee_id' .($i - 1)];
    $statements->execute();
}

    header("location:http://localhost:8888/projet_pav/?page=tournee/liste_tournee");
?>