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
    $statement = $pdo->query("SELECT projectid, title, vision FROM Project");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Project');
}
function addProject($project)
{
    global $pdo;
    $pdo->prepare("INSERT INTO Project (Title,Vision) VALUES (?,?)")
        ->execute([$project->title,$project->vision]);
}