<?php 
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../controller/projectList.php");
    exit;
}else{
header("location: ../controller/loginRegistration.php");}
