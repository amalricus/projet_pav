<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Création PAV</title>
    <link rel="stylesheet" type="text/css" href="../mise_en_forme.css">
</head>
<body>
    

<div class = "drop-shadow" id="container" >
    <div class="box">
    
        <h2>
            CREATION d'UN PAV
        </h2>

</div>

<div class = "drop-shadow" id="container" >
    <div class="box">  
        <form action="pav/creation_pav.php" method="POST">
            <input type="text" size="50" name="nom_p" placeholder="Quartier - Ville" required/><br/>
            <input type="text" size="50"name="numrue_p" placeholder="Numéro de rue" required/><br/>
            <input type="text" size="50"name="rue_p" placeholder="Rue" required/><br/>
            <input type="int" size="50"name="cp_p" placeholder="Code postal" required/><br/>
            <input type="text" size="50"name="ville_p" placeholder="Ville" required/><br/>
            <input class="button3" type="submit"size="50" value="Créer nouveau PAV" />
            <input class="button3" type=button onClick="location.href='?page=pav/liste_pav'" value='Retour'>
        </form>
        
    </div>
</body>
</html>
