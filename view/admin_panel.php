<?php $title = 'Panneau administrateur'; ?>
<?php ob_start(); ?>
<h1>Panneau administrateur</h1>
<?php 
while ($data = $posts->fetch()){
?>
	<div class='bloctxt'>
		<h2>
			<?= htmlspecialchars($data['title']) ?>
		</h2>
		<div class='blogEntry'>
			<?php $entrySummary = str_split($data['content'],200);
			echo ($entrySummary[0]) . '[...]';
			  ?>
		</div>
	</div>
	<br/>
	<span class='datePost'><?= 'Posté le ' . $data['date_creation'] . ' - '?> </span>
	<a href='index.php?action=post&amp;id=<?= $data['id']?>'><i class="far fa-comments"></i><?= $data['nombreComm'] . ' Commentaire(s)' ?></a>
	<br/>
	<a href='index.php?action=add_entry&amp;id=<?= $data['id']?>'><i class="fas fa-edit"></i>Modifier</a>
	<a id='<?= $data['id']?>' href='#' onclick='deletePostConfirm(<?=$data['id']?>)'><i class="fas fa-trash-alt"></i>Supprimer</a>
<?php
}
?>
<?php $content = ob_get_clean(); ?>
<script src="public/script/script_admin.js"></script>
<?php require('template.php'); ?>