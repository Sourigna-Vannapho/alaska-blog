<?php $title = 'Billet simple pour l\'Alaska'; ?>
<?php ob_start(); ?>
<h1>Inscription</h1>
<p class="info">Veuillez remplir les champs ci-dessous pour procéder à votre inscription</p>
<p class="info"> Notez que si vous entrez des espaces de part et d'autre de votre nom d'utilisateur/mot de passe souhaité, ceux ci seront retirés lors de l'inscription</p>
<form id="registerForm" method="POST" action="index.php?action=register_confirm">
	<label>Pseudo : </label><input type="text" name="pseudo" required/><br/><br/>
	<label>Mot de passe : </label><input type="password" name="pass" required/>
	<br/><br/>
	<input type="submit" value="S'inscrire"/>
</form>
<br/><br/>
<?php 
if (isset($_GET['existing_user'])){
	if ($_GET['existing_user'] == true){
?>		<p class='warning'>Ce nom d'utilisateur est déjà utilisé où n'est pas correctement rempli</p>
<?php
	}
}
?>
<br/>
<a href='index.php?action=showPosts'>Retour à l'accueil</a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>