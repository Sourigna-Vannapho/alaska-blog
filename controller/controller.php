<?php 

require('model/model.php');

function showPosts(){
	$posts = callPosts();
	require('view/showPostsView.php');
}
function singlePost(){
	$post = callPost($_GET['id']);
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
	callRegister();
}
function loginConfirm(){
	callLogin();
	require('view/login_post.php');
}
function logoutConfirm(){
	require('view/logout.php');
}
function adminPanel(){
	$posts=callPosts();
	require('view/admin_panel.php');
}
function addEntry(){
	if (isset($_GET['id']))
		{$post = callPost($_GET['id']);};
	
	require('view/add_entry.php');
}
function addEntryConfirm(){
	$entry=postEntry();
	require('view/add_entry_post.php');
}
function updateEntryConfirm(){
	$entry=editedEntry($_GET['id']);
	require('view/add_entry_post.php');
}
?>