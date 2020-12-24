<!doctype html>
<html>

<head>
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="listP">
        <h2>UserName Projects</h2>
    </div>
    <nav class="navbar navbar-default fixed-top">
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
    <button type="button" class="btn btn-success btn-lg position-static" data-toggle="modal" data-target="#myModal">
        Insert New Project
    </button>

    <div class="overflow-auto listP">

        <!-- <div class="list-group">
            <?php foreach ($results as $item) : ?>
                <a class="list-group-item list-group-item-action" href="#"><?= $item->Title ?>: <?= $item->Vision ?></a><br />
            <?php endforeach ?>
        </div> -->
        <div class="list-group">
            <?php foreach ($results as $item) : ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item->title ?></h5>
                        <p class="card-text"> <?= $item->vision ?></p>
                        <form method="post" action="#">
                            <input type="hidden" id="custId" name="custId" value="<?= $item->projectid ?>">

                            <button type="submit" class="btn btn-primary card-link">Select</button>
                        </form>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Insert Project</h4>
                </div>
                <div class="modal-body">
                    <form method="post">

                        <label>Project Title</label><br />
                        <input type="text" name="Title" required /><br>

                        <label>Vision</label><br />
                        <textarea class="form-control" rows="10" name="Vision"></textarea><br />

                        <input type="submit" class="btn btn-default" />
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>

</html>