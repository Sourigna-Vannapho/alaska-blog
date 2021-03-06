<?php 

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/LoginManager.php');

function showPosts(){
	$postManager = new PostManager();
	$posts = $postManager->callPosts();
	require('view/showPostsView.php');
}
function singlePost(){
	$postManager = new PostManager();
	$commentManager = new CommentManager();
	$post = $postManager->callPost($_GET['id']);
	$comments = $commentManager->callComments($_GET['id']);
	require('view/showPostView.php');
}
function commentConfirm(){
	$commentManager = new CommentManager();
	$commentManager->commentRegister($_GET['id']);
	require('view/comment_post.php');
}
function register(){
	require('view/registerView.php');
}
function registerConfirm(){
	$loginManager = new LoginManager();
	$registerPost = $loginManager->callRegister();
	require('view/registerView_post.php');
}
function loginConfirm(){
	$loginManager = new LoginManager();
	$loginCheck = $loginManager->callLogin();
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
	$entry = $postManager->editedEntry($_GET['id']);
	require('view/add_entry_post.php');
}
function deleteEntryConfirm(){
	$postManager = new PostManager();
	$commentManager = new CommentManager();
	$postManager->deleteEntry($_GET['id']);
	$commentManager->deleteComments($_GET['id']);
	require('view/delete_entry_post.php');
}
function commentReportConfirm(){
	$commentManager = new CommentManager();
	$commentManager->commentReport($_GET['comment_id']);
	require('view/comment_report_post.php');
}
function adminComment(){
	$commentManager = new CommentManager();
	$req = $commentManager->reportedComments();
	require('view/admin_comment_report.php');
}
function deleteCommentConfirm(){
	$commentManager = new CommentManager();
	$commentManager->deleteReportedComment($_GET['id']);
	require('view/admin_comment_delete_post.php');
}
function cancelReportConfirm(){
	$commentManager = new CommentManager();
	$commentManager->cancelReportedComment($_GET['id']);
	require('view/admin_cancel_report_post.php');
}