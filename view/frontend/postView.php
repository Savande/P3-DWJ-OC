<?php $title = $post['title']; ?> 
<?php ob_start(); ?>        
<div class="postContent">
    <div class="post">
        <div class="news">
            <p>
                <?= ($post['content']) ?>
            </p>
            <h3>
                <em>le <?= $post['creation_date_fr'] ?></em>
            </h3>
        </div>

        <h2>Commentaires</h2> 

        <?php
        while ($comment = $comments->fetch())
        {
            ?>
            <div class="comments">
                <p><strong><?= htmlspecialchars($comment['author']) ?></strong>                 
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                <p>le <?= $comment['comment_date_fr'] ?></p>
                <a class="rep" href="index.php?action=report&amp;report=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>">Signaler</a>
            </div>
        <?php
        }
        ?>
        <div class="comment"><h2>Ajouté un commentaire</h2>
        <form action="index.php?action=post&amp;addComment&amp;postId=<?= $post['id'] ?>" method="post">
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

    
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>    