<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Création des agents</title>
    <link rel="stylesheet" type="text/css" href="mise_en_forme.css">
</head>
<body>
<h1>Création d'un agent</h1>
<form action="?page=agent/creation_agent" method="POST">
    <center> <input type="text" name="nom_a" placeholder="Nom" required/><br/>
        <input type="text" name="prenom_a" placeholder="Prénom" required/><br/>
        <input type="text" name="tel_a" placeholder="Téléphone" required/><br/>
        <input type="submit" value="Créer un nouvel agent" /> </center>
        <input class="button3" type=button onClick="location.href='?page=agent/liste_agent'" value='Retour'>
</form>
</body>
</html>