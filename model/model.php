<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

function callPosts(){
	$bdd = new PDO('mysql:host=localhost;dbname=blog_alaska;charset=utf8', 'root', ''); //A modifier par la suite (Effacer le commentaire lorsque effectué)
	$req = $bdd->query('SELECT id,title,content,DATE_FORMAT(entry_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM billets ORDER BY date_creation DESC');
	return $req;
}

function callPost(){
	$bdd = new PDO('mysql:host=localhost;dbname=blog_alaska;charset=utf8', 'root', ''); //A modifier par la suite (Effacer le commentaire lorsque effectué)
	$req = $bdd->prepare('SELECT id,title,content,DATE_FORMAT(entry_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM billets WHERE id = :id');
	$req->execute(array('id' =>$_GET['id']));
	$singlePost = $req->fetch();
	return $singlePost;
}
function callRegister(){
	$pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
	$bdd = new PDO('mysql:host=localhost;dbname=blog_alaska;charset=utf8', 'root', ''); //A modifier par la suite (Effacer le commentaire lorsque effectué)
	$req = $bdd->prepare('INSERT INTO utilisateurs(pseudo,pass,authority) VALUES (:pseudo,:pass,1)');
	$req->execute(array(
		'pseudo' =>$_POST['pseudo'],
		'pass' =>$pass_hash
	));
}
function callLogin(){
	$bdd = new PDO('mysql:host=localhost;dbname=blog_alaska;charset=utf8', 'root', ''); //A modifier par la suite (Effacer le commentaire lorsque effectué)
	$req = $bdd->prepare('SELECT id,pass,pseudo FROM utilisateurs WHERE pseudo = :pseudo');
	$req->execute(array(
		'pseudo'=>$_POST['pseudo']));
	$loginResult = $req->fetch();

	$passwordCheck = password_verify($_POST['pass'],$loginResult['pass']);
	echo $_POST['pass'] . $loginResult['pass'] . $loginResult['pseudo'];
	if (!$loginResult){
	}
	else{
		if($passwordCheck){
			session_start();
			$_SESSION['id'] = $loginResult['id'];
			$_SESSION['pseudo'] = $loginResult['pseudo'];
			echo 'ok';
		}
		else{
		}
	}
}

?>