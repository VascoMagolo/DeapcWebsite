<?php
session_start();
include ("liga_db.php");
include ("getdata.php");

$id = $_GET['id']; 

$query = "DELETE FROM users 
WHERE ID = '$id';";

$res = my_query($query);

header('Location: ../pages/users.php');