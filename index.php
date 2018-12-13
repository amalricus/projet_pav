<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Projet PHP</title>
    <link rel="stylesheet" type="text/css" href="mise_en_forme.css">
</head>
<body>
<div>
<?php
    if (isset($_GET["page"]) 
    && !empty($_GET["page"])
    && $_GET["page"] !== "index") {
        $page = $_GET["page"];
    }else{
        $page = "page_connexion";
    }
    $fileName = $page . ".php";

    if (file_exists($fileName)){
        include($fileName);
    }else{
        echo "La page n'existe pas";
    }
?>
</div>
</body>
</html>