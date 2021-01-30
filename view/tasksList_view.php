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

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
            <ul class="nav nav-tabs">
                <li li class="nav-item">
                    <a class="nav-link btn-lg btn-light" href="projectList.php">Projects</a>
                </li>
                <li class="nav-item">
                    <form action="progress.php" method="post">
                        <input type="hidden" name="projectID" value="<?= $_REQUEST["projectID"] ?>">
                        <button type="submit" class="nav-link btn-lg btn-light">Progress</button>
                    </form>
                </li>
                <li class="nav-item">
                    <button type="submit" class="nav-link btn-lg btn-light" data-toggle="modal" data-target="#editVision">Vision</button>
                </li>
                <li class="nav-item">
                    <button type="submit" class="nav-link btn-lg btn-light" data-toggle="modal" data-target="#team">Team</button>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-lg btn-light" data-toggle="modal" data-target="#insertTask">New Task</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post">
                <input type="hidden" name="projectID" value="<?= $_REQUEST["projectID"] ?>">
                <input class="form-control mr-sm-2" type="search" name="taskName" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="nav nav-tabs">
                <button type="button" class="btn btn-light btn-lg" data-toggle="modal" data-target="#logout">
                    Log out
                </button>
            </ul>
        </div>
    </nav>

    <!--list of tasks-->
    <div class="d-flex flex-row flex-wrap justify-content-around">
        <?php foreach ($tasks as $task) : ?>
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $task->title ?></h5>
                    <p class="card-text"> <?= $task->status ?></p>
                    <form class="d-flex justify-content-end" method="post" action="taskPage.php">
                        <input type="hidden" name="taskID" value="<?= $task->taskID ?>">
                        <button type="submit" class="btn btn-dark card-link">Select</button>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
    </div>


    <!--Modal Form-->
    <div class="modal fade" id="insertTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <input type="hidden" name="projectID" value="<?= $project->projectID ?>">
                        <label>Task Title</label><br />
                        <input type="text" name="Title" required /><br>

                        <label>Description</label><br />
                        <textarea class="form-control" rows="6" name="Description"></textarea><br />

                        <input type="submit" class="btn btn-success" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Form Edit Vision-->
    <div class="modal fade" id="editVision" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $project->title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <input type="hidden" name="projectID" value="<?= $project->projectID ?>">
                        <label>Description</label><br />
                        <textarea class="form-control" rows="6" name="vision"><?= $project->vision ?></textarea><br />
                        <input type="submit" class="btn btn-success" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Form Edit Team-->
    <div class="modal fade" id="team" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="projectID" value="<?= $project->projectID ?>">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($team as $member) : ?>
                                <tr>
                                    <td><?= $member->name ?></td>
                                    <td><?= $member->role ?></td>
                                    <td><?= $member->email ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <form method="post">
                        <div>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="To add member enter email">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Role</label>
                            <select class="custom-select my-1 mr-sm-2" name="roleID" id="inlineFormCustomSelectPref">
                                <?php foreach ($roles as $role) : ?>
                                    <option value=<?= $role->roleID ?>><?= $role->name ?></option>
                                <?php endforeach ?>
                            </select>

                            <button type="submit" class="btn btn-primary">Add</button>
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

                        <button type="submit" class="btn btn-secondary" >Yes</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>