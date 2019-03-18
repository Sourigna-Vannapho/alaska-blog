<?php
class CommentManager
{

function callComments($postId){
	$bdd = $this->databaseConnect();
	$comment = $bdd->prepare('SELECT utilisateurs.pseudo AS pseudo,commentaires.id_billet,commentaires.id,commentaires.content AS comment,commentaires.report_status, DATE_FORMAT(commentaires.date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation 
		FROM commentaires 
		INNER JOIN utilisateurs ON commentaires.id_pseudo=utilisateurs.id
		WHERE commentaires.id_billet = :id_billet
		ORDER BY date_creation DESC'
		);
	$comment->execute(array('id_billet' =>$postId));
	return $comment;
	}

function commentRegister($postId){
	$bdd = $this->databaseConnect();
	$req = $bdd->prepare('INSERT INTO commentaires(id_pseudo,id_billet,content,date)VALUES(:id_pseudo,:id_billet,:content, NOW())');
	$req->execute(array(
	'id_pseudo'=>$_SESSION['id'],
	'id_billet'=>$postId,
	'content'=>$_POST['comment']));
	}

function deleteComments($postId){
	$bdd = $this->databaseConnect();
	$req = $bdd->prepare('DELETE FROM commentaires WHERE id_billet = :id');
	$req->execute(array('id'=>$postId));
	}

function commentReport($commentId){
	$bdd = $this->databaseConnect();
	$req = $bdd->prepare('UPDATE commentaires SET report_status = report_status+1 WHERE id = :commentId');
	$req->execute(array(
		'commentId' =>$commentId));
	}


function reportedComments(){
	$bdd = $this->databaseConnect();
	$req = $bdd->query('SELECT commentaires.id AS comment_id,commentaires.id_pseudo,commentaires.id_billet,commentaires.content,commentaires.report_status,billets.id AS billet_id,billets.title,DATE_FORMAT(billets.entry_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation,
		utilisateurs.pseudo
		FROM commentaires 
		RIGHT JOIN billets on commentaires.id_billet=billets.id
		INNER JOIN utilisateurs on utilisateurs.id=commentaires.id_pseudo
		ORDER BY commentaires.report_status DESC');
	return $req;
	}

function deleteReportedComment($commentId){
	$bdd = $this->databaseConnect();
	$comment = $bdd->prepare('DELETE FROM commentaires WHERE id=:commentId');
	$comment->execute(array('commentId'=>$commentId));
	}

function databaseConnect(){
	$db = new PDO('mysql:host=localhost;dbname=blog_alaska;charset=utf8', 'root', ''); //A modifier par la suite (Effacer le commentaire lorsque effectué)
	return $db;
	}
}
?>