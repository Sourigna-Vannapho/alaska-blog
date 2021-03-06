<?php 
if(!isset($_SESSION)) 
	{ 
        session_start(); 
    }

require_once("model/Manager.php");

class LoginManager extends Manager{

	//Trim done to avoid blank spaces at start and end of username/password
	function callRegister(){
	$trimmedPseudo = trim($_POST['pseudo']);
	$trimmedPassword = trim($_POST['pass']);
	if ($trimmedPseudo !== '' && $trimmedPassword !== ''){
	$bdd = $this->databaseConnect();
	$requestPseudo = $bdd->prepare('SELECT pseudo FROM utilisateurs WHERE pseudo = :pseudo');
	$requestPseudo->execute(array('pseudo'=>$trimmedPseudo));
	$pseudoAvailable = $requestPseudo->fetch();
		if (!$pseudoAvailable){
			$pass_hash = password_hash($trimmedPassword, PASSWORD_DEFAULT);
			$req = $bdd->prepare('INSERT INTO utilisateurs(pseudo,pass,authority) VALUES (:pseudo,:pass,1)');
			$req->execute(array(
				'pseudo' =>$trimmedPseudo,
				'pass' =>$pass_hash
			));
		}
		else{	
		}
		return $pseudoAvailable;
	}
	else {
	return true;}}

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
}