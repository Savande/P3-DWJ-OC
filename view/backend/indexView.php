<?php $title = 'Projet 3 (blog)'; ?>

<?php ob_start(); ?>

<table class="viewTable">

    <caption><h1>Derniers billets du blog :</h1></caption>

<?php  while ($data = $posts->fetch()) {  ?>
                
    <tr>
                

        <td><h3><?= $data['title'] ?></h3></td>
        
        <td><p><?= substr($data['content'], 0, 120) ?> ... </p></td>    
        <td><p>le <?= $data['creation_date_fr'] ?></p> </td>
        <td><p><a href="index.php?action=admin&amp;postId=<?= $data['id'] ?>">éditer</a></p></td>   
        <td><p><a class="delete" href="index.php?action=admin&amp;delete=<?= $data['id'] ?>">Supprimer</a></p></td>    
      </tr>                
     
<?php }
 $posts->closeCursor(); ?>


                           
  
</table>  

<div class="nbPage">
<p >page <a href="index.php?action=admin&amp;page=1">1</a>
<?php // Pagination 
$init = 2;
$datas = $nbPost->fetch();

while ( $datas['nb_billets'] >  4) {   

?> <a href="index.php?action=admin&amp;page=<?= $init ?>"><?php echo $init?></a>

<?php $datas['nb_billets'] -= 4;
$init ++    ;
};

$nbPost->closeCursor();
?>
</p></div>              

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
