<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>SkyTickets</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>SkyTickets</h1>
        <p>Offerte e voli low cost</p>
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

            <h2>Benvenuto nel sito SkyTickets</h2>

<img src="img/banner.jpg" alt="Banner SkyTickets" width="100%">

<p>
    SkyTickets è un sito dimostrativo per la gestione di offerte di voli aerei.
    Permette di consultare i voli disponibili, cercare voli in base al prezzo massimo
    e accedere a un’area amministratore.
</p>

<p>
    L’amministratore può inserire nuovi voli ed eliminare quelli già presenti.
    I dati vengono salvati in un database MySQL e visualizzati dinamicamente tramite PHP.
</p>

        </div>

    </main>

    <footer>
    <p>SkyTickets © 2026 - Progetto Informatica Applicata</p>
</footer>

</body>

</html>