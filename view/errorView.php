<?php $title = 'Erreur'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<?php echo 'Une erreur est survenue : ' . $errorMsg;
$content = ob_get_clean(); 
require('view/template.php');

?>