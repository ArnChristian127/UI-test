<?php
session_start();
$conn = new mysqli("localhost", "root", "", "accounts");
$error = "";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gmail = $_POST["log_gmail"];
    $password = $_POST["log_password"];
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE gmail = ? AND password = ?");
    $stmt->bind_param("ss", $gmail, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION["user"] = $user["username"];
        header("Location: dashboard.php");
        exit();
    }
    else {
        $error = '<span class="mb-3" style="color: red;">User not found</span>';
    }
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>UX - Login</title>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div class="col d-flex justify-content-center align-items-center">
                <form action="" method="post" class="login-box-container p-5 d-flex flex-column">
                    <p class="fw-bold fs-3 text-center" style="color: white;">UX Sign-In</p>
                    <input name="log_gmail" type="email" class="form-control mb-3" placeholder="Email address" aria-label="Email address" aria-describedby="basic-addon1" required>
                    <input name="log_password" type="password" class="form-control mb-3" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                    <button type="submit" class="btn btn-custom mb-3 fw-bold">Login</button>
                    <?php if ($error) {echo $error;}?>
                    <p style="color: white;">Not new member? <a href="register.php" class="fw-bold" style="color: rgb(117, 95, 205);">Register Now</a></p>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>