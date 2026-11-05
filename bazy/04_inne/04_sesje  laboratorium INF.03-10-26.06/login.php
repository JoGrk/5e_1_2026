<!-- − Efekt działania skryptu 1  -->
<?php

    session_start();

    $login_f = $_POST['login-f']?? NULL;
    $password_f = $_POST['password-f']?? NULL;
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>
            Portal laboratorium
        </h1>
    </header>

    <main class="login-m">
        <h2>
            Zaloguj się do systemu
        </h2>

        <form action="login.php" method="post">

            <label for="login-f">Login:</label>
            <input type="text" name="login-f" id="login-f"> <br>

            <label for="password-f">Hasło:</label>
             <input type="password" name="password-f" id="password-f"> <br>

             <button class="btn">Zaloguj</button>
        </form>
    </main>

    <footer>
        <p>
            Wykonał: 123
        </p>
    </footer>
</body>
</html>