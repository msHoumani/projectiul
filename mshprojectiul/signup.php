<?php require_once './connection/connection.php';
 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign up</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'><link rel="stylesheet" href="styles/login.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container">
	<div class="screen">
		<div class="screen__content">
        <form class="login" method="POST" action="" id="myform">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" required class="login__input" placeholder="username" name="username" minlength="8" maxlength="24"pattern="[a-zA-Z0-9]+">
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
					<span class="button__text">sign up</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			
      <p>Already have an account ?<a style="color:white;" href="login/login1.php">Log in here</a></p>	
	  <p>Student?<a style="color:white;" href="login/studentslogin.php">Log in here</a> </p>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>	
   
	</div>
  
</div>
</body>
</html>
<script>
$(document).ready(function() {
  $("#myform").submit(function(e){
    
  e.preventDefault();
	console.log($(this).serializeArray());
	$.ajax({
		url : './login/signup.php',
		type: 'POST',
		data: $(this).serializeArray(),
		success: function (data) { 
		  if((data)){ 	
			alert('success');
			window.location.href = './login/login1.php';
            
		  }else{ 
		  	alert('error');
		  }
		},
		
	});
});
});
</script>
