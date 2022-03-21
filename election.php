<?php 
session_start();
if (isset($_SESSION['code'])) 
{
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>ELECTION</title>
	</head>
	<body>
		<?php
		try{
				// On se connecte à MySQL
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bdd = new PDO('mysql:host=localhost;dbname=election', 'root', '',$pdo_options);
				$query =  $bdd ->query ("SELECT id, NOM, POSTNOM, PRENOM FROM cp  "); 
				$trait =  $bdd ->query ("SELECT id, NOM, POSTNOM, PRENOM FROM cpa  "); 
			if (isset($_GET['conf'])){
			?>
			<p class="conf" ><?php echo $_GET['conf']; ?></p>
			<?php 	
			} 
			if (isset($_GET['err'])){
			?>	
			<p class="err"><?php echo $_GET['err']; ?></p>
			<?php 
			}	
			?>
		<fieldset>
			<legend><b>ELECTION DE CP ET CPA G1 INFORMATIQUE</b></legend>
			<form action="trait.php" method="post">
				<br>
				CODE <input type="text" maxlength="4" name="code" 
				value="<?php echo $_SESSION['code'] ?>" pattern="^[0-9]{4}$" required="required"> <br> <br>
				<p> CANDIDAT CP </p>
				<?php 
				while ($cp = $query->fetch()) 
				{
				?> 
				<input type="radio" name="CP" value=<?php echo $cp['id'] ;?> > 
				<?php echo "N°"  .$cp['id'] . "&nbsp" .$cp['NOM']. "&nbsp" .$cp['POSTNOM'] ."&nbsp"
					.$cp['PRENOM']; echo "<br>"; 
				}
				$query->closeCursor(); ?> 
				<input type="radio" name="CP" value="0" required="required"> AUCUN CHOIX 
				<P> CANDIDAT CPA </P>
				<?php 
				while ($cpa = $trait->fetch()) 
				{
				?> 
				<input type="radio" name="CPA" value=<?php echo $cpa['id'] ;?> > 
				<?php echo "N°"  .$cpa['id'] . "&nbsp" .$cpa['NOM']. "&nbsp" .$cpa['POSTNOM']. 
				"&nbsp" .$cpa['PRENOM']; echo "<br>"; 
				}
				$trait->closeCursor(); ?> 
				<input type="radio" name="CPA" value="0" required="required"> AUCUN CHOIX <br> 
				<input type="submit" value="VALIDER">
			</form>
		</fieldset>

		<?php

			}
		catch(Exception $e) 
			{
				die('Erreur : '.$e->getMessage());
			}	
		?>
	</body>
	</html>
<?php	
}
else
{
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>ELECTION</title>
	</head>
	<body>
		<?php
		try{
				// On se connecte à MySQL
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bdd = new PDO('mysql:host=localhost;dbname=election', 'root', '',$pdo_options);
				$query =  $bdd ->query ("SELECT id, NOM, POSTNOM, PRENOM FROM cp  "); 
				$trait =  $bdd ->query ("SELECT id, NOM, POSTNOM, PRENOM FROM cpa  "); 
			if (isset($_GET['conf'])){
			?>
			<p class="conf" ><?php echo $_GET['conf']; ?></p>
			<?php 	
			} 
			if (isset($_GET['err'])){
			?>	
			<p class="err"><?php echo $_GET['err']; ?></p>
			<?php 
			}	
			?>
		<fieldset>
			<legend><b>ELECTION DE CP ET CPA G1 INFORMATIQUE</b></legend>
			<form action="trait.php" method="post">
				<br> 
				CODE <input type="text" maxlength="4" name="code" pattern="^[0-9]{4}$" required="required"> <br> <br>
				<p> CANDIDAT CP </p>
				<?php 
				while ($cp = $query->fetch()) 
				{
				?> 
				<input type="radio" name="CP" value=<?php echo $cp['id'] ;?> > 
				<?php echo "N°"  .$cp['id'] . "&nbsp" .$cp['NOM']. "&nbsp" .$cp['POSTNOM'] ."&nbsp"
					.$cp['PRENOM']; echo "<br>"; 
				}
				$query->closeCursor(); ?> 
				<input type="radio" name="CP" value="0" required="required"> AUCUN CHOIX 
				<P> CANDIDAT CPA </P>
				<?php 
				while ($cpa = $trait->fetch()) 
				{
				?> 
				<input type="radio" name="CPA" value=<?php echo $cpa['id'] ;?> > 
				<?php echo "N°"  .$cpa['id'] . "&nbsp" .$cpa['NOM']. "&nbsp" .$cpa['POSTNOM']. 
				"&nbsp" .$cpa['PRENOM']; echo "<br>"; 
				}
				$trait->closeCursor(); ?> 
				<input type="radio" name="CPA" value="0" required="required"> AUCUN CHOIX <br> 
				<input type="submit" value="VALIDER">
			</form>
		</fieldset>

		<?php

			}
		catch(Exception $e) 
			{
				die('Erreur : '.$e->getMessage());
			}	
		?>
	</body>
	</html>
<?php 
}
?>