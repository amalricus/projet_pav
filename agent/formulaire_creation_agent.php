<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Création des agents</title>
    <link rel="stylesheet" type="text/css" href="mise_en_forme.css">
</head>
<body>


<div class = "drop-shadow" id="container" >
    <div class="box">
            <h2>
                CREATION D'UN AGENT
            </h2>
    </div>
</div>


<div class = "drop-shadow" id="container" >
    <div class="box">
        <form action="?page=agent/creation_agent" method="POST">
            <input size="100" type="text" name="nom_a" placeholder="Nom" required/><br/>
            <input size="100" type="text" name="prenom_a" placeholder="Prénom" required/><br/>
            <input size="100" type="text" name="tel_a" placeholder="Téléphone" required/><br/>
            <input class="button3"type="submit" value="Créer un nouvel agent" /> </>
            <input class="button3" type=button onClick="location.href='?page=agent/liste_agent'" value='Retour'>
        </form>
    </div>
</div>
</body>
</html>