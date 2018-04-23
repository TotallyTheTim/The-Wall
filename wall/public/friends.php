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
    <script>
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "../includes/ajax.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
    <title>The Wall Friends!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <style>
        #main_upload{
            position: fixed;
            top:75px;
            left: 10%;
            width:80%;
            min-height:10em;
            height: 100%;
            margin: 0 auto;
            transition: 1.0s;
            z-index: -2;
            transition-delay: 0.02s;
        }
        @media screen and (max-width: 900px) {
            #main_upload{
                width: 95%;
                left: 2.5%;
                top: 66px;
            }
        }
        @media screen and (max-width: 600px) {
            #main_upload{
                width: 100%;
                left: 0;
                top: 51px;

            }
        }








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
            grid-column: 1/3;
            align-self: center;
            justify-self: center;
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            max-height: 1400px;
            box-shadow: rgba(230,221,188,0.9) 0 0 100px;
        }

        /* Caption of Modal Image (Image Text) - Same Width as the Image */
        #caption {
            background-color: #E6DDBC;
            /*grid-column: 1/1;*/
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
            box-shadow: rgba(230,221,188,0.3) 0 0 100px;
        }
        #username {
            background-color: #E6DDBC;
            /*grid-column: 1/1;*/
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

        a{
            text-decoration: none;
            color: black;
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
            transform: rotate(90deg) scale(2,2);
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
        }

        ul li{
            position: relative;
            left: -30px;
            margin: 0;
            padding: 10px;
            width: 100%;
            background-color: #b6ad93;
        }
        ul li:hover{
            background-color: #E6DDBC;
            box-shadow:inset 0px 0px 10px 5px #b6ad93;

        }


    </style>
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


<div id="main_upload" style="display: grid;grid-template-columns: 1fr">

    <div style="min-width: 200px; margin: 0 auto">

        <form action="userprofile.php" method="get">
            Zoek hier uw vrienden: <input type="text" onkeydown="showHint(this.value)" onkeyup="showHint(this.value)">
        <p><ul style="list-style-type: none;"><span id="txtHint"></span></ul></p>

            </div>

<!---->
<!--    <input type="text" name="profile">-->
<!--    <input type="submit">-->
    </form>

    </div>










</div>

</body>
</html>