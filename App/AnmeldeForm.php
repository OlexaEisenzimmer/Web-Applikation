
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width	, initial-scale=1.0">
    <title>Anmelden Form</title>
    <style>
        body {
          font-family: Arial, Helvetica, sans-serif;
          background-color: black;
        }
        
        * {
          box-sizing: border-box;
        }
        
        /* Add padding to containers */
        .container {
          padding: 16px;
          background-color: white;
        }
        
        /* Full-width input fields */
        input[type=text], input[type=password] {
          width: 100%;
          padding: 15px;
          margin: 5px 0 22px 0;
          display: inline-block;
          border: none;
          background: #f1f1f1;
        }
        
        input[type=text]:focus, input[type=password]:focus {
          background-color: #ddd;
          outline: none;
        }
        
        /* Overwrite default styles of hr */
        hr {
          border: 1px solid #f1f1f1;
          margin-bottom: 25px;
        }
        
        /* Set a style for the submit button */
        .registerbtn {
          background-color: #004177;
          color: white;
          padding: 16px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
          opacity: 0.9;
        }
        
        .registerbtn:hover {
          opacity: 1;
        }
        
        /* Add a blue text color to links */
        a {
          color: dodgerblue;
        }
        
        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
          background-color: #f1f1f1;
          text-align: center;
        }
        h1,p {
            color: #004177
        }
        img{
          float: right;
        }
        </style>
</head>
<body>

<form action="AnmeldeForm.php" id="anmeldeForm" method="post">
    <!--form action="https://server1.pflugbeil.eu/EchoAll"id="anmeldeForm" method="post"-->
        <div class="container">
          <img src="Bilder/logo.jpg" alt="" >
          <h1>Anmeldung</h1>
          
          <hr>
      
          <label for="email"><b>E-Mail</b></label>
          <input type="text" placeholder="Ihre E-Mail.." name="email" id="email" required>
      
          <label for="psw"><b>Passwort</b></label>
          <input type="password" placeholder="Ihr Passwort.." name="password" id="psw" required>
          <hr>
          <a href="App.html">
          <button type="submit" class="registerbtn">Anmelden</button>
          </a>

         


          
      <?php
      session_start();
       if ($_SERVER["REQUEST_METHOD"]=="POST") {
 
         $servername = "127.0.0.1";
         $db_password = "anna1234";
         $username = "anna";
         $dbname = "kontaktformular";
        
         
         $conn = new PDO ('mysql:host=' . $servername . ';dbname='. $dbname, $username,$db_password);         
          // Prüfen für PDO
         if   (!$conn)                              //statt($conn->connect_error)
         {
          die("Verbindung fehlgeschlagen:" . $conn->errorCode());            //statt connect_error);          
         }

                  
         //$Id_Mitarbeiter = $_POST["ID_Mitarbeiter"];
         //$name = $_POST["Name"];                  
         //$vorname = $_POST["firstname"];  
         //$stelle = $_POST["Stelle"];         
         $email = $_POST["email"];               
         $Passwort = $_POST["password"];                  
         //$Datenschutz = $_POST["Datenschutz"];
         /*if (empty($Datenschutz)) 
         {
         $Datenschutz = "Keine Einwilligung erteilt";
         }*/

         $sql_p = 'SELECT * FROM team_robotron WHERE Email = :email AND Passwort = :password';



         /*$sql_p = 'INSERT INTO messe_besuchern(Name, Vorname, Strasse, PLZ, Ort,Kundennummer,
          Telefon, Mobil, EMail, BeruflicheQualifikation, BeruflicheTaetigkeit, Datenschutz)
         VALUES (:Name, :Vorname, :Strasse, :PLZ, :Ort, :Kundennummer, :Telefon, : Mobil, :EMail,
         :BeruflicheQualifikation, :BeruflicheTaetigkeit, :Datenschutz)';*/
         $STH=$conn->prepare($sql_p);  //$conn statt $DBH

         //$STH->bindParam(':Name',$name,PDO::PARAM_STR);
         //$STH->bindParam(':Vorname',$vorname,PDO::PARAM_STR);
         //$STH->bindParam(':stelle',$stelle,PDO::PARAM_STR);         
         $STH->bindParam(':email',$email,PDO::PARAM_STR);
         $STH->bindParam(':password',$Passwort,PDO::PARAM_STR);        
         // $STH->bindParam(':Datenschutz',$Datenschutz,PDO::PARAM_STR);

         // Prüfen für PDO
        $result = $STH->execute();
        $rowCount = $STH->rowCount();

         if ($rowCount == 1 )                                             //($result->num_rows == 1) {
           { 
         $_SESSION["loggedin"] = true;
         header("Location: App.php");
         exit();
        } 
        else
        {
          $login_error = "Falscher Benutzername oder Passwort";
          echo "<div class=\"container signin\">";  
          echo "<p style=\"color :red\">Falscher Benutzername oder Passwort</p>";
          echo "</div>";
          //var_dump($STH->errorInfo());
        }
        //$conn->close();
      }

      /*if ($_SERVER["REQUEST_METHOD"]=="POST") {
  
         $servername = "127.0.0.1";
         $db_password = "anna1234";
         $username = "anna";
         $dbname = "kontaktformular";
        
         
         $conn = new mysqli ($servername, $username, $db_password, $dbname);


         
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
        } else{
          $login_error = "Falscher Benutzername oder Passwort";
          // echo "Falscher Benutzername oder Passwort";
        }
        $conn->close();
      }*/
      ?>
       <div class="container signin">
            <p>Sind Sie noch nicht registriert? <a href="RegisterForm.html">Registrieren</a>.

          </div>
        </div>
      </form>
      
      

      <script>
        document.getElementById("anmeldeForm").addEventListener("submit", function (event){

          var email = document.getElementById("email").value;
          var password = document.getElementById("psw").value;

          if (email.trim() === "" || password.trim() === "") {
            alert ("Bitte füllen Sie alle Felder aus.")
            
            event.preventDefault();
          };
      });
      
      </script>
</body>
</html>