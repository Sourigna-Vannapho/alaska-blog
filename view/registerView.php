<?php $title = 'Billet simple pour l\'Alaska'; ?>
<?php ob_start(); ?>
<h1>Inscription</h1>
<p class="info">Veuillez remplir les champs ci-dessous pour procéder à votre inscription</p>
<form method="POST" action="index.php?action=register_confirm">
	<label>Pseudo : </label><input type="text" name="pseudo"/>
	<label>Mot de passe : </label><input type="password" name="pass"/>
	<br/><br/>
	<input type="submit" value="S'inscrire"/>
</form>
<br/><br/>
<a href='index.php?action=showPosts'>Retour à l'accueil</a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>