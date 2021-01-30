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

        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
            <ul class="nav nav-tabs">
                <li li class="nav-item">
                    <a class="nav-link btn-lg btn-light" href="projectList.php">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  btn-lg btn-light" href="progress.php">Progress</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-lg btn-light" href="myTasks.php">My Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active btn-lg btn-light" href="friends.php">Friends</a>
                </li>
                <li>
                    <button type="submit" class="nav-link btn-lg btn-light" data-toggle="modal" data-target="#addFriend">Add Friend</button>
                </li>
            </ul>
            <ul class="nav nav-tabs">
                <button type="button" class="btn btn-light btn-lg" data-toggle="modal" data-target="#logout">
                    Log out
                </button>
            </ul>

        </div>
    </nav>
    <div class="d-flex flex-row flex-wrap justify-content-around">
        <table class="table m-2">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($team as $member) : ?>
                    <tr>
                        <td><?= $member->name ?></td>
                        <td><?= $member->email ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <!--Modal Form Edit Team-->
    <div class="modal fade" id="addFriend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Friend</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post">
                        <div>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="To add member enter email">
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