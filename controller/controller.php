<?php 

require_once('model/model.php');
require_once('model/PostManager.php');

function showPosts(){
	$postManager = new PostManager();
	$posts = $postManager->callPosts();
	require('view/showPostsView.php');
}
function singlePost(){
	$postManager = new PostManager();
	$post = $postManager->callPost($_GET['id']);
	$comments = callComments($_GET['id']);
	require('view/showPostView.php');
}
function commentConfirm(){
	commentRegister($_GET['id']);
	require('view/comment_post.php');
}
function register(){
	require('view/registerView.php');
}
function registerConfirm(){
	$registerPost = callRegister();
	require('view/registerView_post.php');
}
function loginConfirm(){
	$loginCheck = callLogin();
	require('view/login_post.php');
}
function logoutConfirm(){
	require('view/logout.php');
}
function adminPanel(){
	$postManager = new PostManager();
	$posts = $postManager->callPosts();
	require('view/admin_panel.php');
}
function addEntry(){
	$postManager = new PostManager();
	if (isset($_GET['id']))
		{$post = $postManager->callPost($_GET['id']);};
	require('view/add_entry.php');
}
function addEntryConfirm(){
	$postManager = new PostManager();
	$entry = $postManager->postEntry();
	require('view/add_entry_post.php');
}
function updateEntryConfirm(){
	$postManager = new PostManager();
	$entry=editedEntry($_GET['id']);
	require('view/add_entry_post.php');
}
function deleteEntryConfirm(){
	$postManager = new PostManager();
	$postmanager->deleteEntry($_GET['id']);
	deleteComments($_GET['id']);
	require('view/delete_entry_post.php');
}
function commentReportConfirm(){
	commentReport($_GET['comment_id']);
	require('view/comment_report_post.php');
}
function adminComment(){
	$req = reportedComments();
	require('view/admin_comment_report.php');
}
function deleteCommentConfirm(){
	deleteReportedComment($_GET['id']);
	require('view/admin_comment_delete_post.php');
}
?>