<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Modification PAV</title>
    <link rel="stylesheet" type="text/css" href="mise_en_forme.css">
</head>
<body>
    
 
<div class = "drop-shadow" id="container" >
    <div class="box">
            <h2>
                MODIFICATION DE PAV
            </h2>
    </div>
</div>   
    
<?php
    $select_pav = $_POST['pav_id'];
    //echo $select_pav;

    $db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');

    $statements = $db->prepare('SELECT * 
                                FROM pav
                                WHERE id_p = :id');                  
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
        <form action="pav/modification_pav.php" method="POST">
        <input type="hidden" size="50" name="id_p" value="<?php echo $select_pav?>"/>
        <input type="text" size="50" name="nom_p" value="<?php echo $results[0][1]?>"required/><br/>
        <input type="text" size="50" name="numrue_p" value="<?php echo $results[0][2]?>"required/><br/>
        <input type="text" size="50" name="rue_p" value="<?php echo $results[0][3]?>"required/><br/>
        <input type="int" size="50" pattern="[0-9]{5}" name="cp_p" value="<?php echo $results[0][4]?>"required/><br/>
        <input type="text" size="50"  name="ville_p" value="<?php echo $results[0][5]?>"required/><br/>
        <input class="button3" type="submit" value="Valider"/>
        <button class="button3" type="submit" formaction="pav/suppression_pav.php">Supprimer</button>
        <input class="button3" type=button onClick="location.href='?page=pav/liste_pav'" value='Retour'>
        </form>
</div>
</div>
</body>
</html>
