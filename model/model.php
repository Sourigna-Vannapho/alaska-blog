<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

function callPosts(){
	$bdd = databaseConnect();
	$req = $bdd->query('SELECT billets.id,billets.title,billets.content,DATE_FORMAT(billets.entry_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation, COUNT(commentaires.id_billet) nombreComm
		FROM commentaires 
		RIGHT JOIN billets on commentaires.id_billet=billets.id
		GROUP BY billets.id
		ORDER BY date_creation DESC');
	return $req;
}

function callPost($postId){
	$bdd = databaseConnect();
	$req = $bdd->prepare('SELECT id,title,content,DATE_FORMAT(entry_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM billets WHERE id = :id');
	$req->execute(array('id' =>$postId));
	$singlePost = $req->fetch();
	return $singlePost;
}
function callComments($postId){
	$bdd = databaseConnect();
	$comment = $bdd->prepare('SELECT utilisateurs.pseudo AS pseudo,commentaires.id_billet,commentaires.content AS comment,commentaires.report_status, DATE_FORMAT(commentaires.date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation 
		FROM commentaires 
		INNER JOIN utilisateurs ON commentaires.id_pseudo=utilisateurs.id
		WHERE commentaires.id_billet = :id_billet
		ORDER BY date_creation DESC'
		);
	$comment->execute(array('id_billet' =>$postId));
	return $comment;
}

function commentRegister($postId){
	$bdd=databaseConnect();
	$req = $bdd->prepare('INSERT INTO commentaires(id_pseudo,id_billet,content,date)VALUES(:id_pseudo,:id_billet,:content, NOW())');
	$req->execute(array(
	'id_pseudo'=>$_SESSION['id'],
	'id_billet'=>$postId,
	'content'=>$_POST['comment']));
}

function callRegister(){
	$bdd = databaseConnect();
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
		header('Location:index.php');
	}
	else{
		header('Location:index.php?action=register');
	}
}


function callLogin(){
	$bdd = databaseConnect();
	$req = $bdd->prepare('SELECT id,pass,pseudo,authority FROM utilisateurs WHERE pseudo = :pseudo');
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
			$_SESSION['authority'] = $loginResult['authority'];
		}
		else{
		}
	}
}

function postEntry(){
	$bdd = databaseConnect();
	$req = $bdd->prepare('INSERT INTO billets(title,content,entry_date) VALUES (:title,:content,NOW())');
	$req->execute(array(
		'title'=>$_POST['entryTitle'],
		'content'=>$_POST['entryContent']));
}

function databaseConnect(){
	$db = new PDO('mysql:host=localhost;dbname=blog_alaska;charset=utf8', 'root', ''); //A modifier par la suite (Effacer le commentaire lorsque effectué)
	return $db;

}
?>