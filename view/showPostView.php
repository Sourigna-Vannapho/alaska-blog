<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>

	<div>
		<h2>
			<?= htmlspecialchars($post['title'])?> 
		</h2>
		<p><?= 'Posté le ' . $post['date_creation']?> </p>
		<p>
			<?= nl2br(htmlspecialchars($post['content'])) ?>
		</p>
	</div>
<a href='index.php?action=showPosts'>Retour à l'accueil</a>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>