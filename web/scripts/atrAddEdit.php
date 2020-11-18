<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../');
    exit();
}
require_once ("../env/connect.php");

if(!isset($_POST['akcja'])) {
    header('Location: ../');
    exit();
}

$nazwa = $_POST['edytujNazwa'];
$opis = $_POST['edytujOpis'];
$dystans = $_POST['edytujDystans'];


// Dodawanie
if($_POST['akcja']=='add')
{
$sql = $mysqli->prepare('INSERT INTO attractions VALUES (NULL, ?, ?, ?)');
$sql->bind_param('ssi', $nazwa, $opis, $dystans);
    $sql->execute();
    $mysqli->close();
    header('Location: ../panel/');
}
    

// Aktualizacja
if($_POST['akcja']=='edit') {
    $id = $_POST['id'];
    $sql = $mysqli->prepare("UPDATE attractions SET name = ?, description = ?, distance = ? WHERE id = ?");
    /** @noinspection SpellCheckingInspection */
    $sql->bind_param('ssii', $nazwa, $opis, $dystans, $id);
    $sql->execute();
    $mysqli->close();
    header('Location: ../panel/');
}
