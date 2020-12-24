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
    <div>
        <h2>Planning ST</h2>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Projects <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">My Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Progress</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Friends</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#insertProject">
        Insert New Project
    </button>

<!-- list of projects -->
    <div class="d-flex flex-row flex-wrap">
        <?php foreach ($projects as $project) : ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $project->title ?></h5>
                    <p class="card-text"> <?= $project->vision ?></p>
                    <form method="post" action="#">
                        <input type="hidden" name="projectID" value="<?= $project->projectid ?>">
                        <button type="submit" class="btn btn-dark card-link">Select</button>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
    </div>


 <!--Modal Form-->
    <div class="modal fade" id="insertProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insert Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">

                        <label>Project Title</label><br />
                        <input type="text" name="Title" required /><br>

                        <label>Vision</label><br />
                        <textarea class="form-control" rows="10" name="Vision"></textarea><br />

                        <input type="submit" class="btn btn-success" />
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>