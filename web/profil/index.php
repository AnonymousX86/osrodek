<!doctype html>
<html lang="pl">
<head>
    <?php require "../static/head.html" ?>
    <title>Ośrodek wypoczynkowy</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="#" class="navbar-brand">Ośrodek</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="/" class="nav-link">Strona główna</a>
            </li>
            <li class="nav-item">
                <a href="../rezerwacje" class="nav-link">Rezerwacje</a>
            </li>
            <li class="nav-item">
                <a href="../profil" class="nav-link active">Profil</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h2>Dzień dobry, użytkowniku!</h2>
        </div>
        <div class="col-auto">
            <form action="" method="post">
                <input type="submit" value="Wyloguj się" class="btn btn-warning"/>
            </form>
        </div>
        <div class="col-auto">
            <a href="../panel"><button class="btn btn-primary">Przejdź no panelu administracyjnego</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Twoje rezerwacje</h3>
        </div>
    </div>
</div>
<?php require "../static/scripts.html" ?>
</body>
