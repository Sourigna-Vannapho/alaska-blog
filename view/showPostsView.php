<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<?php 

while ($data = $posts->fetch())
{
?>
	<div id='bloctxt'>
	<h2>
		<?= htmlspecialchars($data['title']) ?>
	</h2>
	<p>
		<?= nl2br(htmlspecialchars($data['content'])) ?>
	</p>
	</div>
	<span id='datePost'><?= 'Posté le ' . $data['date_creation']?> </span>
	<a href='index.php?action=post&amp;id=<?= $data['id']?>'><?= $data['nombreComm'] . ' Commentaire(s)' ?></a>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>