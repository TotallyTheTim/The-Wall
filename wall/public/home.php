<?php
if(!isset($_COOKIE['u_uid'])){
    header('Location: index.php');
}
include 'header.php';
?>
</div>


<div class="h1">
    <h1>Welcome to the wall, <a id="username"><?php echo $_SESSION['u_first'];?></a></h1>
</div>

</body>
</html>
