<?php
include 'header.php';
?>
<div class="changeusername">
<form method="get" action="../includes/username.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Username:<input type="text" name="voornaam"  value="<?php echo $uid_value; ?>" </label>
        <br>

        <input type="submit" name="submit" value="Change">
</div>

</form>
</body>
</html>
