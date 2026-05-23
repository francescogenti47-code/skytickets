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
    <title>Aggiungi volo - SkyTickets</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>SkyTickets</h1>
    <p>Aggiungi nuovo volo</p>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="voli.php">Voli</a>
    <a href="admin.php">Admin</a>
</nav>

<main>
    <div class="card">
        <h2>Inserisci nuovo volo</h2>

        <form method="POST" action="salva_volo.php">
            ID compagnia:<br>
            <input type="number" name="compagnia_id"><br><br>

            ID aeroporto partenza:<br>
            <input type="number" name="aeroporto_partenza"><br><br>

            ID aeroporto arrivo:<br>
            <input type="number" name="aeroporto_arrivo"><br><br>

            Prezzo:<br>
            <input type="text" name="prezzo"><br><br>

            Data volo:<br>
            <input type="date" name="data_volo"><br><br>

            <button type="submit">Salva volo</button>
        </form>
    </div>
</main>

</body>
</html>