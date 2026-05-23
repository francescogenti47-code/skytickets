<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Risultati ricerca - SkyTickets</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>SkyTickets</h1>
    <p>Risultati ricerca voli</p>
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

        <h2>Voli trovati</h2>

        <?php

        include "connessione.php";

        $prezzo_massimo = $_POST["prezzo_massimo"];

        $sql = "SELECT voli.id,
                       compagnie.nome AS compagnia,
                       partenza.nome AS aeroporto_partenza,
                       arrivo.nome AS aeroporto_arrivo,
                       voli.prezzo,
                       voli.data_volo

                FROM voli

                JOIN compagnie
                ON voli.compagnia_id = compagnie.id

                JOIN aeroporti AS partenza
                ON voli.aeroporto_partenza = partenza.id

                JOIN aeroporti AS arrivo
                ON voli.aeroporto_arrivo = arrivo.id

                WHERE voli.prezzo <= '$prezzo_massimo'";

        $risultato = mysqli_query($conn, $sql);

        echo "<table border='1'>";

        echo "<tr>
                <th>Compagnia</th>
                <th>Partenza</th>
                <th>Arrivo</th>
                <th>Prezzo</th>
                <th>Data</th>
              </tr>";

        while ($riga = mysqli_fetch_assoc($risultato)) {

            echo "<tr>";

            echo "<td>" . $riga["compagnia"] . "</td>";
            echo "<td>" . $riga["aeroporto_partenza"] . "</td>";
            echo "<td>" . $riga["aeroporto_arrivo"] . "</td>";
            echo "<td>" . $riga["prezzo"] . " €</td>";
            echo "<td>" . $riga["data_volo"] . "</td>";

            echo "</tr>";
        }

        echo "</table>";

        mysqli_close($conn);

        ?>

    </div>
</main>

<footer>
    <p>SkyTickets © 2026 - Progetto Informatica Applicata</p>
</footer>

</body>
</html>