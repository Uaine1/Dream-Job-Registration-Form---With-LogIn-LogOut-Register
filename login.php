<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Log In</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body {
			font-family: "Arial", sans-serif;
			background-color:#95d8c6;
		}
		.login-container {
			max-width: 400px;
			margin: 100px auto;
			padding: 20px;
			background-color:#fcf2d9;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		h1 {
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="login-container">
		<?php if (isset($_SESSION['message'])) { ?>
			<h1 style="color: red;"><?php echo $_SESSION['message']; ?></h1>
		<?php } unset($_SESSION['message']); ?>
		<h1>Login Now!</h1>
		<form action="core/handleForms.php" method="POST">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" name="username" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" required>
			</div>
			<button type="submit" class="btn btn-primary btn-block" name="loginUserBtn">Log In</button>
		</form>
		<p class="text-center">Don't have an account? You may register <a href="register.php">here</a></p>
	</div>
	<!-- Bootstrap JS and dependencies (Optional, for further interactivity) -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
