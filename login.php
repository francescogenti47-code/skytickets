<!DOCTYPE html>
<html>
<head>
    <title>Login - SkyTickets</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>SkyTickets</h1>
    <p>Accesso utenti</p>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="voli.php">Voli</a>
    <a href="ricerca.php">Ricerca</a>
    <a href="login.php">Login</a>
</nav>

<main>
    <div class="card">
        <h2>Login</h2>

        <form method="POST" action="controlla_login.php">
            Username:<br>
            <input type="text" name="username"><br><br>

            Password:<br>
            <input type="password" name="password"><br><br>

            <button type="submit">Accedi</button>
        </form>
    </div>
</main>

</body>
</html>