<?php
require_once("../model/friend.php");
require_once("../model/dataAccess.php");
if (isset($_REQUEST["email"])) {
    addFriend($_REQUEST["email"], 1);
    $_POST["email"] = null;
}

$team = getFriendsbyID(1);

require_once("../view/friends_view.php");
