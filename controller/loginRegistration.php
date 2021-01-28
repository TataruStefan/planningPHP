<?php
session_start();

// if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
//     header("location: welcome.php");
//     exit;
// }

require_once("../model/user.php");
require_once("../model/dataAccess.php");

// Processing form data when form is submitted
if (isset($_REQUEST["email"]) &&  isset($_REQUEST["password"])) {

    // Check if email or password is empty
    if (empty(trim($_POST["email"]))) {
        phpAlert("Please enter email.");
    } else if (empty(trim($_POST["password"]))) {
        phpAlert("Please enter your password.");
    } else {

        $user = getUserByEmail(trim($_POST["email"]));

        if ($user == "empty") {
            phpAlert("Incorrect email");
        } else if (password_verify(trim($_POST["password"]), $user->password) || trim($_POST["password"]) == $user->password) {
            // Password is correct, so start a new session
            session_start();

            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["userID"] = $user->userID;

            // Redirect user to welcome page
            header("location: projectList.php");
        } else {
            phpAlert("Oops! Something went wrong. Please try again later.");
        }
    }
}

require_once("../view/loginRegistration_view.php");
