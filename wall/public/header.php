<?php

session_start();
$username = $_SESSION['u_uid'];
$uid_value = $_SESSION['username'];
if (!$uid_value) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>The Wall</title>
    <link rel="icon" href="../logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="topnav" id="myTopnav">

    <a href="home.php" >Home</a>
    <a href="friends.php">Friends</a>
    <a href="upload.php">Upload</a>
    <a href="../includes/logout.inc.php">Logout</a>
    <a href="profile.php" class="fag" style="color:white;float: right;"><?php echo $username;?></a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    <script src="script.js" charset="utf-8"></script>
    </div>

