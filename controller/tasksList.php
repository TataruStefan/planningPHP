<?php
require_once("../model/task.php");
require_once("../model/project.php");
require_once("../model/dataAccess.php");



if (isset($_REQUEST["Title"])) {
  $title = $_REQUEST["Title"];
  $description = $_REQUEST["Description"];
  $projectid = $_REQUEST["projectID"];

  $task = new Task();
  $task->title = htmlentities($title);
  $task->description = htmlentities($description);
  $task->projectid = htmlentities($projectid);

  addTask($task);
}
$tasks = array();
if (isset($_REQUEST["taskName"]) && $_REQUEST["taskName"] != "") {
  $tasksByProjectID = getTasksByProjectID($_REQUEST["projectID"]);
  foreach ($tasksByProjectID as $task) {
    if (stripos($task->title, $_REQUEST["taskName"])>-1) {
      array_push($tasks, $task);
    }
  }
} else {

  $tasks = getTasksByProjectID($_REQUEST["projectID"]);
}

$project = getprojectbyID($_REQUEST["projectID"]);

require_once("../view/tasksList_view.php");
