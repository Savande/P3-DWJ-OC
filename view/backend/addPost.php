<?php $title = 'Projet 3 (blog)'; ?>

<?php ob_start(); ?>
<div class="addPost">
    <form action="index.php?action=admin&amp;setPost" method="post">
    <div><br>
        <label class="formTitre" for="author">Titre du billet :</label><br /><br>
        <input type="text" id="title" name="author" /><br>
    </div>
    <div>
        <label class="formTitre" for="post">Texte :</label><br /><br>
        <textarea id="content" name="post"></textarea><br>
    </div>
    <div>
        <input class="validé" type="submit" />
    </div>
    </form><br>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

