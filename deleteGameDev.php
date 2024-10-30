<?php require_once "core/dbConfig.php"; ?>
<?php require_once "core/models.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Delete a Game Developer</title>
    <style>
        body {
            background-color: #95d8c6;
            font-family: "Arial", sans-serif;
        }
        .container {
            margin-top: 30px;
        }
        h1 {
            text-align: center;
        }
        .gameDevContainer {
            border: 1px solid #ced4da;
            padding: 20px;
            border-radius: 5px;
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Are you sure you want to delete this user?</h1>
        
        <?php $getGameDevByID = getGameDevByID($pdo, $_GET["id"]); ?>
        <form action="core/handleForms.php?id=<?php echo htmlspecialchars($_GET["id"]); ?>" method="POST">
            <div class="gameDevContainer">
                <p><strong>First Name:</strong> <?php echo htmlspecialchars($getGameDevByID["first_name"]); ?></p>
                <p><strong>Last Name:</strong> <?php echo htmlspecialchars($getGameDevByID["last_name"]); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($getGameDevByID["email"]); ?></p>
                <p><strong>Contact No:</strong> <?php echo htmlspecialchars($getGameDevByID["contact_num"]); ?></p>
                <p><strong>Gender:</strong> <?php echo htmlspecialchars($getGameDevByID["gender"]); ?></p>
                <p><strong>Using Game Engine:</strong> <?php echo htmlspecialchars($getGameDevByID["using_game_engine"]); ?></p>
                <p><strong>Known Programming Language:</strong> <?php echo htmlspecialchars($getGameDevByID["known_prog_lang"]); ?></p>
                <button type="submit" class="btn btn-danger" name="deleteGameDevBtn">Delete User</button>
                <a href="your_previous_page.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
