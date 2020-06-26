<?php include('server.php') ?> 

<!DOCTYPE html> 
<html lang="en">
<head>
  <title>Prijava</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" rel="stylesheet">
</head>

<body>
  
  <header class="col-12">
    <h1>Prijava</h1>
  </header>

    <div class="header"> 
        <h2>Prijavite se s svojim uporabniškim imenom in geslom.</h2> 
    </div> 
       
    <form method="post" action="prijava.php"> 
   
        <?php include('errors.php'); ?> 

        <div class="input-group"> 
            <label>Uporabniško ime</label> 
            <input type="text" name="username" required autofocus> 
        </div> 

        <br>

        <div class="input-group"> 
            <label>Geslo</label> 
            <input type="password" name="password" required> 
        </div> 
        <div class="input-group"> 
            <button type="submit" class="btn"
                        name="login_user"> 
                Prijava 
            </button> 
        </div> 
        <p> 
            Še nimate računa?  
            <a href="registracija.php"> 
                Registrirajte se 
            </a> 
        </p> 
    </form> 

    <a href="index.php">Nazaj</a>
</body> 
  
</html> 