<?php require_once "core/dbConfig.php"; ?>
<?php require_once "core/models.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Delete a Project</title>
    <style>
        body {
            background-color: #95d8c6;
            font-family: "Arial", sans-serif;
        }
        .container {
            margin-top: 30px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 20px;
            background-color: white;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php $getProjectByID = getProjectByID($pdo, $_GET["project_id"]); ?>
        <h1>Are you sure you want to delete this project?</h1>
        <h2>Project Name: <?php echo htmlspecialchars($getProjectByID["project_name"]); ?></h2>
        <h2>Project Dev: <?php echo htmlspecialchars($getProjectByID["project_dev"]); ?></h2>
        <h2>Date Started: <?php echo htmlspecialchars($getProjectByID["date_started"]); ?></h2>
        <h2>Date Finished: <?php echo htmlspecialchars($getProjectByID["date_finished"]); ?></h2>

        <div class="text-right mt-4">
            <form action="core/handleForms.php?project_id=<?php echo htmlspecialchars($_GET['project_id']); ?>&game_dev_id=<?php echo htmlspecialchars($_GET['game_dev_id']); ?>" method="POST">
                <button type="submit" class="btn btn-danger" name="deleteProjectBtn">Delete Project</button>
                <a href="viewprojects.php?game_dev_id=<?php echo htmlspecialchars($_GET['game_dev_id']); ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
