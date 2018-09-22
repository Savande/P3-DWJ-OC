<?php $title = 'Projet 3 (blog)'; ?>

<?php ob_start(); ?>

<table>
    <caption><h1>Commentaires signalés :</h1></caption>

<?php while ($comment = $comments->fetch()){  ?>
         
    <tr>
        <td><p><strong><?= htmlspecialchars($comment['author']) ?></p></td>        
        <td><p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p></td>
        <td><p></strong><?= $comment['comment_date_fr'] ?></p></td>
        <td><p><a class="conf" href="index.php?action=admin&amp;pageComment&amp;reupload=<?= $comment['id'] ?>">confirmer</a></p></td>
        <td><p><a class="delete" href="index.php?action=admin&amp;pageComment&amp;defDel=<?= $comment['id'] ?>">suprimer</a>         </td>

    </tr> 

<?php  }?>
      
</table>
                

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
