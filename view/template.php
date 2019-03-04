<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
    	<div>
    		<a href='index.php?action=register'>Inscription</a>
    	</div>
    	<div>
    		<p>Se connecter</p>
    		<form method="POST" action="index.php?action=login_confirm">
    			<label>Pseudo</label><input type="text" name="pseudo"/>
    			<label>Mot de passe</label><input type="password" name="pass"/>
    			<input type="submit" value="Se connecter">
    		</form>
    	</div>
    	<div>
			<?php if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
					{
					    echo 'Bonjour ' . $_SESSION['pseudo'];
					} ?>
			    <a href='index.php?action=logout'>Déconnexion</a>
			
    	</div>

        <?= $content ?>
    </body>
</html>