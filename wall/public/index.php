<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="topnav" id="myTopnav">

  <a href="index.php" >Home</a>
  <a href="signup.php">Signup</a>
  <a href="#contact">Contact</a>
  <a href="about.php">About</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<form action="../includes/login.inc.php" method="post">
  <div class="imgcontainer">
    <img src="logo.png" alt="Logo" class="avatar" >
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uid" required autofocus>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required>
    <button type="submit" name="submit">Login</button>
    <span>Not a <a href="signup.php">member?</a></span>

  </div>
</form>





<script src="script.js" charset="utf-8"></script>
</body>
</html>
