<?php $title = 'Modération des commentaires'; ?>

<?php ob_start(); ?>
<h1>Signalement des commentaires</h1>
<?php 
while ($data = $req->fetch())
	{ 
	if ($data['report_status']>0){?>
		<p><?= $data['content']?>
		</p>
		<p>Nom de signalement(s) : <?= $data['report_status'] ?></p>
		<p>Posté par <?= $data['pseudo'] ?> dans l'entrée <?= htmlspecialchars($data['title']) ?></p>	

	<?php
	}}
	 ?>
<?php $req->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>