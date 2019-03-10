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
	    		<a href='index.php'><i class="fas fa-home"> Accueil </i></a><br/><br/>
	    		<i class="fas fa-user"></i>
				<?php 
				if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
					echo 'Bonjour ' . $_SESSION['pseudo']; ?>
					<br/><br/>
					<a href='index.php?action=logout'>Déconnexion</a> 
					<?php 
					if ($_SESSION['authority'] == 2){ ?>
						<br/><br/>
						<a href='index.php?action=admin_panel'>Panneau administrateur</a>
						<br/>
					<?php 
						if (isset ($_GET['action']) == 'admin_panel'){ ?>
							<a href='index.php?action=admin_panel'>Ajouter billet</a>
						<?php }
					} ?>
					
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
        	<?= $content ?>
   		</section>
    </body>
</html>