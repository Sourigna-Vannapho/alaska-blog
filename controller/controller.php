<?php 

require('model/model.php');

function showPosts()
{
	$posts = callPosts();

	require('view/showPostsView.php');
}
?>