<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../');
    exit();
}
require_once ("../env/connect.php");

if(!isset($_POST['akcja']))
{
header('Location: ../');
exit();    
}

$nazwa=$_POST['edytujNazwa'];
$opis=$_POST['edytujOpis'];
$dystans=$_POST['edytujDystans']; 


//dodawanie
if($_POST['akcja']=='add')
{
$sql = $mysqli->prepare('INSERT INTO attractions Values (NULL,?,?,?)');
$sql->bind_param('ssi', $nazwa,$opis,$dystans);
    $sql->execute();
    $mysqli->close();
    header('Location: ../panel/');
}
    

//aktualizacja
if($_POST['akcja']=='edit')
{
$id=$_POST['id'];    
$sql = $mysqli->prepare("UPDATE attractions SET name=?, description=?, distance=? WHERE id=$id ");
$sql->bind_param('ssi', $nazwa,$opis,$dystans);
    $sql->execute();
    $mysqli->close();
header('Location: ../panel/');    
}

?>