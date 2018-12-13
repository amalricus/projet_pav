<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Taux de remplissage du PAV</title>
    <link rel="stylesheet" type="text/css" href="mise_en_forme.css">
</head>
<body>

<div class = "drop-shadow" id="container" >
    <div class="box">
        <h2>
            REMPLISSAGE DES PAV
        </h2>
    </div>
</div>
<?php

/*
echo "<pre>";
print_r($_POST);
echo "<pre>";
*/

echo '<h2> Tournée ' .$_POST['id_t'] .'</h2>';
echo '<h2>' .$_POST['nom_a'] ." " .$_POST['prenom_a'] .'</h2>';
echo '<h2> Date de la tournée : ' .$_POST['date_t'] .'</h2>';


$select_pav = $_POST['pav_id'];

$db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');

$statements = $db->prepare('SELECT * 
                            FROM pav
                            WHERE id_p = :id');
$statements->bindParam(':id', $select_pav);
$statements->execute();
$results = $statements->fetchAll();

?>


<div class = "drop-shadow" id="container" >
    <div class="box">
<h2><?php echo $results[0][1]?></h2>

    <form action="?page=formulaire/traitement_remplissage" method="POST">
        <input type="hidden" name="id_p" value="<?php echo $select_pav?>"/>
        <input type="hidden" name="id_t" value="<?php echo $_POST['id_t'] ?>" />
        <input type="radio" name="taux_p" value="0" checked>Taux 0%<br>
        <input type="radio" name="taux_p" value="25">Taux 25%<br>
        <input type="radio" name="taux_p" value="50">Taux 50%<br>
        <input type="radio" name="taux_p" value="75">Taux 75%<br>
        <input type="radio" name="taux_p" value="100">Taux 100%<br>
        <textarea rows="3" cols="30" name="com_p" placeholder="Commentaires"></textarea><br>
    </div>
</div>
        <div class = "drop-shadow" id="container" >
            <div class="box">
        <input class="button3" type="submit" value="Valider"/>
    </form>


    <!-- Bouton Retour -->
    <form action="?page=formulaire/liste_pav_tournee" method="POST">

        <input type="hidden" name="id_t" value="<?php echo $_POST['id_t'] ?>" />
        <input type="hidden" name="nom_a" value="<?php echo $_POST['nom_a'] ?>" />
        <input type="hidden" name="prenom_a" value="<?php echo $_POST['prenom_a'] ?>" />
        <input type="hidden" name="agents_id" value="<?php echo $_POST['agents_id'] ?>" />
        <input class="button3" type="submit" value="Retour">

    </form>
    </div>
</div>

    </div>
    </div>
</div>
</body>
</html>
