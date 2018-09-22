<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Projet 4</title>
        <link href="view/frontend/style.css" rel="stylesheet" /> 
    </head>
        
    <body> 

        <?php require('header.php'); ?>

    	<div class="titre"><img src="http://localhost/Projet_3/Dossier%20final%20P3/view/frontend/img/image.JPG" alt="sss"><p><?= $title ?></p></div>
    	
        <?= $content ?>

        <div class="marge"></div>

        <?php require('footer.php'); ?>
    </body>
</html>