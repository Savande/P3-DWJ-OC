<?php $title = 'Projet 3 (blog)'; ?>

<?php ob_start(); ?>

<h2>Billets</h2>

<form action="index.php?action=admin&amp;setPost" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="title" name="author" />
    </div>
    <div>
        <label for="post">Billets</label><br />
        <textarea id="content" name="post"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>


<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=admin&amp;postId=<?= $data['id'] ?>">Commentaires</a></em>
            <em><a href="index.php?action=admin&amp;delete=<?= $data['id'] ?>">Supprimer</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

adminnnnn