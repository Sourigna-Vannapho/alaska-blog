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
	else if ($_GET['action'] == 'admin_panel'){
		adminPanel();
	}
	else if ($_GET['action'] == 'add_entry'){
		addEntry();
	}
	else if ($_GET['action'] == 'add_entry_confirm'){
		if (isset($_GET['id'])){
			updateEntryConfirm();
		}
		else{
			addEntryConfirm();}
	}
	else if ($_GET['delete_entry']){
		deleteEntryConfirm();

	}
	else {
		echo 'Lien invalide';
	}
}
else{
	showPosts();
}
?>