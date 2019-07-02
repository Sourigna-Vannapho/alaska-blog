<?php
require_once("model/Manager.php");

class PostManager extends Manager{

	// Join between commentaires and utilisateurs to solely grab and then display the amount of comments in a given entry
	function callPosts(){
	$bdd = $this->databaseConnect();
	$req = $bdd->query('SELECT billets.id,billets.title,billets.content,DATE_FORMAT(billets.entry_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation, COUNT(commentaires.id_billet) nombreComm 
		FROM commentaires 
		RIGHT JOIN billets on commentaires.id_billet=billets.id
		GROUP BY billets.id
		ORDER BY billets.id DESC');
	return $req;
	}

	function callPost($postId){
	$bdd = $this->databaseConnect();
	$req = $bdd->prepare('SELECT id,title,content,DATE_FORMAT(entry_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM billets WHERE id = :id');
	$req->execute(array('id' =>$postId));
	$singlePost = $req->fetch();
	return $singlePost;
	}

	function postEntry(){
	$bdd = $this->databaseConnect();
	$req = $bdd->prepare('INSERT INTO billets(title,content,entry_date) VALUES (:title,:content,NOW())');
	$req->execute(array(
		'title'=>$_POST['entryTitle'],
		'content'=>$_POST['entryContent']));
	}

	function editedEntry($postId){
	$bdd = $this->databaseConnect();
	$req = $bdd->prepare('UPDATE billets SET title = :title, content = :content WHERE id = :id');
	$req->execute(array(
		'title'=>$_POST['entryTitle'],
		'content'=>$_POST['entryContent'],
		'id'=>$postId));
	}

	function deleteEntry($postId){
	$bdd = $this->databaseConnect();
	$req = $bdd->prepare('DELETE FROM billets WHERE id = :id');
	$req->execute(array('id'=>$postId));
	}	

}