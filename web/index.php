<!doctype html>
<html lang="pl">
<head>
    <?php require "static/head.html" ?>
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
                <a href="/" class="nav-link active">Strona główna</a>
            </li>
            <li class="nav-item">
                <a href="rezerwacje" class="nav-link">Rezerwacje</a>
            </li>
            <li class="nav-item">
                <a href="profil" class="nav-link">Profil</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Ośrodek wypoczynkowy</h1>
            <p>Projekt klasy 4J z Zespołu Szkół Ekonomicznych im. Mikołaja Kopernika w Olsztynie.</p>
            <?php
            require 'env/connect.php';
            $sql = $mysqli->prepare('SELECT content FROM articles WHERE id = 1');
            $sql->execute();
            $result = $sql->get_result();
            while ($row = $result->fetch_assoc())
                echo '<p>'.$row['content'].'</p>';
            $result->close();
            $mysqli->close();
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h2>Atrakcje turystyczne</h2>
        <table>
         <thead>
                    <tr>
                        <th>Nazwa</th>
                        <th>Opis</th>
                        <th>Dystans</th>
                       
                    </tr>
                </thead>
                <tbody> 
                    
        <?php
        
        
            
         require 'env/connect.php';
                    $dane = $mysqli->query('SELECT * FROM attractions');
                    $result = $dane->fetch_all();
                    foreach($result as $atrakcja){
                    ?>    
          <tr>
             
        <td><?= $atrakcja[1] ?></td>
        <td><?= $atrakcja[2] ?></td>
        <td><?= $atrakcja[3] ?></td>      
        </tr>
            
            
        <?php            
                    }
            
                   
        $mysqli->close();           
        ?>
        </tbody>            
       </table> 
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h2>Wydarzenia</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus blanditiis doloremque dolores, ea
                eligendi eos error exercitationem illo illum inventore laudantium minima molestiae nulla, obcaecati odio
                omnis porro tempora tenetur!</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="scripts/login.php" method="post">
                <label>
                    Login
                    <input class="form-control" type="text" name="login" required/>
                </label>
                <label>
                    Hasło
                    <input class="form-control" type="password" name="password" required/>
                </label>
                <input type="submit">
            </form>
        </div>
    </div>
</div>
<?php require "static/scripts.html" ?>
</body>
</html>
