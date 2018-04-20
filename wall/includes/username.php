<?php
include 'dhb.inc.php';
session_start();
$uid =  $_SESSION['user_uid'];


$query = "UPDATE users SET uid = 'user_uid' WHERE id = 'id'";



$result = mysqli_query($conn,$query) or die ('Error Updating');
echo 'Your username is' ;

header("Location: ../public/profile.php");
