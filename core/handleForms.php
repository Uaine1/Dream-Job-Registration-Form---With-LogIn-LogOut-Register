<?php
require_once "dbConfig.php";
require_once "models.php";

session_start();

if (isset($_POST["insertNewStudentBtn"])) {
    $firstName = $_POST["fname"];
    $lastName = $_POST["lname"];
    $email = $_POST["email"];
    $contactNum = $_POST["contactNum"];
    $gender = $_POST["gender"];
    $gameEngine = $_POST["gameEngine"];
    $progLang = $_POST["progLang"];
    $dateAdded = $_POST["dateadded"];
    
    $query = insertIntoGameDevRecords($pdo, $firstName, $lastName, $email, $contactNum, $gender ,$gameEngine, $progLang);

    if ($query) {
        header("Location: ../index.php");
    }

    else {
        echo"Query Failed";
    }
}

if (isset($_POST["editGameDevBtn"])){
    $id = $_GET["id"];
    $firstName = $_POST["fname"];
    $lastName = $_POST["lname"];
    $email = $_POST["email"];
    $contactNum = $_POST["contactNum"];
    $gender = $_POST["gender"];
    $gameEngine = $_POST["gameEngine"];
    $progLang = $_POST["progLang"];

    $query = updateGameDev($pdo, $id, $firstName, $lastName, $email, $contactNum, $gender ,$gameEngine, $progLang);

    if ($query){
        header("Location: ../index.php");
    }
    else {
        echo "Update Failed";
    }
}

if (isset($_POST["deleteGameDevBtn"])){
    $query = deleteGameDev($pdo, $_GET["id"]);

    if ($query){
        header("Location: ../index.php");
    }
    else {
        echo "Deletion Failed";
    }
}

if (isset($_POST["insertNewGameDevBtn"])){
    $firstName = trim($_POST["fname"]);
    $lastName = trim($_POST["lname"]);
    $email = trim($_POST["email"]);
    $contactNum = trim($_POST["contactNum"]);
    $gender = trim($_POST["gender"]);
    $gameEngine = trim($_POST["gameEngine"]);
    $progLang = trim($_POST["progLang"]);

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($contactNum) && !empty($gender) && !empty($gameEngine) && !empty($progLang)){
        $query = insertIntoGameDevRecords($pdo, $firstName, $lastName, $email, $contactNum, $gender ,$gameEngine, $progLang);

        if ($query){
            header("Location: ../index.php");
        }
        else {
            echo "Insertion Failed";
        }
    }
    else {
        echo "Make sure that you fill all the fields.";
    }
}

if (isset($_POST["editGameDevBtn"])){
    $id = $_GET["id"];
    $firstName = trim($_POST["fname"]);
    $lastName = trim($_POST["lname"]);
    $email = trim($_POST["email"]);
    $contactNum = trim($_POST["contactNum"]);
    $gender = trim($_POST["gender"]);
    $gameEngine = trim($_POST["gameEngine"]);
    $progLang = trim($_POST["progLang"]);

    if (!empty($id) && !empty($firstName) && !empty($lastName) && !empty($email) && !empty($contactNum) && !empty($gender) && !empty($gameEngine) && !empty($progLang)){

        $query = updateGameDev($pdo, $firstName, $lastName, $email, $contactNum, $gender ,$gameEngine, $progLang);

        if ($query){
            header("Location: ../index.php");
        }
        else{
            echo "Update Failed";
        }
    }
    else {
        echo "Make sure that you fill all the fields.";
    }
}

if (isset($_POST['insertNewProjectBtn'])) {
    $project_name = $_POST['projectName'];
    $date_started = $_POST['dateStarted'];
    $date_finished = $_POST['dateFinished'] ?? null;

    $game_dev_id = $_GET['game_dev_id'] ?? null;

    if ($game_dev_id) {
        if (insertProject($pdo, $project_name, $date_started, $date_finished, $game_dev_id)) {
            header("Location: ../viewprojects.php?game_dev_id=$game_dev_id");
            exit();
        } else {
            echo "Failed to add project.";
        }
    } else {
        echo "Game Developer ID is missing.";
    }
}

if (isset($_POST['editProjectBtn'])) {
    $project_id = $_GET['project_id'];
    $projectName = $_POST['projectName'];
    $dateStarted = $_POST['dateStarted'];
    $dateFinished = $_POST['dateFinished'];

    $updateSuccess = updateProject($pdo, $projectName, $dateStarted, $dateFinished, $project_id);

    if ($updateSuccess) {
        header("Location: ../viewprojects.php?game_dev_id=" . $_GET['game_dev_id']);
        exit();
    } else {
        echo "Error updating project.";
    }
}

if (isset($_POST["deleteProjectBtn"])){
    $query = deleteProject($pdo, $_GET["project_id"]);

    if ($query){
        header("Location: ../viewprojects.php?game_dev_id=" .$_GET["game_dev_id"]);
    }
    else {
        echo "Deletion Failed";
    }
}

if (isset($_POST['registerUserBtn'])) {

	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	if (!empty($username) && !empty($password)) {

		$insertQuery = insertNewUser($pdo, $username, $password);

		if ($insertQuery) {
			header("Location: ../login.php");
		}
		else {
			header("Location: ../register.php");
		}
	}

	else {
		$_SESSION['message'] = "Please make sure the input fields 
		are not empty for registration!";

		header("Location: ../login.php");
	}

}

if (isset($_POST['loginUserBtn'])) {

	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	if (!empty($username) && !empty($password)) {

		$loginQuery = loginUser($pdo, $username, $password);
	
		if ($loginQuery) {
			header("Location: ../index.php");
		}
		else {
			header("Location: ../login.php");
		}

	}

	else {
		$_SESSION['message'] = "Please make sure the input fields 
		are not empty for the login!";
		header("Location: ../login.php");
	}
 
}

if (isset($_GET['logoutAUser'])) {
	unset($_SESSION['username']);
	header('Location: ../login.php');
}

?>