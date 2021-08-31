<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=weblog", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
if (isset($_COOKIE['email'])) {
    $result = $conn->prepare('SELECT*FROM user WHERE email=? AND password=?');
    $result->bindValue(1, $_COOKIE['email']);
    $result->bindValue(2, $_COOKIE['password']);
    $result->execute();
    if ($result->rowCount() >= 1) {
        $rows = $result->fetch(PDO::FETCH_ASSOC);
        $_SESSION['login'] = true;
        $_SESSION['email'] = $_COOKIE['email'];
        $_SESSION['password'] = $_COOKIE['password'];
        $_SESSION['role'] = $rows['role'];
    }
}
