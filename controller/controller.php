<?php 

require('model/model.php');

function showPosts(){
	$posts = callPosts();
	require('view/showPostsView.php');
}
function singlePost(){
	$post = callPost();
	$comments = callComments();
	require('view/showPostView.php');
}
function commentConfirm(){
	commentRegister();
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

?>