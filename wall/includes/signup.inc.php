<?php
// if statement voor klikken op submit
if (isset($_POST['submit'])){
//connection php conecten met het signup php

  include_once 'dhb.inc.php';
    // Check connection

    $first = $_POST['first'];
    $last =  $_POST['last'];
    $email = $_POST['email'];
    $uid =  $_POST['uid'];
    $pwd =  $_POST['pwd'];





  // (error handlers)
  // leeg gelaten vakken
  if (empty($first) || empty($last) || empty($email) || empty($uid) || empty(
    $pwd)){
    // header("Location: ../signup.php?signup=empty");
    echo "you left something empty";
    exit();
  } else{
    //Check of input characters valide zijn
    if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/",
    $last)) {
      // header("Location: ../signup.php?signup=invalid");
      echo "login invalid";
      exit();
    }else{
      //check of email valide is
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        // header("Location: ../signup.php?signup=email");
        echo "email is incorrect";
        exit();
      }else{
        $sql = "SELECT * FROM users WHERE user_uid='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){
          // header("Location: ../signup.php?signup=usertaken");
          echo "User is already taken";
          exit();
        }else{
          //Hashing wachtwoord
          $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
          //GEBRUIKER TOEVOEGEN IN DE DATABASE
          $sql = "INSERT INTO users VALUES (0,'$first', '$last', '$email',
             '$uid', '$hashedPwd');";
          $result = mysqli_query($conn, $sql);
          header("Location: ../public/index.php?signup=succes");
          exit();
        }
      }
    }
  }

} else{
  header("Location: ../public/signup.php");
  exit();
}
