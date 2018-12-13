<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des PAV à relever</title>
    <link rel="stylesheet" type="text/css" href="mise_en_forme.css">
</head>
<body>

<div class = "drop-shadow" id="container" >
    <div class="box">
        <h2>
            TOURNEE
        </h2>
    </div>

</div>


<div class = "drop-shadow" id="container" >
    <div class="box">
<?php

//$nom_agent = $_POST['nom_a'];
//$prenom_agent = $_POST['prenom_a'];


$db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');

$statements = $db->prepare('SELECT nom_a, prenom_a
                            FROM agent
                            WHERE id_a = :id_agent');

$statements->bindValue(':id_agent', $_POST['agents_id']);
$statements->execute();
$results_agents = $statements->fetchAll();


$statements = $db->prepare('SELECT id_t, date_t
                            FROM tournee
                            WHERE id_a = :id');
$statements->bindValue(':id', $_POST['agents_id']);
$statements->execute();
$results_tournee_agent = $statements->fetchAll();

/*
echo "<pre>";
print_r($results_agents);
print_r($_POST);
echo "<pre>";
*/

echo '<h2>Tournée affectée à : ' .$results_tournee_agent[0]['id_t'] .'</h2>';
echo '<h2>' .$results_agents[0]['nom_a'] ." " .$results_agents[0]['prenom_a'] .'</h2>';
echo '<h3>Date de la tournée : ' .$results_tournee_agent[0]['date_t'] .'</h3>';

$statements = $db->prepare('SELECT id_p
                            FROM pav_tournee
                            WHERE id_t = :id_tournee');
$statements->bindParam(':id_tournee', $results_tournee_agent[0]['id_t']);
$statements->execute();
$results_pav = $statements->fetchAll();

$statements = $db->prepare('SELECT nom_p
                            FROM pav
                            WHERE id_p = :id_pav');
$statements->bindParam(':id_pav', $idPav);

?>
<form action="?page=formulaire/formulaire_remplissage_taux" method="POST">
    <?php
        for ($i=0; $i < count($results_pav); $i++) { 

            $idPav = $results_pav[$i]['id_p'];
            $statements->execute();
            $results_nom_pav = $statements->fetchAll();
            echo '<button class="button3" type="submit" name="pav_id" value=' .$results_pav[$i]['id_p']. '>' .$results_nom_pav[0]['nom_p']. '</button></br>';
        }

        echo '<input type="hidden" name="id_t" value="' .$results_tournee_agent[0]['id_t'] .'" />';
        echo '<input type="hidden" name="nom_a" value="' .$nom_agent .'" />';
        echo '<input type="hidden" name="prenom_a" value="' .$prenom_agent . '" />';
        echo '<input type="hidden" name="date_t" value="' .$results_tournee_agent[0]['date_t'] .'" />';
        echo '<input type="hidden" name="agents_id" value="' .$_POST['agents_id'] .'" />';
    ?>
</form>
<input class="button3" type=button onClick="location.href='?page=formulaire/liste_agents'" value='Retour'>
    </div>
</div>
</body>
</html>

