<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 320px;
        }
        label {
            display: block;
            margin-top: 12px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            margin-top: 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #2196F3;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .message {
            margin-top: 15px;
            padding: 8px;
            text-align: center;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div>
        <h2>Sign In</h2>
        <form method="post" action="">
            <label>Username:</label><br>
            <input type="text" name="username" required><br><br>
            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>
            <input type="submit" name="signin" value="Sign In">
        </form>

        <?php
        if (isset($_POST['signin'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM user WHERE username='$username'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    echo "<div class='message success'>Login successful! Welcome, " . $row['username'] . "</div>";
                } else {
                    echo "<div class='message error'>Invalid password!</div>";
                }
            } else {
                echo "<div class='message error'>No user found!</div>";
            }
        }
        ?>
        <a href="signup.php">Don't have an account? Sign Up</a>
        <a href="index.html">Back to Home</a>
    </div>
</body>
</html>