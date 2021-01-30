<?php
session_start();

if (!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true) {
    header("location: loginRegistration.php");
    exit;
}
require_once("../model/project.php");
require_once("../model/dataAccess.php");


if (isset($_REQUEST["Title"])) {
  $title = $_REQUEST["Title"];
  $vision = $_REQUEST["Vision"];

  $project = new Project();
  $project->title = htmlentities($title);
  $project->vision = htmlentities($vision);

  addProject($project,$_SESSION["userID"]);
}

$projects = array();
if (isset($_REQUEST["title"]) && $_REQUEST["title"] != "") {
  $projectsTemp = getAllProjects($_SESSION["userID"]);
  foreach ($projectsTemp as $project) {
    if (stripos($project->title, $_REQUEST["title"])>-1) {
      array_push($projects, $project);
    }
  }
} else {

  $projects = getAllProjects((int)$_SESSION["userID"]);
}

require_once("../view/projectList_view.php");
