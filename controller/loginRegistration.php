<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: projectList.php");
    exit;
}

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
        } else if (password_verify(trim($_POST["password"]), $user->password) ) {
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


// Processing registration form data when form is submitted
if (isset($_REQUEST["emailR"]) &&  isset($_REQUEST["passwordR"])) {

    // Validate username
    if (empty(trim($_POST["emailR"]))) {
        phpAlert("Please enter email.");
    } else if (empty(trim($_POST["passwordR"]))) {
        phpAlert("Please enter your password.");
    } else {
        // Prepare a select statement
        $user = getUserByEmail(trim($_POST["emailR"]));

        if ($user != "empty") {
            phpAlert("Email already taken");
        } else {

            $newUser = addNewUser(trim($_POST["emailR"]), trim($_POST["passwordR"]), trim($_POST["name"]), trim($_POST["surname"]));

            if (!$newUser) {
                phpAlert("Something went wrong. Please try again later.");
            }
        }
    }
}




require_once("../view/loginRegistration_view.php");
