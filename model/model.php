<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

function callPosts(){
	$bdd = databaseConnect();
	$req = $bdd->query('SELECT id,title,content,DATE_FORMAT(entry_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM billets ORDER BY date_creation DESC');
	return $req;
}

function callPost(){
	$bdd = databaseConnect();
	$req = $bdd->prepare('SELECT id,title,content,DATE_FORMAT(entry_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM billets WHERE id = :id');
	$req->execute(array('id' =>$_GET['id']));
	$singlePost = $req->fetch();
	return $singlePost;
}
function callComments(){
	$bdd = databaseConnect();
	$comment = $bdd->prepare('SELECT utilisateurs.pseudo AS pseudo,commentaires.id_billet,commentaires.content AS comment,commentaires.report_status, DATE_FORMAT(commentaires.date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation 
		FROM commentaires 
		INNER JOIN utilisateurs ON commentaires.id_pseudo=utilisateurs.id
		WHERE commentaires.id_billet = :id_billet'
		);
	$comment->execute(array('id_billet' =>$_GET['id']));
	return $comment;
}

function commentRegister(){
	$bdd=databaseConnect();
	$req = $bdd->prepare('INSERT INTO commentaires(id_pseudo,id_billet,content,date)VALUES(:id_pseudo,:id_billet,:content, NOW())');
	$req->execute(array(
	'id_pseudo'=>$_SESSION['id'],
	'id_billet'=>$_GET['id'],
	'content'=>$_POST['comment']));
}

function callRegister(){
	$bdd = databaseConnect();
	$requestPseudo = $bdd->prepare('SELECT pseudo FROM utilisateurs WHERE pseudo = :pseudo');
	$requestPseudo->execute(array('pseudo'=>$_POST['pseudo']));
	$pseudoAvailable = $requestPseudo->fetch();
	if (!$pseudoAvailable){
		echo 'Pseudo dispo';
		$pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$req = $bdd->prepare('INSERT INTO utilisateurs(pseudo,pass,authority) VALUES (:pseudo,:pass,1)');
		$req->execute(array(
			'pseudo' =>$_POST['pseudo'],
			'pass' =>$pass_hash
		));
		header('Location:index.php');
	}
	else{
		echo 'Pseudo non dispo';
		header('Location:index.php?action=register');
	}
}


function callLogin(){
	$bdd = databaseConnect();
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
		}
		else{
		}
	}
}

function databaseConnect(){
	$db = new PDO('mysql:host=localhost;dbname=blog_alaska;charset=utf8', 'root', ''); //A modifier par la suite (Effacer le commentaire lorsque effectué)
	return $db;

}
?>