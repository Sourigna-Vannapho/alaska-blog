<?php $title = 'Edition billet'; ?>
<?php ob_start(); ?>
<h1>Edition de billet</h1>
<form method="post" action="index.php?action=add_entry_confirm<?php if (isset($_GET['id'])){ echo '&amp;id='. $_GET['id']; } ?>">
	<label>Titre : </label>
	<input id="entryTitle" type="text" name="entryTitle" value="<?php if (isset($_GET['id'])){ echo $post['title'];}?>"/><br/><br/>
    <label>Contenu</label><br/><br/>
    <textarea id="mytextarea" type="text" name="entryContent">
    	<?php if (isset($_GET['id'])){ echo $post['content'];}?>
    </textarea>
    <br/>
    <input type="submit" value="Envoyer" />
</form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>