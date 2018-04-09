<?php
// Create database connection
$db = mysqli_connect("localhost", "root", "", "thewall");

// Initialize message variable
$msg = "";

$result = mysqli_query($db, "SELECT * FROM images");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <style type="text/css">
        body{
            background: #ecc7c2;
        }
        #content{
            left: 0;
            background: #efefef;
            box-shadow: 0 0 10px gray;
            width: 100%;
            margin: 20px auto;
            border: 1px solid #cbcbcb;
        }
        textarea {
            box-shadow: 0 0 10px gray;
        }
        form{
            width: 50%;
            margin: 20px auto;
        }
        form div{
            margin-top: 5px;
        }
        img{
            float: left;
            /*border: 5px solid black;*/
            /*box-shadow: 0px 0px 10px gray;*/
            margin: 0;
            width: 300px;
            height: auto;
        }
        .masonry { /* Masonry container */
            left: 0;
            margin: 0;
            padding: 0;
            column-count: 3;
            column-gap: 0;
        }
    </style>
</head>
<body>
<div id="content">
    <div class="masonry">
        <?php
        $pictureinside = false;
        $rownum = 1;
        while ($row = mysqli_fetch_array($result)) {
//        echo "<div id='img_div'>";
//            echo "<img src='images/".$row['image']."' >";
//        echo "<p>".$row['image_text']."</p>";
//        echo "</div>";

        ?>
    </div>
    <div class="row">
        <div class="column" style="background-color:#aaa;">
<!--            Image row here-->
            <?php
            if ($rownum = 1 && $pictureinside = false) {
                echo "<img src='images/".$row['image']."' >";
                $rownum = 2;
                $pictureinside = true;}
             ?>

        </div>
        <div class="column" style="background-color:#aaa;">
<!--            Image row here-->
            <?php
            if ($rownum = 2 && $pictureinside = false) {
                echo "<img src='images/".$row['image']."' >";
                $rownum = 3;
                $pictureinside = true;}
            ?>

        </div>
        <div class="column" style="background-color:#aaa;">
<!--            Image row here-->
            <?php
            if ($rownum = 3 && $pictureinside = false) {
                echo "<img src='images/".$row['image']."' >";
                $rownum = 1;
                $pictureinside = true;}
            ?>

        </div>
        <?php
        }
        ?>

    </div>

   </div>
</body>
</html>