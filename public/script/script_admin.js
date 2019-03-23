function deletePostConfirm(postId){
	if(confirm("Désirez vous vraiment supprimer cet article ainsi que les commentaires associés ?"))
		{document.getElementById(postId).href="index.php?action=delete_entry&id=" + postId;
	}
};

function deleteCommentConfirm(commentId){
	if (confirm("Désirez vous vraiment supprimer ce commentaire ?"))
		{document.getElementById("deleteCommentBtn").href="index.php?action=delete_comment&id=" + commentId;
	}
};