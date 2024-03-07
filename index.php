<?php

session_start();

if(isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
    
    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>Home Page</h2>

    <?php if (isset($user)): ?>

   
     <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
     <p><a href="logout.php">Log out</a></p>
    <?php else: ?>
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
    <?php endif; ?>
    
</body>
</html>