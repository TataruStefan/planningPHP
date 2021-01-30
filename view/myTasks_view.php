<!doctype html>
<html>

<head>
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

        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
            <ul class="nav nav-tabs">
                <li li class="nav-item">
                    <a class="nav-link  btn-lg btn-light" href="projectList.php">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  btn-lg btn-light" href="progress.php">Progress</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active btn-lg btn-light" href="myTasks.php">My Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-lg btn-light" href="friends.php">Friends</a>
                </li>

            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name="title" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="nav nav-tabs">
                <button type="button" class="btn btn-light btn-lg" data-toggle="modal" data-target="#logout">
                    Log out
                </button>
            </ul>

        </div>
    </nav>



    <!-- list of projects -->
    <div class="d-flex flex-row flex-wrap justify-content-center">
        <?php foreach ($projects as $project) : ?>
            <div class="card m-2" style="width: 25rem;">
                <div class="card-body ">
                    <form class="d-flex  justify-content-between" method="post" action="../controller/tasksList.php">
                        <input type="hidden" name="projectID" value="<?= $project->projectID ?>">
                        <h5 class="card-title"><?= $project->title ?></h5>
                        <button type="submit" class="btn  btn-light card-link ">Select</button>
                    </form>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($project->tasks as $task) : ?>
                            <li class="list-group-item d-flex flex-row flex-wrap justify-content-between">

                                <form class="d-flex justify-content-end" method="post" action="taskPage.php">
                                    <input type="hidden" name="taskID" value="<?= $task->taskID ?>">
                                    <button type="submit" class="btn btn-lg btn-light card-link"><?= $task->title ?></button>
                                </form>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        <?php endforeach ?>
    </div>


    <!--Modal Form Logout-->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LogOut</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="logout.php">

                        <P>Are you sure that you want to Log out</P>

                        <button type="submit" class="btn btn-secondary" >Yes</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>