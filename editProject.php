<?php require_once "core/dbConfig.php"; ?>
<?php require_once "core/models.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Projects</title>
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
        <a href="viewprojects.php?game_dev_id=<?php echo htmlspecialchars($_GET['game_dev_id']); ?>" class="btn btn-secondary mb-3">View the Projects</a>
        <h1>Edit Projects</h1>

        <?php $getProjectByID = getProjectByID($pdo, $_GET["project_id"]); ?>
        
        <form action="core/handleForms.php?project_id=<?php echo htmlspecialchars($_GET['project_id']); ?>&game_dev_id=<?php echo htmlspecialchars($_GET['game_dev_id']); ?>" method="POST">
            <div class="form-group">
                <label for="projectName">Project Name</label>
                <input type="text" class="form-control" name="projectName" value="<?php echo htmlspecialchars($getProjectByID['project_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="dateStarted">Date Started</label>
                <input type="date" class="form-control" name="dateStarted" value="<?php echo htmlspecialchars($getProjectByID["date_started"]); ?>" required>
            </div>
            <div class="form-group">
                <label for="dateFinished">Date Finished</label>
                <input type="date" class="form-control" name="dateFinished" value="<?php echo htmlspecialchars($getProjectByID["date_finished"]); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="editProjectBtn">Save Changes</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
