<?php
session_start();
if (!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true) {
  header("location: loginRegistration.php");
  exit;
}
require_once("../model/task.php");
require_once("../model/project.php");
require_once("../model/team.php");
require_once("../model/role.php");
require_once("../model/dataAccess.php");


if (isset($_REQUEST["vision"])) {
  updateProjectVision($_REQUEST["vision"], $_REQUEST["projectID"]);
  $_POST["vision"] = null;
}
if (isset($_REQUEST["email"])) {
  addTeamMemberByEmail($_REQUEST["email"], $_REQUEST["projectID"], $_REQUEST["roleID"]);
  $_POST["email"] = null;
}
if (isset($_REQUEST["Title"])) {
  $title = $_REQUEST["Title"];
  $description = $_REQUEST["Description"];
  $projectID = $_REQUEST["projectID"];

  $task = new Task();
  $task->title = htmlentities($title);
  $task->description = htmlentities($description);
  $task->projectID = htmlentities($projectID);

  addTask($task);
}
$tasks = array();
if (isset($_REQUEST["taskName"]) && $_REQUEST["taskName"] != "") {
  $tasksByProjectID = getTasksByProjectID($_REQUEST["projectID"]);
  foreach ($tasksByProjectID as $task) {
    if (stripos($task->title, $_REQUEST["taskName"]) > -1) {
      array_push($tasks, $task);
    }
  }
} else {

  $tasks = getTasksByProjectID($_REQUEST["projectID"]);
}
$roles = getAllRoles();
$team = getTeamByProjectID($_REQUEST["projectID"]);
$project = getprojectbyID($_REQUEST["projectID"]);

require_once("../view/tasksList_view.php");
