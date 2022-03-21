<?php 
session_start() ;
$host = "http://localhost/election/";
if (isset($_SESSION['code']))
{	
	try
	{
		// On se connecte à MySQL
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=localhost;dbname=election', 'root', '',$pdo_options);
		$cp = $_SESSION['CP'] ; 
		switch ($cp) 
		{
			case 0 :
			$_SESSION['choixcp'] = "AUCUN CHOIX";
			header('Location:' .$host. 'configcpa.php');
			exit();
				break;
			case 1 :
			$query =  $bdd ->query ("SELECT id, NOM, POSTNOM, PRENOM, IMAGE FROM cp  WHERE id = 1 "); 
			$cp = $query->fetch();
			$_SESSION['idcp']  = $cp['id'];
			$_SESSION['NOMcp'] = $cp['NOM'];
			$_SESSION['POSTNOMcp'] = $cp['POSTNOM'];
			$_SESSION['PRENOMcp'] = $cp['PRENOM'];
			$_SESSION['IMAGEcp'] = $cp['IMAGE'];
			header('Location:' .$host. 'configcpa.php');
			exit();
				break;
			case 2 :
			$query =  $bdd ->query ("SELECT id, NOM, POSTNOM, PRENOM, IMAGE FROM cp  WHERE id = 2 "); 
			$cp = $query->fetch();
			$_SESSION['idcp']  = $cp['id'];
			$_SESSION['NOMcp'] = $cp['NOM'];
			$_SESSION['POSTNOMcp'] = $cp['POSTNOM'];
			$_SESSION['PRENOMcp'] = $cp['PRENOM'];
			$_SESSION['IMAGEcp'] = $cp['IMAGE'];
			header('Location:' .$host. 'configcpa.php');
			exit();
				break;
			case 3 :
			$query =  $bdd ->query ("SELECT id, NOM, POSTNOM, PRENOM, IMAGE FROM cp  WHERE id = 3 "); 
			$cp = $query->fetch();
			$_SESSION['idcp']  = $cp['id'];
			$_SESSION['NOMcp'] = $cp['NOM'];
			$_SESSION['POSTNOMcp'] = $cp['POSTNOM'];
			$_SESSION['PRENOMcp'] = $cp['PRENOM'];
			$_SESSION['IMAGEcp'] = $cp['IMAGE'];
			header('Location:' .$host. 'configcpa.php');
			exit();
				break;
						
			default:
			$msg="le formulaire n'a pas ete envoyer correctement"; 
			header('Location: '.$host.'election.php?err='.$msg);
				break;
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