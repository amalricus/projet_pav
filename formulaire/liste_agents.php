<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Liste agents</title>
    <link rel="stylesheet" type="text/css" href="mise_en_forme.css">
</head>
<body>
<h1>Selectionnez votre nom</h1>
   
    <?php  
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=bdd_projet_pav;charset=utf8', 'admin', 'cesi');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $statements = $db->prepare('SELECT id_a, nom_a, prenom_a
                                    FROM agent');
        $statements->execute();
        $results_agents = $statements->fetchAll();
/*
        echo "<pre>";
        print_r($results_agents);
        echo "<pre>";
*/

    ?>
<form action="?page=formulaire/liste_pav_tournee" method="POST">


    <?php for($i = 0; $i < count($results_agents); $i++)
    {   
        echo '<button class="button3" type="submit" name="agents_id" value=' .$results_agents[$i]['id_a']. '>' .$results_agents[$i]['nom_a'] ." " .$results_agents[$i]['prenom_a'] .'</button></br>';
        echo '<input type="hidden" name="nom_a" value="' .$results_agents[$i]['nom_a'] .'" />';
        echo '<input type="hidden" name="prenom_a" value="' .$results_agents[$i]['prenom_a'] . '" />';
    }
    ?>
</form>
    <input class="button3" type=button onClick="location.href='?page=index'" value='Se Déconnecter'>
</body>
</html>



