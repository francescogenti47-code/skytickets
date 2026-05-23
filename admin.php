<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["ruolo"] != "admin") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - SkyTickets</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>SkyTickets</h1>
    <p>Area amministratore</p>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="voli.php">Voli</a>
    <a href="ricerca.php">Ricerca</a>
    <a href="admin.php">Admin</a>
    <a href="logout.php">Logout</a>
</nav>

<main>
    <div class="card">
    <h2>Benvenuto nell'area admin</h2>
    <p>Da qui potrai gestire i voli del sito.</p>

    <p>
        <a href="aggiungi_volo.php">Aggiungi nuovo volo</a>
    </p>
</div>
</main>

<footer>
    <p>SkyTickets © 2026 - Progetto Informatica Applicata</p>
</footer>

</body>
</html>