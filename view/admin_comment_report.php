<?php $title = 'Modération des commentaires'; ?>

<?php ob_start(); ?>
<h1>Signalement des commentaires</h1>
<?php 
while ($data = $req->fetch())
	{ 
	if ($data['report_status']>0){?>
		<p class=reportedComment><?= $data['content']?>
		</p>
		<div id='infoReportedComment'>
			<div id='reportLeft'>
				<p class='info'>Nombre de signalement(s) : <?= $data['report_status'] ?> <i class="fas fa-flag"></i></p>
				<p class='info'>Posté par <?= $data['pseudo'] ?> dans l'entrée <?= htmlspecialchars($data['title']) ?></p>	
			</div>
			<div id='reportRight'>
				<a class='info' href='index.php?action=post&amp;id=<?= $data['billet_id'].'#'. $data['comment_id']?>'><i class="far fa-eye"></i>Voir le commentaire</a>
				<a href='index.php?action=delete_comment'><i class="fas fa-trash-alt"></i>Supprimer le commentaire</a>
			</div>
		</div>

	<?php
	}}
	 ?>
<?php $req->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>