<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>

<?php 
while ($data = $posts->fetch())
{
?>
	<div>
		<h2>
			<?= htmlspecialchars($data['title']) . $data['date_creation'] ?> 
		</h2>
		<p>
			<?= nl2br(htmlspecialchars($data['content'])) ?>
		</p>
	</div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>