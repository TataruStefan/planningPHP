<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_user = "k1809106";
$db_name = "dbrk1809106";
$db_password = "yak";

$pdo = new PDO("mysql:host=kunet;dbname=$db_name", $db_user, $db_password);

function getAllProjects()
{
    global $pdo;
    $statement = $pdo->query("  SELECT projectid, title, vision 
                                FROM Project");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Project');
}
function addProject($project)
{
    global $pdo;
    $pdo->prepare(" INSERT INTO Project (Title,Vision) 
                    VALUES (?,?)")
        ->execute([$project->title,$project->vision]);
}
 
function getTasksByProjectID($projectID)
{
    global $pdo;
    $statement = $pdo->prepare('SELECT taskid, title, name as status 
                                FROM Tasks 
                                INNER JOIN Status 
                                ON Tasks.statusID = Status.statusId 
                                WHERE projectid= ?');
    $statement->execute([$projectID]);
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Task');
}
function getprojectbyID($projectID)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT projectid, title, vision 
                                FROM Project 
                                WHERE projectid= ?");
    $statement->execute([$projectID]);
    return $statement->fetchObject('Project');
}
function addTask($task)
{
    global $pdo;
    $pdo->prepare(" INSERT INTO Tasks (projectID,title, description, statusid, assigneeid) 
                    VALUES (?,?,?,3,1)")
        ->execute([$task->projectid,$task->title, $task->description]);
}
function getTaskByID($taskid){
    global $pdo;
    $statement = $pdo->prepare('SELECT taskid,projectid, description, title, name as status
                                FROM Tasks
                                INNER JOIN Status 
                                ON Tasks.statusID = Status.statusId 
                                Where taskid= ?');
     $statement->execute([$taskid]);
     return $statement->fetchObject('Task');
}

function updateTaskDescription($description, $taskid)
{
    global $pdo;
    $statement = $pdo->prepare('UPDATE Tasks
                                SET description=?
                                WHERE taskID=?'); 
     $statement->execute([$description,$taskid]);
}
function updateTaskStatus($status, $taskid)
{
    global $pdo;
    $statement = $pdo->prepare('UPDATE Tasks
                                SET statusid=?
                                WHERE taskID=?'); 
     $statement->execute([$status,$taskid]);
}