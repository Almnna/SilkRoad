<?php require "header.php"; if(!empty($_SESSION)){header("Location: http://localhost/dashboard.php");}?>

<!-- main color #28a745 -->
<body>
	<main>
		<?php
			$password_error = "";
			$email_error = "";
			$user_error = "";
			if (isset($_POST["signup"]))
			{
				$sign_username = sanitize($_POST["username"]);
				$sign_email = sanitize($_POST["email"]);
				$sign_password = sanitize($_POST["password1"]);
				$sign_confirm_password = sanitize($_POST["password2"]);

				if(strlen($sign_username) < 3)
				{
					$user_error = "Username must be a combination of at least 3 characters!";
				}

				if(strlen($sign_password) < 8)
				{
					$password_error = "Password must be at least 8 characters!";
					$Pass_error = true;
				}

				if($sign_password != $sign_confirm_password)
				{
					$password_error = " Passwords entered don't match!"; 
					$Pass_error = true;        
				//}  
				}else{
					$sign_password = password_hash($sign_password, PASSWORD_DEFAULT);
					//echo $sign_password;
				}

				if(!filter_var($sign_email, FILTER_VALIDATE_EMAIL))
				{
					$email_error = "Please enter email in a valid format!";
					$Email_error = true;
				}

				if($Email_error == false && $Pass_error == false)
				{
					open_connection();
					$sql = "select * from users where name='$sign_username'";
					$user = $conn->query($sql);
					if($user->num_rows > 0)
					{
						$user_error = "user already exists!";
					}else{
						$sql = "select * from users where email='$sign_email'";
						$email = $conn->query($sql);
						if($email->num_rows > 0)
						{
							$email_error = "sorry this email address is already linked to another account";
							$Email_error = true;
						}else{
							$sql = "insert into users (name, email, password)
							values ('$sign_username', '$sign_email', '$sign_password')";
							if($conn->query($sql))
							{
								setcookie("user_created", $sign_username, time() + (3));
								header("Location: http://localhost/index.php");
							}else{
								echo "error in inserting user data to database";
								echo $conn->connect_error;
							}
						}
					}       
				}
				close_connection();
			}
        ?>
		<div class="row" style="margin-top: 20px;">
			<div class="col s6 card offset-s3 s4 z-depth-2" style="border-radius: 10px; padding: 40px;">				
				<form method="POST">
					<div class="col s6" style="margin-left: -5%;">
						<input type="text" name="username" class="col s12 offset-s1" style="margin-top: 5px; text-color: #fff " placeholder="Username" value="<?php if($Pass_error == true || $Email_error == true){echo $sign_username;}?>"><?php echo "<p style='color: red;'>$user_error</p>";?>
						<input type="email" name="email" class="col s12 offset-s1" placeholder="Email" value="<?php if($Pass_error == true || $Email_error == true) {echo $sign_email;}?>"> <?php if($Email_error == true){echo "<p style='color: red;'>$email_error</p>";}?>
						<input type="password" name="password1" class="col s12 offset-s1" placeholder="Password">
						<input type="password" name="password2" class="col s12 offset-s1" placeholder="Confirm Password"><?php echo "<p style='color: red;'>$password_error</p>";?>
					</div>
					<div class="col s6">
						<div class="vertical" style="height: 330px;"></div>
							<img class="col offset-s5" src="static/images/formlogo.png"/>
							<h4 class="col offset-s7" style="font-family: DotGothic; color: var(--greeno);">SilkRoad</h4>
					</div>
					<input type="submit" name="signup" class="col s6 offset-s3 btn"  style="margin-top:  15px; background-color: #28a745;" value="SIGNUP">
					<p class="col s8 offset-s4" style="margin-top: 25px;font-family: DotGothic;font-size: 17px;">Have An Account? <a href="index.php" style="color: var(--greeno);">Login</a>.</p>
				</form>
			</div>
		</div>
	</main>
</body>
	
<?php require "footer.php"; ?>