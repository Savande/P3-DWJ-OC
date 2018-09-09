
<?php $title = 'Projet 3 (post)'; ?>

<?php ob_start(); ?>        
 
        <h1>Mon super blog !</h1>
        <p><a href="index.php?action=admin">Retour à la liste des billets</a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['creation_date_fr'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
        </div>
        
        <H2>modifier le post</H2>
        <form action="index.php?action=admin&amp;updatePost&amp;postId=<?= $post['id'] ?>" method="post">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" value="<?= htmlspecialchars($post['title']) ?>">
            </div>
            <div>
                <label for="post">Commentaire</label><br />
                <textarea id="post" name="post"><?= nl2br(htmlspecialchars($post['content'])) ?></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form>

        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            <p><a href="index.php?action=admin&amp;deleteComment&amp;commentId=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>">suprimer</a></p>
        <?php
        }
        ?>
<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>

<h2>Commentaires</h2>

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
ADMINNNNNNNNNNNNNN