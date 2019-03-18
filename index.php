<?php 
if(!isset($_SESSION)) 
	{ 
        session_start(); 
    }

require('controller/controller.php');
try{
if (isset($_GET['action'])) {
	if ($_GET['action'] == 'showPosts'){
		showPosts();
	}
	else if ($_GET['action'] == 'post' && $_GET['id'] > 0){
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
	else if ($_GET['action'] == 'comment_confirm' && $_GET['id'] > 0){
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
	else if ($_GET['action'] == 'admin_comment'){
		adminComment();
	}
	else if ($_GET['action'] == 'delete_comment'){
		deleteCommentConfirm();
	}
	else {
		showPosts();
	}
}
else{
	showPosts();
}}
catch(Exception $e){
	$errorMsg = $e->getMessage();
	require('view/errorView.php');
}
?>