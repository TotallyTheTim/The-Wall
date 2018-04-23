<?php
$selected_user = $_GET['profile'];
//echo $selected_user;



session_start();
$username = $_SESSION['u_uid'];
$uid_value = $_SESSION['username'];
if (!$uid_value) {
    header("Location: index.php");
    exit;
}





// Create database connection
$db = mysqli_connect("localhost", "root", "", "thewall");

// Initialize message variable
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
    $by = mysqli_real_escape_string($db, $_POST['madeby']);
//    $by = $_POST['madeby'];

    // image file directory
    $target = "images/".basename($image);

    $sql = "INSERT INTO images (image, image_text,by_who) VALUES ('$image', '$image_text', '$by')";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}
$result = mysqli_query($db, "SELECT * FROM images");















?>

<!DOCTYPE html>
<html>
<head>
    <title>The Wall Upload</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <style>
        h1{
            transition: font-size 1s, opacity 0.3s;
            transition-delay: 0.02s;
            z-index: -9999;
        }
        #main_upload{
            z-index: 0;
            position: absolute;
            top:175px;
            left: 10%;
            width:80%;
            min-height:15em;
            margin: 0 auto;
            transition: 1.0s;
            transition-delay: 0.02s;
        }






        img{
            float: left;
            /*border: 5px solid black;*/
            /*box-shadow: 0px 0px 10px gray;*/
            margin: 0;
            width: 100%;
            height: auto;
            /*transition: 0.3s;*/
            /*outline: rgba(25, 25, 255, 0.0) solid 3px;*/
            /*outline-offset: -8px;*/
        }

        /*img:hover{*/
        /*outline: rgba(25, 25, 255, 1) solid 3px;*/
        /*outline-offset: -8px;*/
        /*transition: 0.1s;*/

        /*}*/
        .masonry { /* Masonry container */
            left: 0;
            margin: 0;
            padding: 0;
            column-count: 3;
            column-gap: 0;
        }
        #img_div p{
            display: none ;
        }
        #img_div {
            width: 100%;
            padding: 0px;
            margin: 0px auto;
            float: left;
            transition: 0.3s;
            overflow: hidden;

        }
        /*#img_div:hover {*/
        /*opacity: 0.8;*/
        /*transition: 0.1s;*/
        /*}*/
        #img_div:after{
            content: "";
            display: block;
            clear: both;
        }



        /* DE MODALE SHIT */

        /* Style the Image Used to Trigger the Modal */
        #myImg {
            border-radius:0px;
            cursor: pointer;
            transition: 0.3s;
        }



        /* The Modal (background) */
        .modal {
            grid-template-columns: 1fr 1fr;
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: scroll; /* Enable scroll if needed */
            background-color: rgb(38,37,37); /* Fallback color */
            background-color: rgba(38,37,37,0.9); /* Black w/ opacity */
        }

        /* Modal Content (Image) */
        .modal-content {
            max-height: 600px;
            grid-column: 1/3;
            align-self: center;
            justify-self: center;
            padding-top: -20px;
            margin: auto;
            display: block;
            width: auto;
            max-width: 700px;
            /*max-height: 1400px;*/
            background-color: rgba(230,221,188,0.7);
            border-radius: 5px;
            box-shadow: rgba(230,221,188,0.7) 0 0 100px;
        }

        /* Caption of Modal Image (Image Text) - Same Width as the Image */
        #caption {
            background-color: #E6DDBC;
            grid-column: 1/3;
            align-self: center;
            justify-self: center;
            margin: 10px;
            float: left;
            display: block;
            width: 80%;
            max-width: 300px;
            text-align: center;
            color: #822626;
            padding: 10px;
            height: 150px;
            position: absolute;
            top: 20px;
            box-shadow: rgba(230,221,188,0.3) 0 0 100px;
        }


        /* Add Animation - Zoom in the Modal */
        .modal-content{
            -webkit-animation-name: zoom;
            -moz-animation-name: zoom;
            -o-animation-name: zoom;
            animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            -moz-animation-duration: 0.6s;
            -o-animation-duration: 0.6s;
            animation-duration: 0.6s;

        }
        #caption{
            -webkit-animation-name: slidefromleft;
            -moz-animation-name: slidefromleft;
            -o-animation-name: slidefromleft;
            animation-name: slidefromleft;
            -webkit-animation-duration: 0.6s;
            -moz-animation-duration: 0.6s;
            -o-animation-duration: 0.6s;
            animation-duration: 0.6s;

        }

        #username{
            -webkit-animation-name: slidefromright;
            -moz-animation-name: slidefromright;
            -o-animation-name: slidefromright;
            animation-name: slidefromright;
            -webkit-animation-duration: 0.6s;
            -moz-animation-duration: 0.6s;
            -o-animation-duration: 0.6s;
            animation-duration: 0.6s;

        }

        @media screen and (max-width: 900px) {
            #main_upload{
                width: 95%;
                left: 2.5%;
                top: 126px;
            }
            h1{
                font-size: 32px;
            }
        }
        @media screen and (max-width: 600px) {
            #main_upload{
                width: 100%;
                left: 0;
                top: 51px;
            }
            h1{
                opacity: 0;
            }
            .masonry{
                column-count: 2;
            }

            .modal-content {
                width: 100%;
            }
            img {
                width: 100%;
                max-height: 80%;
            }
        }

        @keyframes zoom {
            0%   {opacity: 0.0; transform: scale(0) rotate(2deg);}
            20%  {opacity: 0.5;transform: scale(0.5) rotate(9deg);}
            80%  {opacity: 0.9; transform: scale(1.2) rotate(3deg);}
            100% {opacity: 1.0;transform: scale(1) rotate(0deg);}
        }

        @keyframes slidefromleft {
            0%   {opacity: 0.0; transform: translate(-400px) rotate(-60deg);}
            20%  {opacity: 0.5;transform: translate(-400px)rotate(-20deg);}
            80%  {opacity: 0.9;transform:rotate(15deg);}
            100% {opacity: 1.0; transform: translate(0px) rotate(0deg);}
        }

        @keyframes slidefromright {
            0%   {opacity: 0.0; transform: translate(300px) rotate(60deg);}
            20%  {opacity: 0.5;transform: translate(3000px)rotate(20deg);}
            80%  {opacity: 0.9;transform:rotate(-15deg);}
            100% {opacity: 1.0; transform: translate(0px) rotate(0deg);}
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            transition-delay: 0.3s ;
        }

        modal-content img{
            float: initial;
        }
        #by{
            color: #690202;
            text-decoration: underline;
            cursor: pointer;
        }


        .close:hover,
        .close:focus {
            transform: rotate(90deg) scale(2,2) translateX(2px) translateY(-2px);
            color: #bb000b;
            text-decoration: none;
            cursor: pointer;

        }



    </style>
