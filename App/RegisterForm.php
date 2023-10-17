<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width	, initial-scale=1.0">
    <title>Register Form</title>
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
    <form action="RegisterForm.php" id="registrationForm" method="post">
        <div class="container">
          <img src="Bilder/logo.jpg" alt="" >
          <h1>Registrierung</h1>
          
          <p>Bitte füllen Sie dieses Formular aus, um ein Konto zu erstellen.</p>
          <hr>
      
          <label for="name"><b>Name</b></label>
          <input type="text" placeholder="Ihr Name.." name="name" id="name" required>
      
          <label for="vorname"><b>Vorname</b></label>
          <input type="text" placeholder="Ihr Vorname.." name="vorname" id="vorname" required>
      
          <label for="stelle"><b>Stelle</b></label>
          <input type="text" placeholder="Ihre Stelle.." name="stelle" id="stelle" required>

          <label for="email"><b>E-Mail</b></label>
          <input type="text" placeholder="Ihre E-Mail.." name="email" id="email" required>

          <label for="psw"><b>Passwort</b></label>
          <input type="password" placeholder="Ihr Passwort.." name="psw" id="psw" required>
      
          <label for="psw-repeat"><b>Passwort wiederholen</b></label>
          <input type="password" placeholder="Passwort wiederholen.." name="psw-repeat" id="psw-repeat" required>

          <hr>
          <p>Mit der Erstellung eines Kontos erklären Sie sich mit unseren <a href="Datenschutz.html">Nutzungsbedingungen & Datenschutz</a>.</p>
      
          <button type="submit" class="registerbtn"><a href="AnmeldeForm.html"></a>Registrierung</button>
        </div>
        
        
      </form>
      <?php
      if ($_SERVER["REQUEST_METHOD"]=="POST"){

        $servername = "127.0.0.1";
        $password = "anna1234";
        $username = "anna";
        $dbname = "kontaktformular";

         $conn = new mysqli($servername, $username, $password, $dbname);
  
         if ($conn->connect_error) {
          ("Verbindung fehlgeschlagen: " . $conn->connect_error);
        echo "Verbindung zur Datenbank erfolgreich hergestellt";
      }
    }
        $name = $_POST["name"];
        $vorname = $_POST["vorname"];
        $stelle = $_POST["stelle"];
        $email = $_POST["email"];
        $password = $_POST["psw"];

        $sql = "INSERT INTO team_robotron(name, vorname, stelle, email, passwort)
            VALUES ('$name', '$vorname', '$stelle', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
              echo "Datensatz erfolgreich in die Datenbank eingefügt.";
              header("Location: AnmeldeForm.php");
              exit();
          } else {
              echo "Fehler beim Einfügen des Datensatzes: " . $conn->error;
          }    
      ?>
      <script>
        document.getElementById("registrationForm").addEventListener("submit", function (event) {
          event.preventDefault();
        

        var name = document.getElementById("name").value;
        var vorname = document.getElementById("vorname").value;
        var stelle = document.getElementById("stelle").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("psw").value;
        var pswRepeat = document.getElementById("psw-repeat").value;

        if (name === "" || vorname === ""|| stelle ==="" || email === "" || password === "" || pswRepeat === ""){
          return;
        }
         if (pswRepeat != password){
          alert ("falsches Passwort!")
          return;
         }

        //while (true){
       // var password = prompt("Bitte geben Sie ein Passwort ein (mindestens 10 Zeichen, einschließlich Sonderzeichen und Buchstaben):");
       // }
        if (password.length < 10) {
          alert("Das passwort muss mindestens 10 Zeichen lang sein. Bitte versuchen Sie es erneut");

        } else if (!/[a-zA-Z]/.test(password) || !/[!@#$%^&*()_+[\]{};':"\\|,.<>?]/.test(password)){
          alert("Das Passwort muss sowohl Buchstaben als auch mindestens ein Sonderzeichen enthalten. Bitte versuchen Sie es erneut.");
        } else {
          if (
          )
          alert ("Passwort akzeptiert");
        }

        document.getElementById("registrationForm").submit();  
        });
      </script>
    



</body>
</html>

