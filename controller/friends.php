<?php
session_start();
if (!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true) {
    header("location: loginRegistration.php");
    exit;
}
require_once("../model/friend.php");
require_once("../model/dataAccess.php");
if (isset($_REQUEST["email"])) {
    addFriend($_REQUEST["email"], $_SESSION["userID"]);
    $_POST["email"] = null;
}

$team = getFriendsbyID($_SESSION["userID"]);

require_once("../view/friends_view.php");
