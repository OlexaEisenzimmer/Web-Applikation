<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
    <form action="https://server1.pflugbeil.eu/EchoAll" id="anmeldeForm" method="post">
        <div class="container">
            <img src="Bilder/logo.jpg" alt="">
            <h1>Anmeldung</h1>

            <hr>

            <label for="email"><b>E-Mail</b></label>
            <input type="text" placeholder="Ihre E-Mail.." name="email" id="email" required>

            <label for="psw"><b>Passwort</b></label>
            <input type="password" placeholder="Ihr Passwort.." name="psw" id="psw" required>
            <hr>

            <button type="submit" class="registerbtn">Anmelden</button>

            <div class="container signin">
                <p>Sind Sie noch nicht registriert? <a href="RegisterForm.html">Registrieren</a>.</p>
            </div>
        </div>
    </form>

    

      <?php

      session_start();

      if ($_SERVER["REQUEST_METHOD"]=="POST") {
  
         $servername = "127.0.0.1";
         $db_password = "anna1234";
         $username = "anna";
         $dbname = "kontaktformular";
        
         $conn = new mysqli($servername, $username, $db_password, $dbname);

         if($conn->connect_error){
          die("Verbindung fehlgeschlagen:" . $conn->connect_error);
          
         }
        
         $email = $conn->real_escape_string($_POST["email"]); //SQL-injektion
         $password = $conn->real_escape_string($_POST["psw"]);


         $sql = "SELECT * FROM teem_robotron WHERE email = '$email' AND passwort = '$password' ";
         $result=$conn->query($sql);

         if ($result->num_rows == 1) {
          $_SESSION["loggedin"] = true;
         header("Location: App.php");
         exit();
        }else{
          $login_error = "Falscher Benutzername oder Passwort";
        }
        $conn->close();
        echo "Angemeldet";
      }
      
      ?>

      
      <?php
      echo "php test";
      session_start();
      echo "php test";

      if ($_SERVER["REQUEST_METHOD"]=="POST") {
  
         $servername = "127.0.0.1";
         $db_password = "anna1234";
         $username = "anna";
         $dbname = "kontaktformular";
         echo "php test";
         $conn = new mysqli($servername, $username, $db_password, $dbname);

         if($conn->connect_error){
          die("Verbindung fehlgeschlagen:" . $conn->connect_error);
          
         }
        
         $email = $conn->real_escape_string($_POST["email"]); //SQL-injektion
         $password = $conn->real_escape_string($_POST["psw"]);


         $sql = "SELECT * FROM teem_robotron WHERE email = '$email' AND passwort = '$password' ";
         $result=$conn->query($sql);

         if ($result->num_rows == 1) {
          $_SESSION["loggedin"] = true;
         header("Location: App.php");
         exit();
        }else{
          $login_error = "Falscher Benutzername oder Passwort";
        }
        $conn->close();
        echo "Angemeldet";
      }
      
      ?>
</body>
</html>