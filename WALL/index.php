<?php
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

    // image file directory
    $target = "images/".basename($image);

    $sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
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
    <title>Image Upload</title>
    <style type="text/css">
        body{
            background: #c6e6ec;
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
            width: 100%;
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
    while ($row = mysqli_fetch_array($result)) {
//        echo "<div id='img_div'>";
        echo "<img src='images/".$row['image']."' >";
//        echo "<p>".$row['image_text']."</p>";
//        echo "</div>";
    }
    ?>
    </div>

    <form method="POST" action="index.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="file" name="image">
        </div>
        <div>
      <textarea
          id="text"
          cols="40"
          rows="4"
          name="image_text"
          placeholder="Say something about this image..."></textarea>
        </div>
        <div>
            <button type="submit" name="upload">POST</button>
        </div>
    </form>
</div>
</body>
</html>