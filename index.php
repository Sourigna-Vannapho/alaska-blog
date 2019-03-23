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
		else if ($_SESSION){
			if ($_SESSION['authority'] >= 1){
				if ($_GET['action'] == 'report_comment'){
				commentReportConfirm();
				}
			
				else if ($_GET['action'] == 'comment_confirm' && $_GET['id'] > 0){
				commentConfirm();
				}
					if ($_SESSION['authority'] == 2){
						if ($_GET['action'] == 'admin_panel'){
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
								addEntryConfirm();
							}
						}
						else if ($_GET['action'] == 'delete_entry'){
							deleteEntryConfirm();
						}
						else if ($_GET['action'] == 'admin_comment'){
							adminComment();
						}
						else if ($_GET['action'] == 'delete_comment'){
							deleteCommentConfirm();
						}
						else if ($GET['action'] == 'cancel_report'){
							cancelReportConfirm();
						}
						else{
							showPosts();
						}
					}
			else{
				showPosts();
				}
			}
		}
	}	
	else{
		showPosts();
	}
}
catch(Exception $e){
	$errorMsg = $e->getMessage();
	require('view/errorView.php');
}
?>