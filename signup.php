<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
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
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 360px;
        }
        label {
            display: block;
            margin-top: 12px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
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
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 12px;
            color: #2196F3;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .message {
            margin-top: 15px;
            padding: 10px;
            text-align: center;
            background-color: #d4edda;
            color: #155724;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div>
        <h2>Sign Up</h2>
        <form method="post" action="">
            <label>Username:</label><br>
            <input type="text" name="username" required><br><br>
            <label>Email:</label><br>
            <input type="email" name="email" required><br><br>
            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>
            <input type="submit" name="signup" value="Sign Up">
        </form>

        <?php
        if (isset($_POST['signup'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='message'>User registered successfully! <a href='signup.php'>Login here</a></div>";
            } else {
                echo "<div class='message' style='background-color:#f8d7da;color:#721c24;'>Error: " . $conn->error . "</div>";
            }
        }
        ?>

        <a href="signin.php">Already have an account? Sign In</a>
        <a href="index.html">Back to Home</a>
    </div>
</body>
</html>