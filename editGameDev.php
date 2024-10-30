<?php require_once "core/dbConfig.php"; ?>
<?php require_once "core/models.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Game Developer Information</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Arial", sans-serif;
        }
        .container {
            margin-top: 30px;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Game Developer Information</h1>

        <?php $getGameDevByID = getGameDevByID($pdo, $_GET["id"]); ?>
        <form action="core/handleForms.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" method="POST">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" name="id" value="<?php echo htmlspecialchars($getGameDevByID["id"]); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="fname">First Name</label> 
                <input type="text" class="form-control" name="fname" value="<?php echo htmlspecialchars($getGameDevByID["first_name"]); ?>" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" name="lname" value="<?php echo htmlspecialchars($getGameDevByID["last_name"]); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label> 
                <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($getGameDevByID["email"]); ?>" required>
            </div>
            <div class="form-group">
                <label for="contactNum">Contact No.</label>
                <input type="text" class="form-control" name="contactNum" value="<?php echo htmlspecialchars($getGameDevByID["contact_num"]); ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" name="gender" value="<?php echo htmlspecialchars($getGameDevByID["gender"]); ?>" required>
            </div>
            <div class="form-group">
                <label for="gameEngine">Using Game Engine</label>
                <input type="text" class="form-control" name="gameEngine" value="<?php echo htmlspecialchars($getGameDevByID["using_game_engine"]); ?>" required>
            </div>
            <div class="form-group">
                <label for="progLang">Known Programming Language</label>
                <input type="text" class="form-control" name="progLang" value="<?php echo htmlspecialchars($getGameDevByID["known_prog_lang"]); ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary" name="editGameDevBtn">Save Changes</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
