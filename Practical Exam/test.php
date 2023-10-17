
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




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
        <div class="primary-btn">
            <button><a href="signup.php">Register</a></button>
            <button><a href="login.php">LogIn</a></button>
        </div>

        <div class="friend-list">
        </div>
        <div class="remove-friend">

        </div>
    </main>
    <script>
        const friendList = document.querySelector('.friend-list');
        const removeFriend = document.querySelector('.remove-friend');

        function clearAll() {
            friendList.innerHTML = '';
            removeFriend.innerHTML = '';
        }
        
    </script>
</body>
</html>




<?php
require_once 'config/session.inc.php';
require_once 'config/db.inc.php';
require_once 'config/model/home.model.php';


if (!isset($_SESSION["email"])) {
    header('Location: login.php');
    exit();
}

$email = $_SESSION["email"];
$results = getUnfriends($pdo, $email);

if (isset($_POST["addFriend"])) {
    require_once 'config/model/addFriend.model.php';

    $friendId = $_POST["id"];
    echo $friendId;
    $result = getUser($pdo, $email);
    echo $result["id"];
    addFriend($pdo, $result["id"], $friendId);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UnFried List</title>

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
        <form action="" method="post">
            <div class="addFriend">
                <?php
                if ($results) {
                    echo '<table>';
                    echo '<tbody>';
                    foreach ($results as $result) {
                        echo '<tr data-friend-id="' . $result['id'] . '">';
                        echo '<td>' . $result['name']. '</td>';
                        echo '<td><button type="submit" class="btn" name="addFriend" onclick="addFriend(' . $result['id'] . ')">Add Friend</button></td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                }
                ?>

                <input type="hidden" class="hidden-id" name="id">
            </div>
        </form>
    </main>
    <script>
        function addFriend(friendId) {
            const friendRow = document.querySelector(`tr[data-friend-id="${friendId}"]`);

            if (friendRow) {
                friendRow.remove();
            }

            document.querySelector(".hidden-id").value = friendId;
        }
    </script>

</body>

</html>

