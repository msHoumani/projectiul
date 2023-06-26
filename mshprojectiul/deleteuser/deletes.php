<?php require_once '../connection/connection.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form class="login" method="POST" action="delete.php">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" required class="login__input" placeholder="username" name="username" minlength="8" maxlength="24">
				</div>
				
                <div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="email" class="login__input" placeholder="Email" name="email" minlength="10" required pattern=".*.com$">
				</div>
                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" minlength="8" maxlength="24" class="login__input" placeholder="Password" required name="password">
				</div>
				<button class="submit" type="submit" name="submit" value="submit" id="submit">
					<span class="button__text">Delete account</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
</body>
</html>