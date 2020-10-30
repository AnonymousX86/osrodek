<!doctype html>
<html lang="pl">
<head>
    <?php require "../static/head.html" ?>
    <title>Ośrodek | Rezerwacje</title>
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
                <a href="../rezerwacje" class="nav-link active">Rezerwacje</a>
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
            <h2>Dostępne pokoje</h2>
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <img class="card-img-top" src="https://dummyimage.com/600x400/000/fff" alt="Zdjęcie 600x400"/>
                        <div class="card-body">
                            <h5 class="card-title">Przykład 1</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab culpa,
                                deserunt ducimus est eveniet ipsa ipsam, maxime modi necessitatibus nobis placeat quos
                                sed. Accusantium aspernatur, ipsa libero officia perferendis saepe.</p>
                            <a href="#" class="btn btn-primary">Rezerwuj</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <img class="card-img-top" src="https://dummyimage.com/600x400/000/fff" alt="Zdjęcie 600x400"/>
                        <div class="card-body">
                            <h5 class="card-title">Przykład 2</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab culpa,
                                deserunt ducimus est eveniet ipsa ipsam, maxime modi necessitatibus nobis placeat quos
                                sed. Accusantium aspernatur, ipsa libero officia perferendis saepe.</p>
                            <a href="#" class="btn btn-secondary disabled">Brak miejsc</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "../static/scripts.html" ?>
</body>
</html>
