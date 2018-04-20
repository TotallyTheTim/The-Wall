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
  <a href="#about">About</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<div class="signup-wrapper">
  <div class="container">

        <h2>Signup</h2>
        <form action="../includes/signup.inc.php" method="post">
          <input type="text" name= "first" placeholder="Firstname">
          <input type="text" name= "last" placeholder="Lastname">
          <input type="email" name= "email" placeholder="E-mail">
          <input type="text" name= "uid" placeholder="Username">
          <input type="password" name= "pwd" placeholder="password">
          <button type="submit" name="submit">Sign up</button>
        </form>

  </div>

  </div>





<script src="script.js" charset="utf-8"></script>
</body>
</html>
