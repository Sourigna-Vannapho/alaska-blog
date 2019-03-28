<?php $title = 'Modération des commentaires'; ?>

<?php ob_start(); ?>
<h1>Signalement des commentaires</h1>
<?php 
while ($data = $req->fetch()){
	if ($data['report_status']>0){
?>
		<p class=reportedComment><?= htmlspecialchars($data['content'])?>
		</p>
		<div class='infoReportedComment'>
			<div class='reportLeft'>
				<p class='info'>Nombre de signalement(s) : <?= $data['report_status'] ?> <i class="fas fa-flag"></i></p>
				<p class='info'>Posté par <?= $data['pseudo'] ?> dans l'entrée <?= htmlspecialchars($data['title']) ?></p>	
			</div>
			<div class='reportRight'>
				<a class='info' href='index.php?action=post&amp;id=<?= $data['billet_id'].'#'. $data['comment_id']?>'><i class="far fa-eye"></i>Voir le commentaire</a>
				<a href='index.php?action=cancel_report&amp;id=<?= $data['comment_id']?>'><i class="fas fa-times"></i>Annuler signalement
				</a>
				<a id='<?= $data['comment_id']?>' href='#' onclick='deleteCommentConfirm(<?= $data['comment_id']?>)'><i class="fas fa-trash-alt"></i>Supprimer le commentaire</a>
			</div>
		</div>
	<?php
	}
}
	?>
<?php $req->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>
<script src="public/script/script_admin.js"></script>
<?php require('template.php'); ?>