<?php
// Create database connection
$db = mysqli_connect("localhost", "root", "", "thewall_login");





//Check if variables are true or false.


$result = mysqli_query($db, "SELECT * FROM users") or die ('Error querying.');






while ($row = mysqli_fetch_array($result)) {
    $a[] = $row['user_uid'];
}





// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = "<a href='userprofile.php?profile=$name'> <li> $name</li></a>";

            } else {
                $hint .= "<a href='userprofile.php?profile=$name'> <li> $name</li></a>";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "<a style='color: red;text-decoration: underline'>no suggestion</a>" : $hint;
?>
