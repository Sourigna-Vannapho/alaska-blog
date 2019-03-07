<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
	<div>
		<h2>
			<?= htmlspecialchars($post['title'])?> 
		</h2>
		<p><?= 'Posté le ' . $post['date_creation']?> </p>
		<p><?= nl2br(htmlspecialchars($post['content'])) ?> </p>
	</div>


<a href='index.php?action=showPosts'>Retour à l'accueil</a>
<p>Connecté en tant que <?= $_SESSION['pseudo'] ?> </p>
<?php if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){ ?>
<form method="POST" action="index.php?action=comment_confirm&amp;id=<?=$_GET['id'] ?>">
	<label>Commentaire</label><input type="text" name="comment" />
	<input type="submit" value="Envoyer" />
</form> <?php } ?>
<div>
	<h3>Commentaires</h3>
	<?php
	while ($test = $comments->fetch())
		{ ?>
		<p>Posté par <?= $test['pseudo'] . ' à ' . $test['date_creation'] ?></p>
		<p><?php echo $test['comment']; 
	} 
	$comments->closeCursor(); ?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>