<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="ui.css">
    <title><?php echo $_SESSION["user"]; ?> - Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-custom navbar-dark">
        <div class="container">
            <p class="navbar-brand-custom fw-bold fs-3" href="#">UX Interface</p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link me-3" href="#">Delivery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3" href="#">Business</a>
                    </li>
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout.php">Sign-out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-5" id="home">
        <div class="row d-flex justify-content-center align-items-center text-white mb-5">
            <div class="col-12 col-md-8 col-lg-8 d-flex justify-content-center align-items-center">
                <form class="bg-gray p-2 d-flex flex-column w-100">
                    <p class="fs-5 fw-bold">
                        Name: <span style="color: rgb(117, 95, 205);"><?php echo $_SESSION["user"]; ?></span><br>
                    </p>
                    <canvas id="barChart" style="max-height: 250px;"></canvas>
                </form>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center text-white mb-5">
            <div class="col-12 col-md-4 col-lg-4 d-flex justify-content-center align-items-center">
                <div class="bg-gray p-2 d-flex flex-column w-100">
                    <p class="fs-5 fw-bold text-center">Top Contributes</p>
                    <canvas id="pieChart" style="max-height: 200px;"></canvas>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4 d-flex justify-content-center align-items-center">
                <div class="bg-gray p-2 d-flex flex-column w-100">
                    <p class="fs-5 fw-bold text-center">Top Payment bills</p>
                    <canvas id="pieChart2" style="max-height: 200px;"></canvas>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center text-white mb-5 gy-3">
            <div class="col-lg-2 col-md-4 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="function.js"></script>
</body>
</html>