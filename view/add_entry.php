<?php $title = 'Edition billet'; ?>
<?php ob_start(); ?>
<h2>Edition de billet</h2>
<p>Ajout d'un nouveau billet</p>
<form method="post" action="index.php?action=add_entry_confirm">
	<label>Titre</label>
	<input type="text" name="entryTitle"/><br/>
    <label>Contenu</label><br/>
    <textarea id="mytextarea" type="text" name="entryContent"></textarea>
    <br/>
    <input type="submit" value="Envoyer" />
</form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>