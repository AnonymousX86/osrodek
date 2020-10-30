<?php
if (!isset($_GET['user_id'])) exit('No user ID specified');
$user_id = $_GET['user_id'];

require "../env/connect.php";

$reservations = array();
$sql = $mysqli->prepare('select a.name as apartment, date_from, date_to from apt_bookings inner join apartments a on apt_bookings.apt_id = a.id where user_id = ?');
$sql->bind_param('i', $user_id);
$sql->execute();
$result = $sql->get_result();
while ($row = $result->fetch_assoc())
    $reservations[] = $row;
$result->close();
$mysqli->close();
$reservations = json_encode($reservations);
echo $reservations;
