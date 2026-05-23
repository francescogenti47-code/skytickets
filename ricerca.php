<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ricerca voli - SkyTickets</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>SkyTickets</h1>
    <p>Ricerca voli</p>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="voli.php">Voli</a>
    <a href="ricerca.php">Ricerca</a>

    <?php
    if (isset($_SESSION["ruolo"]) && $_SESSION["ruolo"] == "admin") {
        echo '<a href="admin.php">Admin</a>';
        echo '<a href="logout.php">Logout</a>';
    } else {
        echo '<a href="login.php">Login</a>';
    }
    ?>
</nav>

<main>
    <div class="card">
        <h2>Cerca voli per prezzo massimo</h2>

        <form method="POST" action="risultati_ricerca.php">
            Prezzo massimo:<br>
            <input type="number" name="prezzo_massimo"><br><br>

            <input type="submit" value="Cerca">
        </form>
    </div>
</main>

<footer>
    <p>SkyTickets © 2026 - Progetto Informatica Applicata</p>
</footer>

</body>
</html>