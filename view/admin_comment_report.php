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
				<p class='info'>Nombre de signalement(s) : <?= $data['report_status'] ?></p>
				<p class='info'>Posté par <?= $data['pseudo'] ?> dans l'entrée <?= htmlspecialchars($data['title']) ?></p>	
			</div>
			<a class='info' href='index.php?action=post&amp;id=<?= $data['billet_id'].'#'. $data['comment_id']?>'>Voir le commentaire</a>
		</div>

	<?php
	}}
	 ?>
<?php $req->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>