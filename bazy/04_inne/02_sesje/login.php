<?php
    $password = $_POST['password'] ?? NULL;
    if($password == 'admin'){
        setcookie('rola', 'admin', time()+3600);
    }
    else {
        setcookie('rola', 'user', time()+3600);
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="password" name="password" id="password">
        <button>Wyslij</button>
    </form>
    <a href="panel.php">panel</a>
</body>
</html>