<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<?php 

while ($data = $posts->fetch())
{
?>
	<div id='bloctxt'>
	<h2>
		<?= htmlspecialchars($data['title']) ?>
	</h2>
	<p id='blogEntry'>
		<?= ($data['content']) ?>
	</p>
	</div>
	<span id='datePost'><?= 'Posté le ' . $data['date_creation']?> </span>
	<a href='index.php?action=post&amp;id=<?= $data['id']?>'><i class="far fa-comments"></i><?= $data['nombreComm'] . ' Commentaire(s)' ?></a>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>