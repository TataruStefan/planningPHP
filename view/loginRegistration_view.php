<!doctype html>
<html>

<head>
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body style="height: 700px">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="card login-form">
            <div class="card-body">
                <h3 class="card-title text-center">Log in </h3>
                <div class="card-text">
                    <!--
			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                    <form method="post">
                        <!-- to error: add class "has-danger" -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>

                        <div class="sign-up">
                            Don't have an account? <a href="" data-toggle="modal" data-target="#register">Create One</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Modal register-->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">

                        <label for="userName">Name</label>
                        <input type="text" name="name" class="form-control form-control-sm" id="userName">
                        <label for="surname">Surname</label>
                        <input type="text" name="surname" class="form-control form-control-sm" id="surname">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="emailR" class="form-control form-control-sm" id="inputEmail" aria-describedby="emailHelp">
                        <label for="inputPassword">Password</label>
                        <input type="password" name="passwordR" class="form-control form-control-sm" id="inputPassword">
                        <div class="d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>