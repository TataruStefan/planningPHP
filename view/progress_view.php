<!doctype html>
<html>

<head>
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="d-flex justify-content-center">
        <h2>Project Management ST</h2>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-tabs">
                <li li class="nav-item">
                    <a class="nav-link btn-lg btn-light" href="projectList.php">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active btn-lg btn-light" href="progress.php">Progress</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-lg btn-light" href="#">My Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-lg btn-light" href="#">Friends</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post">
                <input class="form-control mr-sm-2" type="search" name="title" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="d-flex flex-row flex-wrap justify-content-around">
        <?php foreach ($projects as $project) : ?>
            <div class="card m-2" style="width: 30rem;">
                <div class="card-body ">
                    <h5 class="card-title"><?= $project->Title ?></h5>
                    <div class="progress" style="height: 30px;">
                        <div class="progress-bar" role="progressbar" style="width: <?= $project->done ?>%" aria-valuenow="<?= $project->done ?>" aria-valuemin="0" aria-valuemax="100">DONE <?= $project->done ?>%</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= $project->inProgress ?>%" aria-valuenow="<?= $project->inProgress ?>" aria-valuemin="0" aria-valuemax="100">IN PROGRESS <?= $project->inProgress ?>%</div>
                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= $project->toDo ?>%" aria-valuenow="<?= $project->toDo ?>" aria-valuemin="0" aria-valuemax="100">TO DO <?= $project->toDo ?>%</div>
                    </div>
                    <form method="post" action="../controller/tasksList.php">
                        <input type="hidden" name="projectID" value="<?= $project->projectID ?>">
                        <button type="submit" class="btn btn-dark card-link">Select</button>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>