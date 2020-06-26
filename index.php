
<?php
  
  // Starting the session, to use and 
  // store data in session variable 
  session_start(); 
	 
  // If the session variable is empty, this  
  // means the user is yet to login 
  // User will be sent to 'login.php' page 
  // to allow the user to login 
  if (!isset($_SESSION['username'])) { 
	  //$_SESSION['msg'] = "You have to log in first"; 
	  echo "Niste prijavljeni"; 
  } 
  if (isset($_SESSION['username'])) { 	
	echo "Dobrodošli, " . "<b>" . $_SESSION['username'] . "</b>";
	echo "<br>";
	//echo "<a href=" . "index.php?logout='1'>" . "Odjava </a>"; 
	?>

	<p>  
	<a href="index.php?logout='1'" style="color: red;"> 
		Odjava
	</a>
	</p> 
	<?php
} 

  // Logout button will destroy the session, and 
  // will unset the session variables 
  // User will be headed to 'login.php' 
  // after loggin out 
  if (isset($_GET['logout'])) { 
	  session_destroy(); 
	  unset($_SESSION['username']); 
	  header("location: index.php"); 
  } 
  ?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Taksimeter</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" rel="stylesheet">

  <?php
    include_once 'add-stranka.php';
	?>
	
</head>
<body>
  
  <header class="col-12">
    <h1>Taksimeter</h1>
  </header>

  <div id="content0" class="row">
    <nav class="col-3">
      <a href=#ime>Dodaj stranko</a>
      <a href=cenik.html>Cenik</a>
      <a href=# id="povzetekBtn2">Povzetek</a>
	  <a href="info.html">Info</a>
	  <a href="prijava.php">Prijava</a>
	</nav>

	<article class="col-8">
		<h2>O storitvi</h2>	
		<p>Storitev Taksimeter omogoča enostavno vodenje evidence strank in voženj.</p>
		<p> Na preprost način lahko v tabelo vnesete podatke o stranki in vožnji, ostalo pa za vas opravimo mi. Omogoča vam tudi prikaz statistike
			  (skupno število strank, skupno prevoženo razdaljo in zaslužek). </p>

	  </article>
  </div>


  <?php
    //pokaže se samo če je prijavljen
  if (isset($_SESSION['username'])) : 

  	if(isset($_POST['save'])){

        $sql = "INSERT INTO voznje (username, ime, priimek, cakanje, razdalja, cena)
		VALUES (?,?,?,?,?,?)";
		
		$stmt = $mysqli->prepare($sql);

		$stmt->bind_param('sssddd', $username, $ime, $priimek, $cakanje, $razdalja, $cena);

		$username = $_SESSION['username'];
		$ime = $_POST['ime'];
		$priimek = $_POST['priimek'];
		$cakanje = $_POST['cakanje'];
		$razdalja = $_POST['razdalja'];
		$cena = $cakanje * 14.99 + $razdalja * 0.99;

		//$stmt->bind_param($username, $_POST['ime'], $_POST['priimek'], $_POST['cakanje'], $_POST['razdalja'], $_POST['cena']);

		$stmt->execute();
		$stmt->close();
    	}
 
 		?>

	<div id="content1" class="col-12">
		<p>Tarifa: 0,99 €/km</p>
		<p>Čakalna ura: 14,99 €/h</p>
		<table id="stranka-table">
			<caption>Seznam strank</caption>
			<tr>
				<th>id</th>
				<th>Voznik</th>
				<th>Ime</th>
				<th>Priimek</th>
				<th>Čakanje [h]</th>
				<th>Razdalja [km]</th>
				<th>Cena [€]</th>
			</tr>

			<?php
			$username = $_SESSION['username'];

			$sql = "SELECT id, username, ime, priimek, cakanje, razdalja, cena FROM voznje WHERE username='$username'";

			if ($username=="admin") {

				$sql = "SELECT id, username, ime, priimek, cakanje, razdalja, cena FROM voznje";
			};

			$result = $mysqli->query($sql);

			if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><td>" . $row['ime'] . "</td><td>" . $row['priimek'] . "</td><td>" . $row['cakanje'] . "</td><td>" . $row['razdalja'] . "</td><td>" . $row['cena'] . "</td></tr>";
			}
			} else {
			echo "0 results";
			}
			$mysqli->close();
			?>
		</table>
	</div>

	<div id="content2" class="col-12">
		<fieldset>
			<form method="post">

			<label for="ime">Ime: </label>
			<input id="ime" name="ime" type="text" required autofocus />

			<label for="priimek">Priimek: </label>
      		<input id="priimek" name="priimek" type="text" required />
      
      		<label for="cakanje">Čakanje: </label>
			<input id="cakanje" name="cakanje" type="number" required/>

     		 <label for="razdalja">Razdalja: </label>
			<input id="razdalja" name="razdalja" type="number" required/>

			<button id="addButton" name="save">Dodaj stranko</button>

			</form>
		</fieldset>
	</div>

	<div id="povzetek" class="col-12">
		<button id="povzetekBtn">Povzetek</button>
	</div>

	<?php endif; ?>

	<footer class="col-12">
		3. domača naloga pri predmetu spletne tehnologije @Simon Babnik
	</footer>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="script.js"></script>
</body>

</html>