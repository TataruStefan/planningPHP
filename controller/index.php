<?php 
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: projectList.php");
    exit;
}else{
header("location: loginRegistration.php");}
