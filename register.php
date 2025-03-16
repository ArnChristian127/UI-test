<?php
$conn = new mysqli("localhost", "root", "", "accounts");
$check = "";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["reg_username"];
    $gmail = $_POST["reg_gmail"];
    $password = $_POST["reg_password"];

    if (!isset($_POST['reg_agree'])) {
        $check = '<span class="mb-3" style="color: red;">Terms is required!</span>';
    }
    else {
        $checkGmail = $conn->prepare("SELECT * FROM users WHERE gmail = ?");
        $checkGmail->bind_param("s", $gmail);
        $checkGmail->execute();
        $result = $checkGmail->get_result();
        if ($result->num_rows > 0) {
            $check = '<span class="mb-3" style="color: red;">This gmail is already exists!</span>';
        }
        else if (empty($username) || empty($gmail) || empty($password)) {
            $check = '<span class="mb-3" style="color: red;">Please fill all requirements!</span>';
        }
        else {
            $stmt = $conn->prepare("INSERT INTO users (username, gmail, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $gmail, $password);
            if ($stmt->execute()) {
                $check = '<span class="mb-3" style="color: green;">Register Successfully</span>';
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
        $checkGmail->close();
    }
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
    <title>UX - Register</title>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div class="col d-flex justify-content-center align-items-center">
                <form method="post" action="" class="login-box-container p-5 d-flex flex-column">
                    <p class="fw-bold fs-3 text-center" style="color: white;">UX Sign-Up</p>
                    <input name="reg_username" type="text" class="form-control mb-3" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    <input name="reg_gmail" type="email" class="form-control mb-3" placeholder="Email address" aria-label="Email address" aria-describedby="basic-addon1">
                    <input name="reg_password" type="password" class="form-control mb-3" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                    <div class="form-check mb-3" style="color: white;">
                        <input class="form-check-input" type="checkbox" value="yes" name="reg_agree" id="flexCheckIndeterminate">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                            I agree to all statements in <a href="#" class="fw-bold" style="color: rgb(117, 95, 205);">Terms of Service</a>
                        </label>
                    </div>
                    <?php if ($check) {echo $check;}?>
                    <button type="submit" class="btn btn-custom mb-3 fw-bold">Register</button>
                    <button type="button" class="btn btn-custom mb-3 fw-bold" onclick="toNextPage('login.php')">Back</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function toNextPage(page) {
            window.location.href = page;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>