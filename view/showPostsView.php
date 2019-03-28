<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<?php 
while ($data = $posts->fetch()){
?>
	<div class='bloctxt'>
		<h2>
			<?= htmlspecialchars($data['title']) ?>
		</h2>
		<div class='blogEntry'>
			<?= ($data['content']) ?>
		</div>
	</div>
	<br/>
	<div class='entryDate'>
		<span class='datePost'><?= 'Posté le ' . $data['date_creation']?> </span>
		<a href='index.php?action=post&amp;id=<?= $data['id']?>'><i class="far fa-comments"></i><?= $data['nombreComm'] . ' Commentaire(s)' ?></a>
	</div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>