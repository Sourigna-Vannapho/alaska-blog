<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
	<div>
		<h2>
			<?= htmlspecialchars($post['title'])?> 
		</h2>
		<div class='blogEntry'><?= $post['content'] ?> </div>
	</div>

<p><?= 'Posté le ' . $post['date_creation']?> </p>
<a href='index.php?action=showPosts'>Retour à l'accueil</a>

<?php 
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){ ?>
<p>Connecté en tant que <?= $_SESSION['pseudo'] ?> </p>
<form method="POST" action="index.php?action=comment_confirm&amp;id=<?=$_GET['id'] ?>">
	<label>Commentaire : </label><br/>
	<textarea id="comment" type="text" name="comment" required></textarea><br/><br/>
	<input type="submit" value="Envoyer" />
</form> <?php } ?>
<div>
	<h3 id="comments">Commentaires</h3>
	<?php
	while ($data = $comments->fetch()){ 
	?>
		<p>Posté par <?= htmlspecialchars($data['pseudo']) . ' à ' . $data['date_creation'];
		if (isset($_SESSION['id'])){?>
			<a id='<?= $data['id_comment']?>' href="#" onclick='reportCommentConfirm(<?=$data['id_comment']?>,<?=$_GET['id']?>)'> <i class="fas fa-flag"></i>Signaler </a><?php } ?>
		</p> 
		<p><?php echo nl2br(htmlspecialchars($data['comment'])); ?> </p>
	<?php 
	} 
	$comments->closeCursor(); ?>

</div>

<?php $content = ob_get_clean(); ?>
<script src="public/script/script_user.js"></script>
<?php require('template.php'); ?>