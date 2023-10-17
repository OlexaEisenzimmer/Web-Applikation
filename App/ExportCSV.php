<?php
$servername = "127.0.0.1";
$db_password = "anna1234";
$username = "anna";
$dbname = "kontaktformular";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $db_password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// SQL-Abfrage, um Daten aus der Datenbank abzurufen (ersetzen Sie dies durch Ihre eigene Abfrage)
$query = "SELECT * FROM messe_besuchern";
$result = $conn->query($query);

if ($result->rowCount() > 0) {
    // Dateinamen für den Export
    $filename = "exported_data.csv";

    // Datei zum Schreiben öffnen oder erstellen
    $file = fopen($filename, 'w');

    // Headerzeile in die CSV-Datei schreiben
    $header = array('ID','Name', 'Vorname', 'Strasse', 'PLZ', 'Ort', 'Kundennummer', 'Geburtsdatum', 'Telefon', 'Mobil', 'Email', 'BeruflicheQualifikation', 'BeruflicheTaetigkeiten', 'Datenschutz');
    fputcsv($file, $header, ";");

    // Daten aus der Datenbank in die CSV-Datei schreiben, wenn sie nicht leer sind
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $nonEmptyData = array_filter($row, function($value) {
            return $value !== ''; // Nur nicht leere Werte beibehalten
        });

        if (!empty($nonEmptyData)) {
            fputcsv($file, $nonEmptyData, ";");
        }
    }

    // Datei schließen
    fclose($file);

    // Header-Einstellungen für den Download der CSV-Datei
    header('Content-Description: File Transfer');
    header('Content-Type: application/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename=' . $filename);
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Encoding: UTF-8');
    

    // Die CSV-Datei zum Benutzer senden
    readfile($filename);

    // Datei löschen, falls gewünscht
    unlink($filename);
} else {
    echo "Keine Daten zum Exportieren gefunden.";
}

?>
