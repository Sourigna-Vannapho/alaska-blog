function deleteConfirm(postId){
	if(confirm("Désirez vous vraiment supprimer cet article ainsi que les commentaires associés ?"))
		{var idpage = postId;
			link="index.php?action=delete_entry&id=" + idpage;
	}
	else{
	}
	document.getElementById("deleteEntryBtn").href = link;
	};