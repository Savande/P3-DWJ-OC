<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title><?= $title ?></title>
  <link href="view/backend/style.css" rel="stylesheet" /> 

  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=08pnebmdzm16am2m5bwwokpwd2svohoz9b2kv14cy7k7f8ak"></script>

</head>

<script>

  tinymce.init({
    selector: '#content', 
    
    height: 405,

  });

  tinymce.init({
    selector: '#postContent', 

    height: 405,

  });
</script>

<body>
  <?php require('header.php'); ?>


  <?= $content ?>
<div class="marge"></div>
  <?php require('footer.php'); ?>

</body>
</html>

