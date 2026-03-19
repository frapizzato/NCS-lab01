<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px; /* Limiting max width to prevent too much stretching */
            width: 100%; /* Taking full width within the max width */
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 22px); /* Adjusting input width */
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if(isset($_POST['login']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $con = mysqli_connect('localhost','root','secret','db');
            $result = mysqli_query($con, "SELECT * FROM `users` WHERE username='$username' AND password='$password'");
            if(mysqli_num_rows($result) == 0)
                echo '<h1>Invalid username or password!</h1>';
            else
                echo '<h1>Logged in</h1><p>You logged in with valid credentials!</p>';
        }
        else
        {
        ?>
            <h1>Login</h1>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" required/><br />
                <input type="password" name="password" placeholder="Password" required/><br />
                <input type="submit" name="login" value="Login"/>
            </form>
        <?php
        }
        ?>
    </div>
</body>
</html>