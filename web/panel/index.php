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
                    echo '<td>'.$u.'</td>';
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
                <label for="editor"><h2>Informacje o ośrodku</h2></label>
                <?php
                require '../env/connect.php';
//                TODO stworzyć edytor
            $sql = $mysqli->prepare('SELECT content FROM articles WHERE id = 1');
            $sql->execute();
            $result = $sql->get_result();
            $row = $result->fetch_assoc();
            $result->close();
            $mysqli->close();
                ?>
                <textarea name="text" id="editor" cols="30" rows="10"><?=$row['content']?></textarea>
                <input type="submit" value="Zapisz">
            </form>
        </div>
    </div>
</div>
<?php require "../static/scripts.html" ?>
<script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>
