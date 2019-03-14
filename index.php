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
	else if ($_GET['action'] == 'admin_panel' && $_SESSION['authority'] == 2){
		adminPanel();
	}
	else if ($_GET['action'] == 'add_entry' && $_SESSION['authority'] == 2){
		addEntry();
	}
	else if ($_GET['action'] == 'add_entry_confirm' && $_SESSION['authority'] == 2){
		if (isset($_GET['id'])){
			updateEntryConfirm();
		}
		else{
			addEntryConfirm();}
	}
	else if ($_GET['action'] == 'delete_entry' && $_SESSION['authority'] == 2){
		deleteEntryConfirm();

	}
	else if ($_GET['action'] == 'report_comment'){
		commentReportConfirm();
	}
	else {
		echo 'Lien invalide';
	}
}
else{
	showPosts();
}
?>