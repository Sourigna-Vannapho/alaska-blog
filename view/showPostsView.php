<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>

<?php 

while ($data = $posts->fetch())
{
?>
	<div>
		<h2>
			<?= htmlspecialchars($data['title']) ?>
		</h2>
		<p><?= 'Posté le ' . $data['date_creation']?> </p>
		<p>
			<?= nl2br(htmlspecialchars($data['content'])) ?>
		</p>
			<a href='index.php?action=post&amp;id=<?= $data['id']?>'><?= $data['nombreComm'] . ' Commentaire(s)' ?></a>
	</div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>