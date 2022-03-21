<?php
session_start(); 
$host = "http://localhost/election/"; 
if (isset($_SESSION['code']))
{
	session_destroy();
	header('Location: '.$host.'election.php');
} 	
else  
{ 
	$msg="le formulaire n'a pas ete envoyer"; 
	header('Location: '.$host.'election.php?err='.$msg);
}
?> 