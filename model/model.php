<?php 
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
?>