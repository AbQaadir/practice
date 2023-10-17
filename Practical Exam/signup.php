
<?php
    require_once 'config/session.inc.php';
    require_once 'config/views/signup.view.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
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
        
        <div class="heading">
            <h2>Register Page</h2><br>
        </div>
        <form action="config/signup.inc.php" method="post">
            <label for="name">Name:</label> <br>
            <input type="text" class="name" name="name"> <br><br>
            <label for="email">Email:</label> <br>
            <input type="text" class="email" name="email"> <br><br>
            <label for="password">Password:</label> <br>
            <input type="password" class="password" name="password"> <br><br>
            <label for="confirm_password">Confirm Password:</label> <br>
            <input type="password" class="confirm_password" name="confirm_password"> <br><br>
            <button type="submit" class="submit" value="Submit">Submit</button>
            <button type="reset" class="clear" name="clearAll">Clear All</button>
        </form>
        <div>
            <br><br>
            <div class="errors">
                <?php
                    checkErrors();
                ?>
            </div>

        </div>
        <?php
            unset($_SESSION['errorsSignup']);
            unset($_SESSION['signupData']); 
        ?>
    </main>
    <script>
    document.querySelector(".clear").addEventListener("click", function clearAll(event) {
        document.querySelector(".name").value = "";
        document.querySelector(".email").value = "";
        document.querySelector(".password").value = "";
        document.querySelector(".confirm_password").value = "";
        document.querySelector(".errors").innerHTML = "";
        event.preventDefault();
    });
</script>

</body>

</html>