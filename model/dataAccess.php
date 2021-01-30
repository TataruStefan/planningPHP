<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_user = "k1809106";
$db_name = "dbrk1809106";
$db_password = "yak";

$pdo = new PDO("mysql:host=kunet;dbname=$db_name", $db_user, $db_password);

function getAllProjects($userID)
{
    global $pdo;
    $statement = $pdo->prepare('SELECT Project.projectID, title, vision 
                              FROM Project
                              INNER JOIN Team
                              ON Team.projectID= Project.projectID
                              WHERE Team.userID= ?');
    $statement->execute([$userID]);
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Project');
}
function addProject($project, $userID)
{
    global $pdo;
    $pdo->prepare(" INSERT INTO Project (Title,Vision) 
                    VALUES (?,?)")
        ->execute([$project->title, $project->vision]);
    addTeam($pdo->lastInsertId(), $userID);
}
function addTeam($projectID, $userID)
{
    global $pdo;
    $pdo->prepare(" INSERT INTO Team (projectID,userID,roleID) 
                    VALUES (?,?,2)")
        ->execute([$projectID, $userID]);
}

function getTasksByProjectID($projectID)
{
    global $pdo;
    $statement = $pdo->prepare('SELECT taskID, title, name as status 
                                FROM Tasks 
                                INNER JOIN Status 
                                ON Tasks.statusID = Status.statusId 
                                WHERE projectID= ?');
    $statement->execute([$projectID]);
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Task');
}
function getTasksByProjectIDAndUserID($projectID,$userID)
{
    global $pdo;
    $statement = $pdo->prepare('SELECT taskID, title, name as status 
                                FROM Tasks 
                                INNER JOIN Status 
                                ON Tasks.statusID = Status.statusId 
                                WHERE projectID= ? and assigneeID=?');
    $statement->execute([$projectID, $userID]);
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Task');
}
function getprojectbyID($projectID)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT projectID, title, vision 
                                FROM Project 
                                WHERE projectID= ?");
    $statement->execute([$projectID]);
    return $statement->fetchObject('Project');
}
function addTask($task)
{
    global $pdo;
    $pdo->prepare(" INSERT INTO Tasks (projectID,title, description, statusID, assigneeID) 
                    VALUES (?,?,?,3,1)")
        ->execute([$task->projectID, $task->title, $task->description]);
}
function getTaskByID($taskID)
{
    global $pdo;
    $statement = $pdo->prepare('SELECT taskID,projectID, description, title, name as status, assigneeID
                                FROM Tasks
                                INNER JOIN Status 
                                ON Tasks.statusID = Status.statusId 
                                Where taskID= ?');
    $statement->execute([$taskID]);
    return $statement->fetchObject('Task');
}

function updateTaskDescription($description, $taskID)
{
    global $pdo;
    $statement = $pdo->prepare('UPDATE Tasks
                                SET description=?
                                WHERE taskID=?');
    $statement->execute([$description, $taskID]);
}
function updateTaskStatus($status, $taskID)
{
    global $pdo;
    $statement = $pdo->prepare('UPDATE Tasks
                                SET statusID=?
                                WHERE taskID=?');
    $statement->execute([$status, $taskID]);
}
function updateTaskAssignee($assigneeID, $taskID)
{
    global $pdo;
    $statement = $pdo->prepare('UPDATE Tasks
                                SET assigneeID=?
                                WHERE taskID=?');
    $statement->execute([$assigneeID, $taskID]);
}
function getProjectsProgress($userID)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT Tasks.projectID, Project.Title, COALESCE(toDo, 0) toDo, COALESCE(done, 0) done, COALESCE(inProgress, 0) inProgress
                                FROM Tasks
                                INNER JOIN Project on Tasks.projectID = Project.ProjectID
                                INNER JOIN Team on Team.projectID=Project.projectID
                                LEFT JOIN ( SELECT Tasks.projectID, count(name) done
                                            FROM Tasks
                                            INNER JOIN Status ON Tasks.statusID = Status.statusId
                                            INNER JOIN Project on Tasks.projectID = Project.ProjectID
                                            where name = 'done'
                                            group by Tasks.projectID, name
                                            ) DONE ON Tasks.projectID = DONE.projectID
                                LEFT JOIN ( SELECT Tasks.projectID, count(name) toDo
                                            FROM Tasks
                                            INNER JOIN Status ON Tasks.statusID = Status.statusId
                                            INNER JOIN Project on Tasks.projectID = Project.ProjectID
                                            where name = 'to do'
                                            group by Tasks.projectID, name
                                            ) TODO ON Tasks.projectID = TODO.projectID
                                LEFT JOIN ( SELECT Tasks.projectID, count(name) inProgress
                                            FROM Tasks
                                            INNER JOIN Status ON Tasks.statusID = Status.statusId
                                            INNER JOIN Project on Tasks.projectID = Project.ProjectID
                                            where name = 'in progress'
                                            group by Tasks.projectID, name
                                            ) INPROGRESS ON Tasks.projectID = INPROGRESS.projectID
                                WHERE Team.userID=?
                                group by projectID");
    $statement->execute([$userID]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Progress');
    foreach ($results as $project) {
        $sum = $project->toDo + $project->done + $project->inProgress;
        $project->toDo = round($project->toDo * 100 / $sum);
        $project->done = round($project->done * 100 / $sum);
        $project->inProgress = round($project->inProgress * 100 / $sum);
    }
    return $results;
}
function getProjectProgressByID($projectID)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT Tasks.projectID, Project.Title, COALESCE(toDo, 0) toDo, COALESCE(done, 0) done, COALESCE(inProgress, 0) inProgress
                                FROM Tasks
                                INNER JOIN Project on Tasks.projectID = Project.ProjectID
                                LEFT JOIN ( SELECT Tasks.projectID, count(name) done
                                            FROM Tasks
                                            INNER JOIN Status ON Tasks.statusID = Status.statusId
                                            INNER JOIN Project on Tasks.projectID = Project.ProjectID
                                            where name = 'done'
                                            group by Tasks.projectID, name
                                            ) DONE ON Tasks.projectID = DONE.projectID
                                LEFT JOIN ( SELECT Tasks.projectID, count(name) toDo
                                            FROM Tasks
                                            INNER JOIN Status ON Tasks.statusID = Status.statusId
                                            INNER JOIN Project on Tasks.projectID = Project.ProjectID
                                            where name = 'to do'
                                            group by Tasks.projectID, name
                                            ) TODO ON Tasks.projectID = TODO.projectID
                                LEFT JOIN ( SELECT Tasks.projectID, count(name) inProgress
                                            FROM Tasks
                                            INNER JOIN Status ON Tasks.statusID = Status.statusId
                                            INNER JOIN Project on Tasks.projectID = Project.ProjectID
                                            where name = 'in progress'
                                            group by Tasks.projectID, name
                                            ) INPROGRESS ON Tasks.projectID = INPROGRESS.projectID
                                where Tasks.projectID=?
                                group by projectID");
    $statement->execute([$projectID]);
    $result = $statement->fetchObject('Progress');
    $sum = $result->toDo + $result->done + $result->inProgress;
    $result->toDo = round($result->toDo * 100 / $sum);
    $result->done = round($result->done * 100 / $sum);
    $result->inProgress = round($result->inProgress * 100 / $sum);

    return $result;
}
function updateProjectVision($vision, $projectID)
{
    global $pdo;
    $statement = $pdo->prepare('UPDATE Project
                                SET Vision=?
                                WHERE ProjectID=?');
    $statement->execute([$vision, $projectID]);
}

function getTeamByProjectID($projectID)
{
    global $pdo;
    $statement = $pdo->prepare('SELECT projectID, User.userID userID, Role.name role, User.name name, email
                                FROM Team 
                                INNER JOIN User 
                                ON Team.userID = User.userID 
                                INNER JOIN Role
                                ON Team.roleID=Role.roleID
                                WHERE projectID= ?');
    $statement->execute([$projectID]);
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Team');
}

function getAllRoles()
{
    global $pdo;
    $statement = $pdo->query("  SELECT roleID, name, description 
                                FROM Role");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Role');
}
function addTeamMemberByEmail($email, $projectID, $role)
{
    global $pdo;
    $pdo->prepare(" INSERT INTO Team (projectID,userID,roleID) 
                    VALUES (?,(select userID from User where email=?),?)")
        ->execute([$projectID, $email, $role]);
}
function getUserByID($userID)
{
    global $pdo;
    $statement = $pdo->prepare('SELECT Role.name role, User.name name, email
                                FROM Team 
                                INNER JOIN User 
                                ON Team.userID = User.userID 
                                INNER JOIN Role
                                ON Team.roleID=Role.roleID
                                WHERE User.userID= ?
                                GROUP BY User.userID');
    $statement->execute([$userID]);
    return $statement->fetchObject('Task');
}
function getFriendsByID($userID)
{
    global $pdo;
    $statement = $pdo->prepare('SELECT  name, email
                                FROM User 
                                INNER JOIN Friends 
                                ON Friends.friendID = User.userID 
                                WHERE Friends.userID= ?');
    $statement->execute([$userID]);
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Friend');
}
function addFriend($email, $userID)
{
    global $pdo;
    $pdo->prepare(" INSERT INTO Friends (userID,friendID) 
                    VALUES (?,(select userID from User where email=?))")
        ->execute([$userID, $email]);
}
function getCommentsByTaskID($taskID)
{
    global $pdo;
    $statement = $pdo->prepare(' SELECT COMMENTS.commentText text, User.name user 
                                 FROM COMMENTS  
                                 INNER JOIN User ON User.userID=COMMENTS.user 
                                 WHERE taskID=? 
                                 ORDER BY COMMENTS.date');
    $statement->execute([$taskID]);
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Comment');
}
function addComment($taskID, $userID, $commentText)
{
    global $pdo;
    $pdo->prepare(" INSERT INTO COMMENTS (commentText,user, date,taskID) 
                    VALUES (?,?,now(),?)")
        ->execute([$commentText, $userID, $taskID]);
}
function phpAlert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
function getUserByEmail($email)
{
    global $pdo;
    $statement = $pdo->prepare('SELECT User.userID, email, password
                                FROM User 
                                INNER JOIN UserP 
                                ON User.userID = UserP.userID 
                                WHERE User.email= ?');
    $statement->execute([$email]);
    if ($statement->rowCount() > 0) {
        return $statement->fetchObject('User');
    } else {
        return "empty";
    }
}
function addNewUser($email, $password, $name, $surname)
{
    global $pdo;
    $result = $pdo->prepare(" INSERT INTO User (name,surname,email) 
                    VALUES (?,?,?)")
        ->execute([$name, $surname, $email]);

    return $result && addUserPasswordByEmail($email, $password);
}

function addUserPasswordByEmail($email, $password)
{

    global $pdo;
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    return $pdo->prepare(" INSERT INTO UserP (userID,password) 
                    VALUES ((select userID from User where email=?),?)")
        ->execute([$email, $passwordHash]);
}
