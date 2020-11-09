<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../');
    exit();
}
?>
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
                <a href="../profil" class="nav-link">Profil</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Panel administracyjny</h2>
            <p>Witaj <?= $_SESSION['user_login'] ?>!</p>
            <form action="../scripts/logout.php">
                <input class="btn btn-danger" type="submit" value="Wyloguj się"/>
            </form>
        </div>
    </div>
    <?php if ($_SESSION['user_role'] == 'a') { ?>
    <div class="row">
        <div class="col">
            <p>Zarządzaj innymi użytkownikami</p>
        </div>
    </div>
</div>
<?php require "../static/scripts.html" ?>
</body>
