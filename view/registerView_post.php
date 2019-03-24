<?php 
if (!$registerPost){
	header('Location:index.php');
}
else{
	header('Location:index.php?action=register&existing_user=true');
}