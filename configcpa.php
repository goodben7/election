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
		$cpa = $_SESSION['CPA'] ; 
		$code = $_SESSION['code'] ; 
		switch ($cpa) 
		{
			case 0 :
			$trait =  $bdd ->query ("SELECT  NOM, POSTNOM, PRENOM FROM electeurs   WHERE CODE = '$code' "); 
			$electeur = $trait->fetch();
			$_SESSION['NOM'] = $electeur['NOM'];
			$_SESSION['POSTNOM'] = $electeur['POSTNOM'];
			$_SESSION['PRENOM'] = $electeur['PRENOM'];
			$trait->closeCursor();
			$_SESSION['choixcpa'] = "AUCUN CHOIX";
			header('Location:' .$host. 'confir.php');
			exit();
				break;
			case 1 : 
			$trait =  $bdd ->query ("SELECT  NOM, POSTNOM, PRENOM FROM electeurs   WHERE CODE = '$code' "); 
			$electeur = $trait->fetch();
			$_SESSION['NOM'] = $electeur['NOM'];
			$_SESSION['POSTNOM'] = $electeur['POSTNOM'];
			$_SESSION['PRENOM'] = $electeur['PRENOM'];
			$trait->closeCursor();
			$query =  $bdd ->query ("SELECT id, NOM, POSTNOM, PRENOM, IMAGE FROM cpa  WHERE id = 1 "); 
			$cpa = $query->fetch();
			$_SESSION['idcpa']  = $cpa['id'];
			$_SESSION['NOMcpa'] = $cpa['NOM'];
			$_SESSION['POSTNOMcpa'] = $cpa['POSTNOM'];
			$_SESSION['PRENOMcpa'] = $cpa['PRENOM'];
			$_SESSION['IMAGEcpa'] = $cpa['IMAGE'];
			$query->closeCursor();
			header('Location:' .$host. 'confir.php');
			exit();
				break;
			case 2 :
			$trait =  $bdd ->query ("SELECT  NOM, POSTNOM, PRENOM FROM electeurs    WHERE CODE = '$code' "); 
			$electeur = $trait->fetch();
			$_SESSION['NOM'] = $electeur['NOM'];
			$_SESSION['POSTNOM'] = $electeur['POSTNOM'];
			$_SESSION['PRENOM'] = $electeur['PRENOM'];
			$trait->closeCursor();
			$query =  $bdd ->query ("SELECT id, NOM, POSTNOM, PRENOM, IMAGE FROM cpa  WHERE id = 2 "); 
			$cpa = $query->fetch();
			$_SESSION['idcpa']  = $cpa['id'];
			$_SESSION['NOMcpa'] = $cpa['NOM'];
			$_SESSION['POSTNOMcpa'] = $cpa['POSTNOM'];
			$_SESSION['PRENOMcpa'] = $cpa['PRENOM'];
			$_SESSION['IMAGEcpa'] = $cpa['IMAGE'];
			$query->closeCursor();
			header('Location:' .$host. 'confir.php');
			exit();
				break;
			case 3 :
			$trait =  $bdd ->query ("SELECT  NOM, POSTNOM, PRENOM FROM electeurs    WHERE CODE = '$code' "); 
			$electeur = $trait->fetch();
			$_SESSION['NOM'] = $electeur['NOM'];
			$_SESSION['POSTNOM'] = $electeur['POSTNOM'];
			$_SESSION['PRENOM'] = $electeur['PRENOM'];
			$trait->closeCursor();
			$query =  $bdd ->query ("SELECT id, NOM, POSTNOM, PRENOM, IMAGE FROM cpa  WHERE id = 3 "); 
			$cpa = $query->fetch();
			$_SESSION['idcpa']  = $cpa['id'];
			$_SESSION['NOMcpa'] = $cpa['NOM'];
			$_SESSION['POSTNOMcpa'] = $cpa['POSTNOM'];
			$_SESSION['PRENOMcpa'] = $cpa['PRENOM'];
			$_SESSION['IMAGEcpa'] = $cpa['IMAGE'];
			$query->closeCursor();
			header('Location:' .$host. 'confir.php');
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