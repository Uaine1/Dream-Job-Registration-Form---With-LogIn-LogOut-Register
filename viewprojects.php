<?php
require_once "core/dbConfig.php";
require_once "core/models.php";

if (isset($_GET['game_dev_id'])) {
    $game_dev_id = $_GET['game_dev_id'];
} else {
    die("Game Developer ID is missing.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles_viewproject.css">
    <title>Projects</title>
    <style>
        body {
            background-color: #95d8c6;
        }
        .container {
            margin-top: 30px;
        }
        table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Project</h1>
        <form action="core/handleForms.php?game_dev_id=<?php echo htmlspecialchars($game_dev_id); ?>" method="POST">
            <div class="form-group">
                <label for="projectName">Project Name</label>
                <input type="text" class="form-control" name="projectName" required>
            </div>
            <div class="form-group">
                <label for="dateStarted">Date Started</label>
                <input type="date" class="form-control" name="dateStarted" required>
            </div>
            <div class="form-group">
                <label for="dateFinished">Date Finished</label>
                <input type="date" class="form-control" name="dateFinished">
            </div>
            <button type="submit" class="btn btn-primary" name="insertNewProjectBtn">Add Project</button>
        </form>

        <h2 class="mt-5">Projects List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Game Dev ID</th>
                    <th>Project Name</th>
                    <th>Date Started</th>
                    <th>Date Finished</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getProjectByGameDev = getProjectByGameDev($pdo, $game_dev_id);
                if (empty($getProjectByGameDev)) {
                    echo "<tr><td colspan='6' class='text-center'>No projects found for this developer.</td></tr>";
                } else {
                    foreach ($getProjectByGameDev as $row) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["project_id"]); ?></td>
                            <td><?php echo htmlspecialchars($row["project_dev"]); ?></td>
                            <td><?php echo htmlspecialchars($row["project_name"]); ?></td>
                            <td><?php echo htmlspecialchars($row["date_started"]); ?></td>
                            <td><?php echo htmlspecialchars($row["date_finished"]); ?></td>
                            <td>
                                <a href="editProject.php?project_id=<?php echo htmlspecialchars($row['project_id']); ?>&game_dev_id=<?php echo htmlspecialchars($game_dev_id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="deleteProject.php?project_id=<?php echo htmlspecialchars($row['project_id']); ?>&game_dev_id=<?php echo htmlspecialchars($game_dev_id); ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
