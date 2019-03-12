<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
	<div>
		<h2>
			<?= htmlspecialchars($post['title'])?> 
		</h2>
		<div id='blogEntry'><?= $post['content'] ?> </div>
	</div>

<p><?= 'Posté le ' . $post['date_creation']?> </p>
<a href='index.php?action=showPosts'>Retour à l'accueil</a>

<?php 
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){ ?>
<p>Connecté en tant que <?= $_SESSION['pseudo'] ?> </p>
<form method="POST" action="index.php?action=comment_confirm&amp;id=<?=$_GET['id'] ?>">
	<label>Commentaire : </label><br/>
	<textarea type="text" name="comment" ></textarea><br/>
	<input type="submit" value="Envoyer" />
</form> <?php } ?>
<div>
	<h3>Commentaires</h3>
	<?php
	while ($data = $comments->fetch())
		{ ?>
		<p>Posté par <?= htmlspecialchars($data['pseudo']) . ' à ' . $data['date_creation'] ?></p>
		<p><?php echo nl2br(htmlspecialchars($data['comment'])); 
	} 
	$comments->closeCursor(); ?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>