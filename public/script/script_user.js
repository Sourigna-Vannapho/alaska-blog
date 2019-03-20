function reportCommentConfirm(commentId,postId){
	if(confirm("Désirez vous vraiment signaler ce commentaire ?"))
		{document.getElementById("commentReportBtn").href="index.php?action=report_comment&comment_id=" + commentId + "&id=" + postId;
	}
	else{
	}
};