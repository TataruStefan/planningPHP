<?php
session_start();
if (!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true) {
    header("location: loginRegistration.php");
    exit;
}
require_once("../model/progress.php");
require_once("../model/dataAccess.php");
$projects = array();
if (isset($_REQUEST["projectID"])) {
    array_push($projects, getProjectProgressByID($_REQUEST["projectID"]));
} elseif (isset($_REQUEST["title"]) && $_REQUEST["title"] != "") {
    $progress = getProjectsProgress($_SESSION["userID"]);
    foreach ($progress as $project) {
        if (stripos($project->Title, $_REQUEST["title"]) > -1) {
            array_push($projects, $project);
        }
    }
} else {

    $projects = getProjectsProgress($_SESSION["userID"]);
}

require_once("../view/progress_view.php");
