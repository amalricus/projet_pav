<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Liste PAV</title>
    <link rel="stylesheet" type="text/css" href="mise_en_forme.css">
</head>
<body>


<div class = "drop-shadow" id="container" >
    <div class="box">

            <h2>
                LISTE DES PAV A MODIFIER
            </h2>
    </div>
</div>



<div class = "drop-shadow" id="container" >
    <div class="box">
        <nav>
            <a class="button3" href="?page=accueil_admin" title="retour à la page home">Accueil</a>
            <a class="button3" href="?page=pav/formulaire_creation_pav" title="Création d'un pav">Création PAV</a>
        </nav>
    </div>
</div>


<div class = "drop-shadow" id="container" >
    <div class="box2" overflow="scroll">
        <TABLE  width=100%>
            <TR>
                <TH> NOM DU PAV </TH>
                <TH> NUMERO DE RUE </TH>
                <TH> NOM DE RUE </TH>
                <TH> CODE POSTAL </TH>
            </TR>
    </div>
</div>


<?php

$db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');
$statements = $db->prepare('SELECT * FROM pav');
$statements->execute();
$results = $statements->fetchAll();

echo '<form action="?page=pav/formulaire_modification_pav" method="POST">';

for ($i=0; $i < count($results); $i++)
{
    echo '<TR><TH><button class="button3" type="submit" name="pav_id" value=' .$results[$i]['id_p']. '>' .$results[$i]['nom_p'] .'</button></TH>';
    echo   '<TH width=10%><type="text" name="numrue_pav" value='.$results[$i]['numrue_p']. '>' .$results[$i]['numrue_p'].' </TH>';
    echo   '<TH width=40%><type="text" name="rue_pav" value='.$results[$i]['rue_p']. '>' .$results[$i]['rue_p'].' </TH>';
    echo   '<TH width=20%><type="text" name="cp_pav" value='.$results[$i]['cp_p']. '>' .$results[$i]['cp_p'].' </TH></TR>';
}
echo '</form>';
?>

</TABLE>
</body>
