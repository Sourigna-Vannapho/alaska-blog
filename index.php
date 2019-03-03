<?php 

require('controller/controller.php');

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'showPosts'){
		showPosts();
	}
	else if ($_GET['action'] == 'post'){
		singlePost();
	}
	else if ($_GET['action'] == 'register'){
		register();
	}
	else if ($_GET['action'] == 'register_confirm'){
		registerConfirm();
	}
	else {
		echo 'Erreur';
	}
}
else{
	showPosts();
}
?>