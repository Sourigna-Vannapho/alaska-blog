<?php 
if (!$registerPost){
	header('Location:index.php?register_success');
}
else{
	header('Location:index.php?action=register&existing_user=true');
}