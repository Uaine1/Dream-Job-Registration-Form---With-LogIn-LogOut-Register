<?php
require_once 'core/models.php';
require_once 'core/handleForms.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles_index.css">
    <title>Game Developer Management System</title>
    <style>
        body {
            background-color: #95d8c6;
            font-family: "Arial", sans-serif;
        }
        .container {
            margin-top: 30px;
        }
        h3 {
            text-align: center;
        }
        .user-list {
            margin-top: 20px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h3>Welcome to the Game Developer Management System. Input your details to register</h3>
        <?php if (isset($_SESSION['message'])) { ?>
            <h1 style="color: red; text-align: center;"><?php echo $_SESSION['message']; ?></h1>
        <?php } unset($_SESSION['message']); ?>

        <?php if (isset($_SESSION['username'])) { ?>
            <h1>Hello there, <?php echo $_SESSION['username']; ?>!</h1>
            <a href="core/handleForms.php?logoutAUser=1" class="btn btn-danger">Logout</a>
        <?php } else { echo "<h1>No user logged in</h1>"; }?>

        <h3>Users List</h3>
        <ul class="list-group user-list">
            <?php $getAllUsers = getAllUsers($pdo); ?>
            <?php foreach ($getAllUsers as $row) { ?>
                <li class="list-group-item">
                    <a href="viewuser.php?user_id=<?php echo $row['user_id']; ?>"><?php echo $row['username']; ?></a>
                </li>
            <?php } ?>
        </ul>
        <br>
        <h3>Registration Form</h3>
        <form action="core/handleForms.php" method="POST" class="mt-4">
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" name="fname" placeholder="Type Here..." required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" name="lname" placeholder="Type Here..." required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Type Here..." required>
            </div>
            <div class="form-group">
                <label for="contactNum">Contact No.</label>
                <input type="text" class="form-control" name="contactNum" placeholder="Type Here..." required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" name="gender" placeholder="Type Here..." required>
            </div>
            <div class="form-group">
                <label for="gameEngine">Using game engine</label>
                <input type="text" class="form-control" name="gameEngine" placeholder="Type Here..." required>
            </div>
            <div class="form-group">
                <label for="progLang">Known programming language</label>
                <input type="text" class="form-control" name="progLang" placeholder="Type Here..." required>
            </div>
            <button type="submit" class="btn btn-primary" name="insertNewGameDevBtn">Register</button>
        </form>

        <hr>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Game Dev ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact No.</th>
                    <th>Gender</th>
                    <th>Using Game Engine</th>
                    <th>Known Programming Language</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $seeAllGameDevRecords = seeAllGameDevRecords($pdo); ?>
                <?php foreach ($seeAllGameDevRecords as $row) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["first_name"]; ?></td>
                        <td><?php echo $row["last_name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["contact_num"]; ?></td>
                        <td><?php echo $row["gender"]; ?></td>
                        <td><?php echo $row["using_game_engine"]; ?></td>
                        <td><?php echo $row["known_prog_lang"]; ?></td>
                        <td>
                            <a href="viewprojects.php?game_dev_id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">View Projects</a>
                            <a href="editGameDev.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="deleteGameDev.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
