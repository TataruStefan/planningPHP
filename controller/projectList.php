<?php
require_once("../model/project.php");
require_once("../model/dataAccess.php");


if(isset($_REQUEST["Title"]))
  {
    $title = $_REQUEST["Title"];
    $vision = $_REQUEST["Vision"];

    $project = new Project();
    $project->title = htmlentities($title);
    $project->vision = htmlentities($vision);

    addProject($project);
  }

$projects = getAllProjects();

require_once("../view/projectList_view.php");
?>