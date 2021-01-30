<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="d-flex justify-content-center">
        <h2><?= $project->title ?></h2>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex flex-column justify-content-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
            <ul class="nav nav-tabs">
                <li li class="nav-item">
                    <form method="post" action="../controller/tasksList.php">
                        <input type="hidden" name="projectID" value="<?= $project->projectID ?>">
                        <button type="submit" class="btn-lg btn-light nav-link">Project</button>
                    </form>
                </li>
                <li class="nav-item">
                    <button class="btn-lg btn-light nav-link" data-toggle="modal" data-target="#assignee">Assignee</button>
                </li>
                <li class="nav-item">
                    <button class="btn-lg btn-light nav-link" data-toggle="modal" data-target="#editStatus">Status</button>
                </li>
            </ul>
            <ul class="nav nav-tabs">
                <button type="button" class="btn btn-light btn-lg" data-toggle="modal" data-target="#logout">
                    Log out
                </button>
            </ul>
        </div>
    </nav>
    <div class="d-flex flex-column justify-content-center">
        <h2 class="d-flex justify-content-center"><?= $task->title ?></h2>
        <h3 class="text-muted d-flex justify-content-center"><?= $task->status ?></h3>
    </div>



    <!--task description-->
    <div class="d-flex flex-row flex-wrap justify-content-center">
        <div class="card m-2" style="width: 50rem;">
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text"> <?= $task->description ?></p>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-dark card-link" data-toggle="modal" data-target="#editDescription">Edit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- comment for the task-->
    <div class="h-100 d-flex flex-row flex-wrap justify-content-center">
        <div class="card m-2" style="width: 50rem;">
            <div class="card-body">
                <h5 class="card-title">Comments</h5>
                <ul class="list-group list-group-flush overflow-auto">
                    <?php foreach ($comments as $comment) : ?>
                        <li class="list-group-item d-flex flex-row flex-wrap justify-content-between">
                            <p>
                                <?= $comment->text ?>
                            </p>
                            <br>
                            <p>
                                <?= $comment->user ?>
                            </p>
                        </li>

                    <?php endforeach ?>
                </ul>
                <form method="POST">
                    <div class="d-flex justify-content-end">
                        <input type="hidden" name="taskID" value="<?= $task->taskID ?>">
                        <textarea class="form-control" rows="2" name="commentText" placeholder="add comment"></textarea>
                        <button type="submit" class="btn btn-dark card-link">Send</button>
                    </div>
                </form>
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
                        <input type="hidden" name="taskID" value="<?= $task->taskID ?>">
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
                        <input type="hidden" name="taskID" value="<?= $task->taskID ?>">
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
    <!--Modal Form Edit Assignee-->
    <div class="modal fade" id="assignee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assignee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $member->name ?></td>
                                <td><?= $member->role ?></td>
                                <td><?= $member->email ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <form method="post">
                        <div>
                            <input type="hidden" name="taskID" value="<?= $task->taskID ?>">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Role</label>
                            <select class="custom-select my-1 mr-sm-2" name="userID" id="inlineFormCustomSelectPref">
                                <?php foreach ($team as $teamMember) : ?>
                                    <option value=<?= $teamMember->userID ?>><?= $teamMember->name ?> <?= $teamMember->email ?></option>
                                <?php endforeach ?>
                            </select>
                            <button type="submit" class="btn btn-primary">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

                        <button type="submit" class="btn btn-secondary">Yes</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>