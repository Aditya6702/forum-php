<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style-login.css">
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label>Email:</label>
        <input type="text" name="email"><br><br>
        <label>Password:</label>
        <input type="password" name="password"><br><br>
        <input type="submit" name="submit" value="Login">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'db.php';

        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            echo "Login successful!";
        } else {
            echo "Invalid credentials.";
        }
    }
    ?>
</body>
</html>
