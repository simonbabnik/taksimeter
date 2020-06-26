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
        <h1>Registracija</h1>
    </header>

    <div class="header"> 
        <h2>Ustvarite nov račun</h2> 
    </div> 
       
    <form method="post" action="registracija.php"> 
   
        <?php include('errors.php'); ?> 
   
        <div class="input-group"> 
            <label>Uporabniško ime</label> 
            <input type="text" name="username" required
                value="<?php echo $username; ?>"> 
        </div> 
        <div class="input-group"> 
            <label>E-naslov</label> 
            <input type="email" name="email" required
                value="<?php echo $email; ?>"> 
        </div> 
        <div class="input-group"> 
            <label>Geslo</label> 
            <input type="password" name="password_1" required> 
        </div> 
        <div class="input-group"> 
            <label>Potrdite geslo</label> 
            <input type="password" name="password_2" required> 
        </div> 
        <div class="input-group"> 
            <button type="submit" class="btn"
                                name="reg_user"> 
                Registrirajte se
            </button> 
        </div> 
        <p> 
            Že imate račun? <a href="prijava.php"> Prijavite se tukaj! </a> 
        </p> 
    </form> 
</body> 
</html> 