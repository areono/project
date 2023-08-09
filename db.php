<?php
// db.php    session_start();
session_start();

$servername = "localhost";
$username = "shjeon";
$password = "Shjeon1374!";
$dbname = "member_information";

$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    die("데이터베이스 오류: " . $conn->connect_error);
}

function mc($query) {
    global $conn;
    $result = $conn->query($query);
    return $result;
}
?>