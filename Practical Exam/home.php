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