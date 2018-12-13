<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Modification</title>
    <link rel="stylesheet" type="text/css" href="mise_en_forme.css">
</head>
<body>


<div class = "drop-shadow" id="container" >
    <div class="box">
        <h2>
            MODIFICATION DES AGENTS
        </h2>
    </div>
</div>


<?php
$select_pav = $_POST['agent_id'];
//echo $select_pav;

$db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');

$statements = $db->prepare('SELECT * 
                                FROM agent
                                WHERE id_a = :id');
$statements->bindParam(':id', $select_pav);
$statements->execute();
$results = $statements->fetchAll();

/*
    echo "<pre>";
    print_r($results);
    echo "<pre>";
*/

?>

<div class = "drop-shadow" id="container" >
    <div class="box">
    <form action="?page=agent/modification_agent" method="POST">
        <input type="hidden" name="id_a" value="<?php echo $select_pav?>"/>
        <input size="100" type="text" name="nom_a" value="<?php echo $results[0][1]?>"required/><br/>
        <input size="100" type="text" name="prenom_a" value="<?php echo $results[0][2]?>"required/><br/>
        <input size="100" type="text" name="tel_a" value="<?php echo $results[0][3]?>"required/><br/>
        <input class="button3" type="submit" value="Valider"/>
        <button class="button3" type="submit" formaction="?page=agent/suppression_agent">Supprimer</button>
        <input class="button3" type=button onClick="location.href='?page=agent/liste_agent'" value='Retour'>
    </form>
    </div>
</div>
</body>
</html>