<?php
require_once("../model/project.php");
require_once("../model/task.php");
require_once("../model/dataAccess.php");


// if (isset($_REQUEST["Title"])) {
//   $title = $_REQUEST["Title"];
//   $vision = $_REQUEST["Vision"];

//   $project = new Project();
//   $project->title = htmlentities($title);
//   $project->vision = htmlentities($vision);

//   addProject($project);
// }

// $projects = array();
// if (isset($_REQUEST["title"]) && $_REQUEST["title"] != "") {
//   $projectsTemp = getAllProjects();
//   foreach ($projectsTemp as $project) {
//     if (stripos($project->title, $_REQUEST["title"])>-1) {
//       array_push($projects, $project);
//     }
//   }
// } else {

//   $projects = getAllProjects();
// }
$projects = getAllProjects();
foreach($projects as $project){
    $project->tasks=getTasksByProjectID($project->projectid);
}

require_once("../view/myTasks_view.php");
