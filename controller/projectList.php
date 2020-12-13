<?php
require_once("../model/project.php");
require_once("../model/dataAccess.php");

//session_start();

// if (!isset($_SESSION["myinvites"]))
// {
//   $_SESSION["myinvites"] = [];
// }

// if (isset($_REQUEST["inviteId"]))
// {
//   $inviteId = $_REQUEST["inviteId"];
//   $friend = getFriendById($inviteId);  
//   $_SESSION["myinvites"][] = $friend;
// }
if(isset($_REQUEST["Title"]))
  {
    $title = $_REQUEST["Title"];
    $vision = $_REQUEST["Vision"];

    $project = new Project();
    $project->title = htmlentities($title);
    $project->vision = htmlentities($vision);

    addProject($project);
  }

$results = getAllProjects();
//$numberOfInvites = sizeof($_SESSION["myinvites"]);

require_once("../view/projectList_view.php");
?>