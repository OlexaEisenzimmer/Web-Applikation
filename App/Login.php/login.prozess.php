<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Benutzereingaben übernehmen und vor SQL-Injektion schützen
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Datenbankverbindung herstellen
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=your_database_name", "db_user", "db_password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL-Abfrage vorbereiten und ausführen
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(array(":username" => $username));
        $user = $stmt->fetch();

        // Passwort überprüfen
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php"); // Weiterleitung nach erfolgreichem Login
            exit();
        } else {
            echo "Falscher Benutzername oder Passwort";
        }
    } catch (PDOException $e) {
        die("Datenbankfehler: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login-Fehler</title>
</head>
<body>
    <a href="login.php">Zurück zum Login</a>
</body>
</html>
