<?php 
if ($loginCheck){
	header('Location:index.php?login_fail=true');
}
else{
	header('Location:index.php');
}