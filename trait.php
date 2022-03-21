<?php 
$host = "http://localhost/election/"; 
if (isset($_POST['code']) AND isset($_POST['CP'])  AND isset($_POST['CPA']) )
{
	try{
			// On se connecte à MySQL
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=localhost;dbname=election', 'root', '',$pdo_options);
			$code = $_POST['code'];
			$query =  $bdd ->query ("SELECT COUNT(*) AS nbr FROM electeurs WHERE 
			code = '$code'"); 
			$donnees = $query->fetch();
			if ($donnees ['nbr'] == 1)
			{	
				$query =  $bdd ->query ("SELECT VOTE  FROM electeurs WHERE code = '$code'");  
				$vote = $query->fetch();
				if ($vote['VOTE'] == "NON") 
				{
					session_start();
					$_SESSION['code'] = $_POST['code'];
					$_SESSION['CP'] = $_POST['CP'];
					$_SESSION['CPA'] = $_POST['CPA'];
					header('Location:' .$host. 'configcp.php');
					exit();
				}
				else 
				{
					session_start();
					$_SESSION['code'] = $_POST['code'];
					$msg = "Vous avez deja voter";
					header('Location:' .$host. 'election.php?err=' .$msg);
					exit();	
				}
			}
			else
			{
				session_start();
				$_SESSION['code'] = $_POST['code'];
				$msg = "Le code  que vous avez saisie est incorrect vérifier puis réessayer";
				header('Location:' .$host. 'election.php?err=' .$msg);
				exit();
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