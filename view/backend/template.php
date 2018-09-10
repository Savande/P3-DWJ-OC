<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="view/backend/style.css" rel="stylesheet" /> 
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="view/backend/jquery.wysibb.min.js"></script>
		<link rel="stylesheet" href="view/backend/wbbtheme.css" />
     
        <script>
			$(function() {
			  $("#title").wysibb();
			  $("#content").wysibb();
			});
		</script>
    </head>
        
    <body>
    	<a href="index.php?action=admin&amp;disconnect">deconnection</a>
        <?= $content ?>
    </body>
</html>