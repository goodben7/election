<?php 
session_start(); 
$host = "http://localhost/election/";
if (isset($_SESSION['code']))
{ 
	try
	{
		// On se connecte à MySQL
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=localhost;dbname=election', 'root', '',$pdo_options);
		$code = $_SESSION['code'];
		$idcp = $_SESSION['idcp'];
		$idcpa = $_SESSION['idcpa'];
		if (isset($_SESSION['choixcp']))
		{	
			$bdd ->exec ("UPDATE electeurs SET VOTE = 'OUI'   WHERE CODE = '$code'");
			$query = $bdd ->prepare ('INSERT INTO resultat_cp (CODE, ID_CP)  VALUES(?, 0)');
			$query ->execute(array($code));	
			$msg="Vous avez vote"; 
			session_destroy();
			header('Location: '.$host.'election.php?conf='.$msg);
		}
		else
		{
			$bdd ->exec ("UPDATE cp SET VOIX = VOIX  + 1  WHERE id = '$idcp'");
			$bdd ->exec ("UPDATE electeurs SET VOTE = 'OUI'   WHERE CODE = '$code'");
			$query = $bdd ->prepare ('INSERT INTO resultat_cp (CODE, ID_CP)  VALUES(?, ?)');
			$query ->execute(array($code, $idcp));
			$msg="Vous avez vote"; 
			session_destroy();
			header('Location: '.$host.'election.php?conf='.$msg);
		}
		if (isset($_SESSION['choixcpa']))
		{	
			$bdd ->exec ("UPDATE electeurs SET VOTE = 'OUI'   WHERE CODE = '$code'");
			$query = $bdd ->prepare ('INSERT INTO resultat_cpa (CODE, ID_CPA)  VALUES(?, 0)');
			$query ->execute(array($code));		
			$msg="Vous avez vote"; 
			session_destroy();
			header('Location: '.$host.'election.php?conf='.$msg);
		}
		else
		{
			$bdd ->exec ("UPDATE cpa SET VOIX = VOIX  + 1  WHERE id = '$idcpa'");
			$bdd ->exec ("UPDATE electeurs SET VOTE = 'OUI'   WHERE CODE = '$code'");
			$query = $bdd ->prepare ('INSERT INTO resultat_cpa (CODE, ID_CPA)  VALUES(?, ?)');
			$query ->execute(array($code, $idcpa));
			$msg="Vous avez vote"; 
			session_destroy();
			header('Location: '.$host.'election.php?conf='.$msg);
		}	
	}
	catch(Exception $e) 
	{
		die('Erreur : '.$e->getMessage()); 
	}
}
else
{
	$msg="le formulaire n'a pas ete envoyer"; 
	header('Location: '.$host.'election.php?err='.$msg);
}

?> 