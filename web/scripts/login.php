<?php
if (!isset($_POST['login']) | !isset($_POST['password']))
    header('Location: ../');
else {
    var_dump($_POST);
    echo '<br/>';
    session_start();
    $_SESSION['wrong_password'] = FALSE;
    $login = $_POST['login'];
    require '../env/connect.php';
    $sql = $mysqli->prepare('SELECT * FROM users WHERE login = ?');
    $sql->bind_param('s', $login);
    $sql->execute();
    var_dump($sql);
    echo '<br/>';
    $result = $sql->get_result();
    var_dump($result);
    echo '<br/>';
    while ($row = $result->fetch_assoc()) {
        var_dump($row);
        echo '<br/>';
        if ($row['password'] != $_POST['password']) {
            echo 'błędne';
            $_SESSION['wrong_password'] = TRUE;
            header('Location: ../');
        } else {
            echo 'poprawne';
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_login'] = $row['login'];
            $_SESSION['user_role'] = $row['role'];
            header('location: ../panel/');
        }
    }
    $result->close();
    $mysqli->close();
}
