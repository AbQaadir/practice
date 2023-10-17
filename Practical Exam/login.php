<?php 
    require_once 'config/session.inc.php';
    require_once 'config/views/login.view.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <main>
        <form action="config/login.inc.php" method="post">
            <label for="email">Email:</label> <br>
            <input type="text" class="email" name="email"> <br><br>
            <label for="password">Password:</label><br>
            <input type="password" class="password" name="password"> <br><br>

            <button class="submit" name="submit">Submit</button>
        </form>
        <div>
            <?php
                checkErrors();
                unset($_SESSION["errorsLogin"]);
            ?>
        </div>
    </main>
</body>

</html>