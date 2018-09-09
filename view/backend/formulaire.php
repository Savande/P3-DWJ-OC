<?php $title = 'Projet 3 (admin formulaire)'; ?>

<?php ob_start(); ?>


<form action="index.php?action=admin&amp;try" method="post">
	<div>
		<label for="comment">Admin</label><br />
		<textarea id="password" name="password"></textarea>
	</div>
	<div>
		<input type="submit" />
	</div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>