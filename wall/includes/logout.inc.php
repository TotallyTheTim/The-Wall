<?php
session_start();
session_unset();
session_destroy();
ob_start();
header("location:../public/index.php");
ob_end_flush();
include '../public/index.php';
//include 'home.php';