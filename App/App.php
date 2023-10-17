<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messe App</title>
    <link rel="stylesheet" href="Style/style.css">

    <img src="Bilder/Bild1.jpg" alt="Bild1"  srcset="" >
    <img src="Bilder/logo.jpg" alt="Bild1"  srcset="" >
    
</head>
<body>
    <h2>Kontaktformular-Messe</h2>
    <div class="container">
        <form action="App.php" id="appForm" method="post" accept-charset="utf-8">
      
          <label for="Name">Name</label>
          <input type="text" id="Name" name="name" placeholder="Ihr Name ..">
      
          <label for="Vname">Vorname</label>
          <input type="text" id="firstname" name="firstname" placeholder="Ihr Vorname ..">
        
          <label for="Straße">Straße</label>
          <input type="text" id="Straße" name="Straße" placeholder="Straße..">

          <label for="Plz">PLZ</label>
          <input type="text" id="Plz" name="Plz" placeholder="Postleizahl..">

          <label for="Ort">Ort</label>
          <input type="text" id="Ort" name="Ort" placeholder="Ort..">

          <label for="Kundennummer">Kundennummer</label>
          <input type="text" id="Kundennummer" name="Kundennummer" placeholder="Ihre Kundennummer..">

          <label for="Geburtsdatum">Geburtsdatum</label>
          <input type="text" id="Geburtsdatum" name="Geburtsdatum" placeholder="Ihr Geburtsdatum..">

          <label for="Telefon">Telefon</label>
          <input type="text" id="Telefon" name="Telefon" placeholder="Ihr Telefon..">

          <label for="Mobil">Mobil</label>
          <input type="text" id="Mobil" name="Mobil" placeholder="Ihr Mobil..">

          <label for="lname">EMail</label>
          <input type="text" id="EMail" name="EMail" placeholder="Ihre EMail..">

          <label for="lname">Berufliche Qualifikation</label>
          <input type="text" id="Qualifikation" name="Qualifikation" placeholder="Ihre Qualifikation..">

          <label for="Tätigkeit">Berufliche Tätigkeit</label>
          <input type="text" id="" name="Tätigkeit" placeholder="Ihre Tätigkeit..">
         
          <label for="Weiterbildung">Gewünschte Weiterbildung</label>
          <select id="Weiterbildung" name="Weiterbildung">
            <option value="australia">Fachinformatik</option>
            <option value="canada">Kaufmann</option>
            <option value="usa"></option>
          </select>

          <label for="Kalender">Gewünschter Starttermin/Umfang</label>
          <input type="text" id="kalender" name="...." placeholder="..">

         <!-- <label for="Dateschutz">Datenschutz</label>
          <select id="Datenschutz" id="Datenschutz" name="Datenschutz" placeholder="..">
             <option value="australia">ja</option>
             <option value="canada">nein</option>
             </select>
           <p>Zustellung des Angebots:</p>
           <input type="radio" id="perPost" name="Zustellung" value="perPost">
           <label for="html">per Post</label><br>
           <input type="radio" id="perMail"  name="Zustellung" value="perMail">
           <label for="perMail">per Mail</label><br>
           <input type="radio" id="Abholung"  name="Zustellung" value="Abholung">
           <label for="Abholung">persönliche Abholung</label>

          </select><br>-->
          <input type="submit" value="Daten versenden">
        </form>
      </div>
      
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

                  

         $name = $_POST["name"];                  //$conn->real_escape_string($_POST["name"]);
         $vorname = $_POST["firstname"];          //$conn->real_escape_string($_POST["firstname"]);
         $straße = $_POST["Straße"];              // $conn->real_escape_string($_POST["straße"]);
         $Plz = $_POST["Plz"];                    //$conn->real_escape_string($_POST["Plz"]);
         $Ort = $_POST["Ort"];                    //$conn->real_escape_string($_POST["Ort"]);
         $Kundennummer = $_POST["Kundennummer"];  // $conn->real_escape_string($_POST["Kundennummer"]);
         $Geburtsdatum = $_POST["Geburtsdatum"]; // $conn->real_escape_string($_POST["Geburtsdatum"]);
         $Telefon = $_POST["Telefon"];              // $conn->real_escape_string($_POST["Telefon"]);
         $Mobil = $_POST["Mobil"];                 //$conn->real_escape_string($_POST["Mobil"]);
         $email = $_POST["EMail"];                //$conn->real_escape_string($_POST["E-Mail"]);
         $Qualifikation = $_POST["Qualifikation"];    //= $conn->real_escape_string($_POST["Qualifikation"]);
         $Tätigkeit = $_POST["Tätigkeit"];          //$conn->real_escape_string($_POST["Tätigkeit"]);
         $Datenschutz = $_POST["Datenschutz"];
         /*if (empty($Datenschutz)) 
         {
         $Datenschutz = "Keine Einwilligung erteilt";
         }*/

         $sql_p = 'INSERT INTO messe_besuchern(Name, Vorname,Strasse,PLZ, Ort, Kundennummer, Geburtsdatum, Telefon, Mobil, EMail, BeruflicheQualifikation, BeruflicheTaetigkeiten, Datenschutz) 
          VALUES (:Name, :Vorname, :Strasse,:PLZ, :Ort, :Kundennummer, :Geburtsdatum, :Telefon, :Mobil, :EMail, :BeruflicheQualifikation, :BeruflicheTaetigkeiten, :Datenschutz)';



         /*$sql_p = 'INSERT INTO messe_besuchern(Name, Vorname, Strasse, PLZ, Ort,Kundennummer,
          Telefon, Mobil, EMail, BeruflicheQualifikation, BeruflicheTaetigkeit, Datenschutz)
         VALUES (:Name, :Vorname, :Strasse, :PLZ, :Ort, :Kundennummer, :Telefon, : Mobil, :EMail,
         :BeruflicheQualifikation, :BeruflicheTaetigkeit, :Datenschutz)';*/
         $STH=$conn->prepare($sql_p);  //$conn statt $DBH

         $STH->bindParam(':Name',$name,PDO::PARAM_STR);
         $STH->bindParam(':Vorname',$vorname,PDO::PARAM_STR);
         $STH->bindParam(':Strasse',$strasse,PDO::PARAM_STR);
         $STH->bindParam(':PLZ', $Plz, PDO::PARAM_STR);
         $STH->bindParam(':Ort',$Ort,PDO::PARAM_STR);
         $STH->bindParam(':Kundennummer',$Kundennummer,PDO::PARAM_STR);
         $STH->bindParam(':Geburtsdatum',$Geburtsdatum);
         $STH->bindParam(':Telefon', $Telefon, PDO::PARAM_STR);
         $STH->bindParam(':Mobil',$Mobil,PDO::PARAM_STR);
         $STH->bindParam(':EMail',$email,PDO::PARAM_STR);
         $STH->bindParam(':BeruflicheQualifikation',$Qualifikation,PDO::PARAM_STR);
         $STH->bindParam(':BeruflicheTaetigkeiten',$Tätigkeit,PDO::PARAM_STR);
         $STH->bindParam(':Datenschutz',$Datenschutz,PDO::PARAM_STR);

         // Prüfen für PDO
        $result = $STH->execute();

         if ($result)                                             //($result->num_rows == 1) {
           { 
         $_SESSION["loggedin"] = true;
         header("Location: App.php");
         exit();
        } 
        else
        {
          $login_error = "Falscher Benutzername oder Passwort";
          // echo "Falscher Benutzername oder Passwort";
          //var_dump($STH->errorInfo());
        }
        $conn->close();
      }
      ?>
   <!--script src="Script/scriptr.js"></script-->
   <script>
   
    document.getElementById("appForm").addEventListener("submit", function (event){
      
    if(!confirm("Schriftliche Einwilligung gemäß Datenschutz Die im Vertrag angegebenen personenbezogenen Daten, insbesondere Name, Anschrift, Telefonnummer, Bankdaten, die allein zum Zwecke der Durchführung des entstehenden Vertragsverhältnisses notwendig und erforderlich sind, werden auf Grundlage gesetzlicher Berechtigungen erhoben.Für jede darüber hinausgehende Nutzung der personenbezogenen Daten und die Erhebung zusätzlicher Informationen bedarf es regelmäßig der Einwilligung des Betroffenen. Eine solche Einwilligung können Sie im Folgenden Abschnitt freiwillig erteilen.Einwilligung in die Datennutzung zu weiteren Zwecken Ich willige ein, dass mir die Kreditanstalt XYZ (Vertragspartner) postalisch Informationen und Angebote zu weiteren Finanzprodukten zum Zwecke der Werbung übersendet.Ich willige ein, dass per E-Mail/Telefon/Fax/SMS* Informationen und Angebote zu weiteren Finanzprodukten zum Zwecke der Werbung übersendet"))
    {        
        alert("Die Daten wurden nicht gesendet.");
        event.preventDefault();
    }   
    
    });

     </script>
</body>

</html>