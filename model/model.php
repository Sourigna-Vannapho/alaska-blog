<?php 
function callPosts(){
	$bdd = new PDO('mysql:host=localhost;dbname=blog_alaska;charset=utf8', 'root', ''); //A modifier par la suite (Effacer le commentaire lorsque effectué)
	$req = $bdd->query('SELECT title,content,DATE_FORMAT(entry_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM billets');
	return $req;
}
?>