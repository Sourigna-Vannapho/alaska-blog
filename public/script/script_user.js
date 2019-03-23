function reportCommentConfirm(commentId,postId){
	if(confirm("Désirez vous vraiment signaler ce commentaire ?" + "index.php?action=report_comment&comment_id=" + commentId + "&id=" + postId
			))
		{document.getElementById(commentId).href="index.php?action=report_comment&comment_id=" + commentId + "&id=" + postId;
	}
};

