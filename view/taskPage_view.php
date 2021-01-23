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
        <h2><?= $project->title ?></h2>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <form method="post" action="../controller/tasksList.php">
            <input type="hidden" name="projectID" value="<?= $project->projectid ?>">
            <button type="submit" class="btn-lg btn-light card-link">Project</button>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <button class="btn btn-light card-link">Assignee<span class="sr-only">(current)</span></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-light card-link" data-toggle="modal" data-target="#editStatus">Status</button>
                </li>
            </ul>
        </div>
    </nav>
    <div class="d-flex justify-content-center">
        <h2><?= $task->title ?></h2>
    </div>



    <!--list of tasks-->
    <div class="d-flex flex-row flex-wrap justify-content-center">
        <div class="card m-2" style="width: 50rem;">
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <h5 class="card-subtitle mb-2 text-muted"><?= $task->status ?></h5>
                <p class="card-text"> <?= $task->description ?></p>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-dark card-link" data-toggle="modal" data-target="#editDescription">Edit</button>
                </div>
            </div>
        </div>
    </div>


    <!--Modal Form Edit Description-->
    <div class="modal fade" id="editDescription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $task->title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <input type="hidden" name="taskID" value="<?= $task->taskid ?>">
                        <label>Description</label><br />
                        <textarea class="form-control" rows="6" name="Description"><?= $task->description ?></textarea><br />
                        <input type="submit" class="btn btn-success" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Form Update Status-->
    <div class="modal fade" id="editStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $task->title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <input type="hidden" name="taskID" value="<?= $task->taskid ?>">
                        <label>Status</label><br />
                        <select class="form-control" id="cars" name="statusID">
                            <option value="1">In Progress</option>
                            <option value="2">Done</option>
                            <option value="3">To Do</option>
                        </select><br />
                        <input type="submit" class="btn btn-success" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>