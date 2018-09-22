
<?php $title = "Billet simple pour l'Alaska !"; ?>
<?php ob_start(); ?>



<p class="postsTitle">Les derniers épisodes !</p>


<?php
while ($data = $posts->fetch())
{
?>

<a href="index.php?action=post&amp;postId=<?= $data['id'] ?>">

    <div class="indexNews">
        <h3>
            <?= $data['title'] ?>
            
        </h3>
        
        <p>
            <?= substr($data['content'], 0, 120) ?> ...     
        </p>
        <em>le <?= $data['creation_date_fr'] ?></em>

    </div></a>
    
    <?php
}
$posts->closeCursor();
?>

<div class="nbPage">
<p >page <a href="index.php?page=1">1</a>
<?php // Pagination 
$init = 2;
$datas = $nbPost->fetch();

while ( $datas['nb_billets'] >  4) {   

?> <a href="index.php?page=<?= $init ?>"><?php echo $init?></a>

<?php $datas['nb_billets'] -= 4;
$init ++    ;
};

$nbPost->closeCursor();
?>
</p></div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>