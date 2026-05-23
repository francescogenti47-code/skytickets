<?php
session_start();

include "connessione.php";

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM utenti 
        WHERE username='$username' AND password='$password'";

$risultato = mysqli_query($conn, $sql);

if (mysqli_num_rows($risultato) == 1) {
    $utente = mysqli_fetch_assoc($risultato);

    $_SESSION["username"] = $utente["username"];
    $_SESSION["ruolo"] = $utente["ruolo"];

    if ($utente["ruolo"] == "admin") {
        header("Location: admin.php");
    } else {
        header("Location: index.php");
    }
} else {
    echo "Username o password sbagliati.";
}

mysqli_close($conn);
?>