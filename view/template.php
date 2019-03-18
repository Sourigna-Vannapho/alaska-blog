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
        <script src='https://cloud.tinymce.com/5/tinymce.min.js?apiKey=6e98t8myxa3tv4dorwagpgmtq22yc8nu3hu5pk5iubtw4vkb'></script>
  		<script>tinymce.init({
    selector: '#mytextarea'
  });
  </script>
    </head>
        
    <body>
    	<section id='loginSection'>
	    	<div>
	    		<a id='accueil' href='index.php'><i class="fas fa-home"></i>Accueil </a><br/><br/>
	    		<i class="fas fa-user"></i>
				<?php 
				if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
					echo 'Bonjour ' . $_SESSION['pseudo']; ?>
					<br/><br/>
					<a href='index.php?action=logout'><i class="fas fa-sign-out-alt"></i>Déconnexion</a> 
					<?php 
					if ($_SESSION['authority'] == 2){ ?>
						<br/><br/>
						<a href='index.php?action=admin_panel'>Panneau administrateur</a>
						<br/><br/>
					<?php 
						if ((isset ($_GET['action']))){
							if ($_GET['action'] == 'admin_panel' || $_GET['action'] =='add_entry' || $_GET['action'] =='admin_comment')
						{ ?>
							<p>Fonctions administrateur</p>
							<a href='index.php?action=add_entry'>Ajouter billet</a>
							<br/>
							<a href='index.php?action=admin_comment'>Signalement commentaires</a>
						<?php }
					}} ?>
					
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
	    		<br/>
	    		<?php if (isset($_GET['login_fail'])){
	    			if ($_GET['login_fail'] == true)
	    			echo 'Identifiant ou mot de passe incorrect';
	    		} 
	    		?>
	    	</div><?php
				} 
			?>
		</section>
			
		<section id='blogSection'>
        	<?= $content ?>
   		</section>
    </body>
</html>