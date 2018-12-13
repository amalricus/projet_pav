<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Liste Agent</title>
    <link rel="stylesheet" type="text/css" href="mise_en_forme.css">
</head>
<body>

<div class = "drop-shadow" id="container" >
    <div class="box">
        <h2>
            LISTE DES AGENTS
        </h2>
    </div>
</div>


<div class = "drop-shadow" id="container" >
    <div class="box">
<nav>
    <a href="?page=accueil_admin" class="button3" title="retour à la page home">Accueil</a>
    <a href="?page=agent/formulaire_creation_agent" class="button3" title="Création d'un agent">Créer un agent</a>
</nav>


<div class = "drop-shadow" id="container" >
    <div class="box2" overflow="scroll">
        <TABLE  width=100%>
            <TR>
                <TH> NOM </TH>
                <TH> PRENOM </TH>
            </TR>
    </div>
</div>

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
    echo '<TR><TH><button class="button3" type="submit" name="agent_id" value=' .$results[$i]['id_a']. '>' .$results[$i]['nom_a'] .'</button></TH>';

    echo   '<TH width=40%><type="text" name="prenom" value='.$results[$i]['prenom_a']. '>' .$results[$i]['prenom_a'].' </TH></TR>';


}
//echo '<input form="test" type="submit" value="Modifier">';
echo '</form>';
?>
</body>
</html>