</head>
<body>

<div class="topnav" id="myTopnav">

    <a href="home.php" >Home</a>
    <a href="test.php">Friends</a>
    <a href="upload.php">Upload</a>
    <a href="../includes/logout.inc.php">Logout</a>
    <a href="profile.php" class="fag" style="color:white;float: right;"><?php echo $username;?></a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    <script src="script.js" charset="utf-8"></script>
</div>

</div>


<div class="h1">
    <h1>Uploaded pictures by:<a class="username"><?php echo $selected_user;?></a></h1>
</div>


<div id="main_upload">
    <div class="masonry">
        <?php

        while ($row = mysqli_fetch_array($result)) {
            if ($row['by_who']==$selected_user){

            echo "<div id='img_div'>";
            echo "<img id='myImg' alt='". "<h3>" .$row['by_who'] . "</h3> Title: <h3> ".$row['image_text']. "</h3>" ."' onclick='myFunc(this)' src='images/".$row['image']."' >";
            echo "<p>".$row['image_text']."</p>";
            echo "</div>";

            echo '<div id="myModal" class="modal">
                <span class="close"  onclick="modal.style.display = \'none\'" >&times;</span>
                <img class="modal-content" id="img" style="margin-bottom: 0;margin-top: 0px" images/'.$row['image'].'">
                <div id="caption">Error getting information.</div>
                </div>';
            echo '
        <script>
            var modal = document.getElementById("myModal");

            var modalImg = document.getElementById("img");
            var captionText = document.getElementById("caption");
            
            function myFunc(el) {
              var imgSrc = el.src;
              var altText = el.alt;
              modal.style.display = "grid";
                modalImg.src = imgSrc;
                captionText.innerHTML = "Door:" + altText;
            }
            
             modal.onclick = function() { 
                modal.style.display = "none";
             }
             
        
        </script>
        ';

        }}
        ?>

    </div>








</div>

</body>
</html>
