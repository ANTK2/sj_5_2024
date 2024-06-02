<?php
session_start();
include_once 'classes/autoloader.php';
$db = new Database();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>NovinySlovakia</title>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg fixed-top navbar-scroll">
        <div class="container">
            <a href="index">
                <img src="img/logo.png" height="70" alt=""loading="lazy" />
            </a>
            <button class="navbar-toggler ps-0" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
            aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon d-flex justify-content-start align-items-center">
                <i class="fas fa-bars"></i>
            </span>
            </button>
            <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="index">Najnovšie Správy</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#pets">Zdravie</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#adoptions">Šport</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#foundation">Politika</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#help">Technológie</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#education">Životné Prostredie</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#about">Ekonomika</a>
                </li>
            </ul>

            <ul class="navbar-nav flex-row">
                <li class="nav-item">
                <a class="nav-link px-2" href="#!">
                    <i class="fab fa-facebook-square"></i>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link px-2" href="#!">
                    <i class="fab fa-instagram"></i>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link ps-2" href="#!">
                    <i class="fab fa-youtube"></i>
                </a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    </header>