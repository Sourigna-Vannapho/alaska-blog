<?php 
if(!isset($_SESSION)) 
	{ 
        session_start(); 
    }
    
class LoginManager{
	function callRegister(){
	$bdd = $this->databaseConnect();
	$requestPseudo = $bdd->prepare('SELECT pseudo FROM utilisateurs WHERE pseudo = :pseudo');
	$requestPseudo->execute(array('pseudo'=>$_POST['pseudo']));
	$pseudoAvailable = $requestPseudo->fetch();
	if (!$pseudoAvailable){
		$pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$req = $bdd->prepare('INSERT INTO utilisateurs(pseudo,pass,authority) VALUES (:pseudo,:pass,1)');
		$req->execute(array(
			'pseudo' =>$_POST['pseudo'],
			'pass' =>$pass_hash
		));
	}
	else{	
	}
	return $pseudoAvailable;
	}
	function callLogin(){
	$bdd = $this->databaseConnect();
	$req = $bdd->prepare('SELECT id,pass,pseudo,authority FROM utilisateurs WHERE pseudo = :pseudo');
	$req->execute(array(
		'pseudo'=>$_POST['pseudo']));
	$loginResult = $req->fetch();
	$passwordCheck = password_verify($_POST['pass'],$loginResult['pass']);
	if (!$loginResult){
		return true;
	}
	else{
		if($passwordCheck){
			session_start();
			$_SESSION['id'] = $loginResult['id'];
			$_SESSION['pseudo'] = $loginResult['pseudo'];
			$_SESSION['authority'] = $loginResult['authority'];
		}
		else{
			return true;
			
		}
	}
	}
	function databaseConnect(){
	$db = new PDO('mysql:host=localhost;dbname=blog_alaska;charset=utf8', 'root', ''); //A modifier par la suite (Effacer le commentaire lorsque effectué)
	return $db;

	}	
}