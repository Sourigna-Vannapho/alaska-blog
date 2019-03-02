<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>

	<div>
		<h2>
			<?= htmlspecialchars($post['title']) . $post['date_creation'] ?> 
		</h2>
		<p>
			<?= nl2br(htmlspecialchars($post['content'])) ?>
		</p>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>