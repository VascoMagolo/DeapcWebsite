<?php
session_start();
include ("liga_db.php");
include ("getdata.php");

$id = $_GET['id']; 
$t = $_GET['t'];
$query = "DELETE FROM '$t' 
WHERE ID = '$id';";

$res = my_query($query);

header('Location: ../pages/users.php');