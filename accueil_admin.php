<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="mise_en_forme.css">
</head>
<body>
  
<div class = "drop-shadow" id="container" >
    <div class="box">
        <div  class="springy-text" >

            <h2>
                Accueil
            </h2>
        </div>
    </div>
</div>

<div class = "drop-shadow" id="container" >
    <div class="box">
        <!--input class="button3" type=button onClick="location.href='?page=login/deconexion_pav'" value='Se Déconnecter'-->
        <input class="button3" type=button onClick="location.href='?page=pav/liste_pav'" value='Gestion des PAV'>
        <input class="button3" type=button onClick="location.href='?page=tournee/liste_tournee'" value='Gestion des tournées'>
        <input class="button3" type=button onClick="location.href='?page=agent/liste_agent'" value='Gestion des agents'>
        <input class="button3" type=button onClick="location.href='?page=index'" value='Se Déconnecter'>
    </div>
</div>

<div class = "drop-shadow" >
    <div class="box">
        <p>
            Version de l'application - société qui l'a créée - date- etc (en petit en bas de page centré)
        </p>
    </div>
</div>

</body>
</html>


