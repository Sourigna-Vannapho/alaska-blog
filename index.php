<?php 

require('controller/controller.php');

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'showPosts'){
		showPosts();
	}
	else {
		echo 'Erreur';
	}
}
else{
	showPosts();
}
?>