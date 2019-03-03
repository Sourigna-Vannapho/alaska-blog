<?php 

require('model/model.php');

function showPosts(){
	$posts = callPosts();
	require('view/showPostsView.php');
}

function singlePost(){
	$post = callPost();
	require('view/showPostView.php');

}
function register(){
	require('view/registerView.php');
}
function registerConfirm(){
	callRegister();
	require('view/registerView_post.php');
}
?>