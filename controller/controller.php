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
	// $register = callRegister();
	require('view/registerView.php');
}
?>