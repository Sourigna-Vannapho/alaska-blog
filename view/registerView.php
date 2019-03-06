<?php $title = 'Billet simple pour l\'Alaska'; ?>
<?php ob_start(); ?>
<form method="POST" action="index.php?action=register_confirm">
	<label>Pseudo:</label><input type="text" name="pseudo"/>
	<label>Mot de passe :</label><input type="password" name="pass"/>
	<input type="submit" value="S'inscrire"/>
</form>
<a href='index.php?action=showPosts'>Retour à l'accueil</a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>