<?php
session_start();
if (!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true) {
    header("location: loginRegistration.php");
    exit;
}
require_once("../model/task.php");
require_once("../model/team.php");
require_once("../model/project.php");
require_once("../model/comment.php");
require_once("../model/dataAccess.php");



if (isset($_REQUEST["Description"])) {
    updateTaskDescription(trim($_REQUEST["Description"]), $_REQUEST["taskID"]);
    $_POST["Description"] = null;
}
if (isset($_REQUEST["statusID"])) {
    updateTaskStatus($_REQUEST["statusID"], $_REQUEST["taskID"]);
    $_POST["statusID"] = null;
}
if (isset($_REQUEST["userID"])) {
    updateTaskAssignee($_REQUEST["userID"], $_REQUEST["taskID"]);
    $_POST["userID"] = null;
}
if (isset($_REQUEST["commentText"]) && $_REQUEST["commentText"] != "") {
    addComment($_REQUEST["taskID"], $_SESSION["userID"], trim($_REQUEST["commentText"]));
    $_POST["commentText"] = null;
}
$task = getTaskByID($_REQUEST["taskID"]);
$project = getprojectbyID($task->projectID);
$team = getTeamByProjectID($task->projectID);
$comments = getCommentsByTaskID($_REQUEST["taskID"]);
$member = getUserByID($task->assigneeID);


require_once("../view/taskPage_view.php");
