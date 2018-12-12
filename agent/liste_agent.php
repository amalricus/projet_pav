<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Liste Agent</title>
    <link rel="stylesheet" type="text/css" href="mise_en_forme.css">
</head>
<body>
<h1>Liste des agents</h1>
<nav>
    <a href="?page=accueil_admin" title="retour à la page home">Accueil</a>
    <a href="?page=agent/formulaire_creation_agent" title="Création d'un agent">Créer un agent</a>
</nav>

<?php

$db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');

$statements = $db->prepare('SELECT id_a, nom_a, prenom_a
                            FROM agent
                            ORDER BY nom_a');
$statements->execute();
$results = $statements->fetchAll();

/*
echo "<pre>";
print_r($results);
echo "<pre>";
*/
echo '<form id="test" action="?page=agent/formulaire_modification_agent" method="POST">';
for ($i=0; $i < count($results); $i++)
{
    echo '<button class="button" type="submit" name="agent_id" value=' .$results[$i]['id_a']. '>' .$results[$i]['nom_a'] ." " .$results[$i]['prenom_a'] .'</button></br>';
}
//echo '<input form="test" type="submit" value="Modifier">';
echo '</form>';
?>
</body>
</html>