<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification tournées</title>
    <link rel="stylesheet" type="text/css" href="mise_en_forme.css">
</head>
<body>
<?php
    $select_tournee = $_POST['tournee_id'];

    $db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');

    // On récupere toutes les données de la table tournée selectioner
    $statements = $db->prepare('SELECT * 
                                FROM tournee
                                WHERE id_t = :id'); 
    $statements->bindParam(':id', $select_tournee);
    $statements->execute();
    $results_tournee = $statements->fetchAll();


    // On récupère l'id et le nom des PAV
    $statements = $db->prepare('SELECT id_p, nom_p 
                                FROM pav
                                ORDER BY nom_p'); 
    $statements->execute();
    $results_pav = $statements->fetchAll();

    
    // On récupère l'id des pav attaché à la tournée selectioner
    $statements = $db->prepare('SELECT id_p 
                                FROM pav_tournee
                                WHERE id_t = :id'); 
    $statements->bindParam(':id', $select_tournee);
    $statements->execute();
    $results_pav_tournee = $statements->fetchAll();

    // On transforme le tableau multidimensionnel en simple array
    $affect_pav = array();
    foreach ($results_pav_tournee as $value)
    {
        $affect_pav[] = $value['id_p'];
    }


    // On récupère l'id, le nom et le prénom des agents
    $statements = $db->prepare('SELECT id_a, nom_a, prenom_a
                                FROM agent'); 
    $statements->execute();
    $results_agent = $statements->fetchAll();

    $agent = array();
    foreach ($results_agent as $value)
    {
        $agent[] = $value['id_a'];
    }

/*
    echo "<pre>";
    print_r($affect_pav);
    echo "<pre>";
    echo $affect_pav[0];
*/

?>


<body>
<div class = "drop-shadow" id="container" >
    <div class="box">

            <h2>MODIFICATION D'UNE TOURNEE</h2>

    </div>
</div>


<div class = "drop-shadow" id="container" >
    <div class="box">
        <form action="?page=tournee/modification_tournee" method="POST">
        <input type="hidden" name="taille_old_pav" value="<?php echo count($affect_pav) ?>" />
        <?php 
            for ($i=0; $i < count($affect_pav); $i++)
            {
                echo '<input type="hidden" name="old_pav' .$i. '"value="' .$affect_pav[$i] .'"/>';
            }
        ?>
        <input type="hidden" name="id_t" value="<?php echo $select_tournee?>"/>
        <input type="text" size="50"  name="numero_t" value="<?php echo $results_tournee[0]['id_t'] ?>" disabled/>
        <input type="datetime" size="50" name="date_t" value="<?php echo $results_tournee[0]['date_t'] ?>"/><br>

        <form class="container2">
        <div>
            <div class="box3">
<?php
                        for ($i=0; $i < count($results_agent); $i++)
                        {
                            if (in_array($results_tournee[$i]['id_a'], $agent))
                            {
                                echo '<label><input type="radio" name="agent_id" value=' .$results_agent[$i]['id_a']. ' checked>' .$results_agent[$i]['nom_a'] ." " .$results_agent[$i]['prenom_a'].'</label></br>';
                            }
                            else
                            {
                                echo '<label><input type="radio" name="agent_id" value=' .$results_agent[$i]['id_a']. '>' .$results_agent[$i]['nom_a'] ." " .$results_agent[$i]['prenom_a'].'</label></br>';
                            }
                        }

                    echo'</div>';
             echo'</div>';
             for ($i=0; $i < count($results_pav); $i++)
             {
                 if (in_array($results_pav[$i]['id_p'], $affect_pav))
                 {
                     echo '<label><input type="checkbox" name="tournee_id' .$i .'" value=' .$results_pav[$i]["id_p"] .' checked>' .$results_pav[$i]['nom_p'].'</label></br>';
                 }
                 else
                 {
                     echo '<label><input type="checkbox" name="tournee_id' .$i .'" value=' .$results_pav[$i]["id_p"] .'>' .$results_pav[$i]['nom_p'].'</label></br>';
                 }
             }

        echo '<div>';
        echo '<div class="box3">';

?>
                    </div>
                </div>
            
    <div class="box">
        <input class="button3" type="submit" value="Valider"/>
        <button class="button3" type="submit" formaction="tournee/suppression_tournee.php">Supprimer</button>
        <input class="button3" type=button onClick="location.href='?page=tournee/liste_tournee'" value='Retour'>
    </div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
