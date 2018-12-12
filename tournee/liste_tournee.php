<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Liste des tournees</title>
    <link rel="stylesheet" type="text/css" href="mise_en_forme.css">
</head>
<body>

<div class = "drop-shadow" id="container" >
    <div class="box">

            <h2>
                LISTE DES TOURNEES
            </h2>

    </div>
</div>


<div class = "drop-shadow" id="container" >
    <div class="box">
        <nav>
            <a class="button3" href="?page=accueil_admin" title="retour à la page home">Accueil</a>
            <a class="button3" href="?page=tournee/formulaire_creation_tournee" title="Création d'une tournee">Création tournée</a>
        </nav>
    </div>
</div>


<div class = "drop-shadow" id="container" >
    <div class="box2" overflow="scroll">
        <TABLE  width=100%>
            <TR>
                <TH> SELECTIONNEZ UNE TOURNEE </TH>
                <TH> DATE ET HEURE</TH>
                <TH> NOM AGENT </TH>
            </TR>
    </div>
</div>


<?php
$db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');
$statements = $db->prepare('SELECT id_t, numero_t, date_t, id_a
                                FROM tournee');
$statements->execute();
$results_tournee = $statements->fetchAll();
$statements = $db->prepare('SELECT nom_a, prenom_a
                                FROM agent
                                WHERE id_a = :id');
$statements->bindParam('id', $idAgent);
echo '<form id="test" action="?page=tournee/formulaire_modification_tournee" method="POST">';
for ($i=0; $i < count($results_tournee); $i++)
{
    $idAgent = $results_tournee[$i]['id_a'];
    $statements->execute();
    $results_agent = $statements->fetchAll();

    echo '<TR><TH><button class="button3" type="submit" name="tournee_id" value=' .$results_tournee[$i]['id_t'].'>' .$results_tournee[$i]['id_t'].' </button></TH> ';
    echo   '<TH width=40%><type="text" name="date et heure" value='.$results_tournee[$i]['date_t'] . '>' .$results_tournee[$i]['date_t'].' </TH>';
    echo   '<TH width=20%><type="text" name="nom agent" value='.$results_agent[0]['nom_a'] ." " .$results_agent[0]['prenom_a']. '>' .$results_agent[0]['nom_a'] ." " .$results_agent[0]['prenom_a'].' </TH></TR>';
}
    echo '</form>';
?>

</TABLE>
</body>
</html>
