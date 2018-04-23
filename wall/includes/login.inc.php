<?php
session_start();


if(isset($_POST['submit'])) {
    include 'dhb.inc.php';

    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];


    $_SESSION['username'] = $uid;




    //Error handlers

    //check of de inputs leeg zijn

    if (empty($uid) || empty($pwd)) {
//        header("Location: ../index.php?login=empty");
        echo 'error empty';
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        print_r($resultCheck);
        if($resultCheck < 1){

            echo 'you are not registed';
            exit();
        }else{
            if($row = mysqli_fetch_assoc($result)){
                //dehashing wachtwoord
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if($hashedPwdCheck == false){
                    echo 'Invalid';
//                    header("Location: ../index.php?login=invalid");
                    exit();
                }elseif ($hashedPwdCheck == true){
                    //User gaat naar website
                    $_SESSION['u_id'] = $row ['id'];
                    $_SESSION['u_first'] = $row ['user_first'];
                    $_SESSION['u_last'] = $row ['user_last'];
                    $_SESSION['u_email'] = $row ['user_email'];
                    $_SESSION['u_uid'] = $row ['user_uid'];
                    header("Location: ../public/home.php");

                    exit();
                }
            }
        }
    }
}
    else{
        header("Location: ../public/index.php?login=error");
        exit();
    }

