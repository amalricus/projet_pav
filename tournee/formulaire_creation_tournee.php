<!DOCTYPE html>
<html lang="fr">
<head>s
    <meta charset="UTF-8">
    <title>Création tournée</title>
    <link rel="stylesheet" type="text/css" href="mise_en_forme.css">
</head>
<body>
<?php
    $db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');

    $statements = $db->prepare('SELECT id_t
                                FROM tournee
                                ORDER BY id_t DESC
                                LIMIT 1'); 
    $statements->execute();
    $results_tournee = $statements->fetchAll();


    $statements = $db->prepare('SELECT id_p, nom_p 
                                FROM pav
                                ORDER BY nom_p'); 
    $statements->execute();
    $results_pav = $statements->fetchAll();


    $statements = $db->prepare('SELECT id_a, nom_a, prenom_a 
                                FROM agent'); 
    $statements->execute();
    $results_agent = $statements->fetchAll();
/*
    echo "<pre>";
    print_r($results_agent);
    echo "<pre>";
*/

?>

<div class = "drop-shadow" id="container" >
    <div class="box">
            <h2>
                CREATION D'UNE TOURNEE
            </h2>
    </div>
</div>


<div class = "drop-shadow" id="container" >
    <div class="box">
        <form action="tournee/creation_tournee.php" method="POST">
            <input type="text" name="numero_t" value= "<?php echo $results_tournee[0]['id_t'] + 1 ?>" />
            <input type="datetime-local" placeholder="indiquez une date" name="date_t"/></br>    
    
<?php
   
    for ($i=0; $i < count($results_pav); $i++) 
    { 
       echo '<label><input class="pav_tournee" type="checkbox" name="tournee_id' .$i. '" value=' .$results_pav[$i]['id_p']. '>' .$results_pav[$i]['nom_p'].'</label></br>';   
    }
   
                   
    echo '<div class="box">';
                   
    for ($i=0; $i < count($results_agent); $i++) 
    { 
        echo '<label><input type="radio" class="button3" name="agent_id" value=' .$results_agent[$i]['id_a']. '>' .$results_agent[$i]['nom_a'] ." " .$results_agent[$i]['prenom_a'].'</label></br>';   
    }
   echo '<input class="button3" type="submit" value="Créer nouvelle tournée" />';
?>
    <input class="button3" type=button onClick="location.href='?page=tournee/liste_tournee'" value='Retour'>

</form>
</div>
</body>
</html>
