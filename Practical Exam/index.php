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