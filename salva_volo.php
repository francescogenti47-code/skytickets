<?php

session_start();

if (!isset($_SESSION["username"]) || $_SESSION["ruolo"] != "admin") {
    header("Location: login.php");
    exit();
}

include "connessione.php";

$compagnia_id = $_POST["compagnia_id"];
$aeroporto_partenza = $_POST["aeroporto_partenza"];
$aeroporto_arrivo = $_POST["aeroporto_arrivo"];
$prezzo = $_POST["prezzo"];
$data_volo = $_POST["data_volo"];

$sql = "INSERT INTO voli 
(compagnia_id, aeroporto_partenza, aeroporto_arrivo, prezzo, data_volo)

VALUES
('$compagnia_id',
 '$aeroporto_partenza',
 '$aeroporto_arrivo',
 '$prezzo',
 '$data_volo')";

mysqli_query($conn, $sql);

mysqli_close($conn);

header("Location: voli.php");

?>