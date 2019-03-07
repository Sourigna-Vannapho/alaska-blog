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
	else if ($_GET['action'] == 'login_confirm'){
		loginConfirm();
	}
	else if ($_GET['action'] == 'logout'){
		logoutConfirm();
	}
	else if ($_GET['action'] == 'comment_confirm'){
		commentConfirm();
	}
	else {
		echo 'Lien invalide';
	}
}
else{
	showPosts();
}
?>