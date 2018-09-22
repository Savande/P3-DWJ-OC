
<?php $title = 'Projet 3 (post)'; ?>

<?php ob_start(); ?>       
<div class="addPost"><br>

    <form action="index.php?action=admin&amp;updatePost&amp;postId=<?= $post['id'] ?>" method="post">
    <div>
        <label class="formTitre" for="author">Titre :</label><br /><br>
        <input type="text" id="postTitle" name="author" value="<?= htmlspecialchars($post['title']) ?>"><br>
    </div>
    <div>
        <label class="formTitre"for="post">Contenu du billets :</label><br /><br>
        <textarea id="postContent" name="post"><?= nl2br(htmlspecialchars($post['content'])) ?></textarea><br>
    </div>
    <div>
        <input class="validé" type="submit" />
    </div>
    </form><br>
</div>

<div class="comments">
    <h2>Commentaires</h2>

    <?php
    while ($comment = $comments->fetch())
    {
        ?>
        <div class="comment">
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <p>le <?= $comment['comment_date_fr'] ?></p>
        <p><a class="delete" href="index.php?action=admin&amp;deleteComment&amp;commentId=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>">suprimer</a></p>
</div>        
<?php
    }
    ?>
<div class="commentForm">
    <h2>Ajouté votre commentaire</h2>

    <form action="index.php?action=admin&amp;addComment&amp;postId=<?= $post['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
</div>
</div>


<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>

