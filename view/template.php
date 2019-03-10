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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
        
    <body>
    	<section id='loginSection'>
	    	<div>
	    		<i class="fas fa-user"></i>
				<?php 
				if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
					echo 'Bonjour ' . $_SESSION['pseudo']; ?>
					<a href='index.php?action=logout'>Déconnexion</a> 
			</div> <?php }
				else{ ?>    	
			<div>
	    		<a href='index.php?action=register'>Inscription</a>
	    	</div>
	    	<div>
	    		<p>Se connecter</p>
	    		<form method="POST" action="index.php?action=login_confirm">
	    			<label>Pseudo : <br/></label><input type="text" name="pseudo"/>
	    			<br/><br/>
	    			<label>Mot de passe : <br/></label><input type="password" name="pass"/>
	    			<br/><br/>
	    			<input type="submit" value="Se connecter">
	    		</form>
	    	</div><?php
				} ?>
		</section>
			
		<section id='blogSection'>
			<h1>Billet simple pour l'Alaska</h1>
        	<?= $content ?>
   		</section>
    </body>
</html>