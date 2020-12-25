<?php
require_once("../model/task.php");
require_once("../model/project.php");
require_once("../model/dataAccess.php");



if (isset($_REQUEST["Description"])) {
    updateTaskDescription($_REQUEST["Description"], $_REQUEST["taskID"]);
    $_POST["Description"] = null;
}
if (isset($_REQUEST["statusID"])) {
    updateTaskStatus($_REQUEST["statusID"], $_REQUEST["taskID"]);
    $_POST["statusID"] = null;
}

$task = getTaskByID($_REQUEST["taskID"]);
$project = getprojectbyID($task->projectid);

require_once("../view/taskPage_view.php");
