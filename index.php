<?php
require_once "pdo.php";
require_once "ProjectInput.php";


$statement = $pdo->query("SELECT Title, Vision FROM Project");
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_OBJ);

?>
<!doctype html>
<html>

<head>
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <h2>User Projects</h2>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Planning ST</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Projects</a></li>
                <li><a href="#">My Tasks</a></li>
                <li><a href="#">Progress</a></li>
                <li><a href="#">Friends</a></li>
            </ul>
        </div>
    </nav>

    <div class="main">
        <h4>Projects</h4></br>
        <?php foreach ($results as $item) : ?>
            <a class=".borderElement" href="#"><?= $item->Title ?>: <?= $item->Vision ?></a><br />
        <?php endforeach ?>
    </div>

    <button class="insert" id="insertBtn" onclick="openInsertProject()">Insert Project</button>
    <div class="insertForm form-popup" id="InsertProject">
        <form method="post" >

            <label>Project Title</label><br />
            <input type="text" name="Title" required /><br>

            <label>Vision</label><br />
            <input type="text" name="Vision" required /><br>

            <input type="submit" onclick="closeInsertProject()" />
        </form>
    </div>
</body>

</html>