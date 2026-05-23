<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["ruolo"] != "admin") {
    header("Location: login.php");
    exit();
}

include "connessione.php";

$id = $_GET["id"];

$sql = "DELETE FROM voli WHERE id=$id";

mysqli_query($conn, $sql);

mysqli_close($conn);

header("Location: voli.php");
exit();
?>