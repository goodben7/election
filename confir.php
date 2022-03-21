<?php 
session_start(); 
$host = "http://localhost/election/";
if (isset($_SESSION['code']))
{
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>CONFIRMATION</title>
	</head>
	<body>
	<fieldset>
		<legend><b>CONFIRMATION</b></legend>
		<?php
		echo $_SESSION['NOM']. "&nbsp" .$_SESSION['POSTNOM']. "&nbsp" .$_SESSION['PRENOM']. "&nbsp" . "Veillez 
		Confirmer Votre Choix" ;
			if (isset($_SESSION['choixcp']))
			{	
				echo "<p> CANDIDAT CP </P>";
				echo "<h1>" .$_SESSION['choixcp']. "</h1>";
			}
			else
			{	
				echo "<p> CANDIDAT CP N°". $_SESSION['idcp'] . "</p> <br>";
				?> <img style="height: 10%; width: 20%; display: block;" 
				src= <?php echo $_SESSION['IMAGEcp'] ?> > <br>
				<?php
				echo "<p>" .$_SESSION['NOMcp']. "&nbsp" .$_SESSION['POSTNOMcp']. "&nbsp". 
				$_SESSION['PRENOMcp'].  "</p>"; 
			}	

			if (isset($_SESSION['choixcpa']))
			{
				echo "<p> CANDIDAT CPA </P>";
				echo "<h1>" .$_SESSION['choixcpa']. "</h1>";	
			}
			else
			{
				echo "<p> CANDIDAT CPA N°". $_SESSION['idcpa'] . "</p> <br>";
				?> <img style="height: 10%; width: 20%; display: block;" 
				src= <?php echo $_SESSION['IMAGEcpa'] ?> > <br>
				<?php
				echo "<p>" .$_SESSION['NOMcpa']. "&nbsp" .$_SESSION['POSTNOMcpa']. "&nbsp". 
				$_SESSION['PRENOMcpa'].  "</p>";
			}
		?>
		<a href="annuler.php">ANNULER</a> <a href="envoyer.php">CONFIRMER</a>
	</fieldset> 
	</body>
<?php 
}
else
{
	$msg="le formulaire n'a pas ete envoyer"; 
	header('Location: '.$host.'election.php?err='.$msg);
}
?>


