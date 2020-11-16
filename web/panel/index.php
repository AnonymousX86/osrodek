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
    <link rel="stylesheet" href="../css/panelModal.css">
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
                <table>
                    <tr>
                        <th>Użytkownik</th>
                        <th>Operacje</th>
                    </tr>
                    <?php
                    require '../env/connect.php';
                    $sql = $mysqli->prepare('SELECT login FROM users WHERE `role` NOT LIKE \'a\' ORDER BY `role`');
                    $sql->execute();
                    $result = $sql->get_result();
                    $users = [];
                    while ($row = $result->fetch_assoc())
                        $users[] = $row['login'];

                    foreach ($users as $u) {
                        echo '<tr>';
                        echo '<td>' . $u . '</td>';
                        echo '<td><a href="#">Zarządzaj</a></td>';
                        echo '<tr/>';
                    }
                    ?>
                </table>
            </div>
        </div>
    <?php } ?>
    <hr/>
    <div class="row">
        <div class="col">
            <form action="../scripts/update_info.php" method="post">
                <label class="h2" for="editor">Informacje o ośrodku</label>
                <?php
                require '../env/connect.php';
                $sql = $mysqli->prepare('SELECT content FROM articles WHERE id = 1');
                $sql->execute();
                $result = $sql->get_result();
                $row = $result->fetch_assoc();
                $result->close();
                $mysqli->close();
                ?>
                <textarea name="text" id="editor" cols="30" rows="10"><?= $row['content'] ?></textarea>
                <input type="submit" value="Zapisz"/>
            </form>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col">
            <h2>Atrakcje</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nazwa</th>
                        <th>Opis</th>
                        <th>Dystans</th>
                        <th><button class="btn btn-success" onclick="dodaj()">Dodaj</button></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require '../env/connect.php';
                    $dane = $mysqli->query('SELECT * FROM attractions');
                    $result = $dane->fetch_all();
                    foreach($result as $atrakcja){
                        ?>
                    <tr>
                        <td id="nazwa<?= $atrakcja[0]  ?>"><?= $atrakcja[1] ?></td>
                        <td id="opis<?= $atrakcja[0]  ?>" aria-label="<?= htmlentities($atrakcja[2]) ?>"><?= htmlentities(substr($atrakcja[2], 0, 40)) ?>
                            <?php
                                if(strlen($atrakcja[2])>40) echo "...";
                            ?></td>
                        <td id="dystans<?= $atrakcja[0]  ?>"><?= $atrakcja[3] ?></td>
                        <td>
                            <button class="btn btn-danger" onclick="">Usuń</button>
                            <button class="btn btn-primary" onclick="edycja(<?= $atrakcja[0] ?>)">Edytuj</button>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="formAtr">
    <div class="modal-content">
        <span id="formClose">&times;</span>
        <form action="../scripts/atrAddEdit.php" method="post">
            <label class="h5">Nazwa atrakcji</label><br>
            <input type="text" name="edytujNazwa" id="edytujNazwa" value=""><br>
            <label class="h5">Opis atrakcji</label><br>
            <textarea type="text" name="edytujOpis" id="edytujOpis" cols="30" rows="10"></textarea><br>
            <label class="h5">Dystans atrakcji</label><br>
            <input type="number" name="edytujDystans" id="edytujDystans" value=""><br>
            <input type="text" name="akcja" id="edytujAkcja" hidden value="">
            <button type="submit" class="btn btn-success">Dodaj</button>
        </form>
    </div>
</div>
<script>
    let formAtr,
        edytujNazwa = document.getElementById("edytujNazwa"),
        edytujOpis = document.getElementById("edytujOpis"),
        edytujDystans = document.getElementById("edytujDystans"),
    edytujAkcja = document.getElementById("edytujAkcja");
    function dodaj(){
        formAtr = document.getElementById("formAtr");
        formAtr.style.display = "block";
        edytujAkcja.value = "add";
    }
    function edycja(x){
        formAtr = document.getElementById("formAtr");
        formAtr.style.display = "block";
        edytujNazwa.value = document.getElementById("nazwa"+x).innerHTML;
        edytujOpis.innerHTML = document.getElementById("opis"+x).getAttribute("aria-label");
        edytujDystans.value = document.getElementById("dystans"+x).innerHTML;
        edytujAkcja.value = "edit";
    }
    let closeButton = document.getElementById("formClose");
    closeButton.addEventListener("click", function (){
        formAtr.style.display = "none";
    });
</script>
<?php require "../static/scripts.html" ?>
<script src="../src/ckeditor/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#editor')).catch(error => {
        console.error(error);
    });
</script>
</body>
