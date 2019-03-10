<?php $title = 'Panneau administrateur'; ?>
<?php ob_start(); ?>
<h1>Panneau administrateur</h1>
<?php 
while ($data = $posts->fetch())
{
?>
	<div id='bloctxt'>
	<h2>
		<?= htmlspecialchars($data['title']) ?>
	</h2>
	<p>
		<?php $entrySummary = str_split($data['content'],100);
		echo nl2br(htmlspecialchars($entrySummary[0])) . '[...]';
		  ?>
	</p>
	</div>
	<span id='datePost'><?= 'Posté le ' . $data['date_creation'] . ' - '?> </span>
	<a href='index.php?action=post&amp;id=<?= $data['id']?>'><i class="far fa-comments"></i><?= $data['nombreComm'] . ' Commentaire(s)' ?></a>
	<br/>
	<a href=''><i class="fas fa-edit"></i>Modifier</a>
	<a href=''><i class="fas fa-trash-alt"></i>Supprimer</a>
<?php
}
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>