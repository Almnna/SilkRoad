<?php require "header.php"; if(!empty($_SESSION)){header("Location: http://localhost/dashboard.php");} ?>

	<?php 
	if(isset($_POST["login"]))
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		open_connection();
        if($conn)
        {
            $sql = "select name from users where name='$username'";
            if($res = $conn->query($sql))
            {
                if($res->num_rows > 0)
                {
                    $sql = "select password, locked from users where name='$username'";
                    if($result = $conn->query($sql))
                    {
                        if($result->num_rows > 0)
                        {
                            
                            $tmp = $result->fetch_assoc();

                            if($tmp["locked"] == 0)
                            {
                                // if($tmp["password"] == $password)
                                if(password_verify($password, $tmp["password"]))
                                {
                                    $sql = "select * from users where name='$username'";
                                    if($result = $conn->query($sql))
                                    {
                                        if($result->num_rows > 0)
                                        {
                                            $tmp = $result->fetch_assoc();
                                            
                                            //start a session
                                            //assign user info to the session variables
                                            $_SESSION["username"] =  $tmp["name"];
                                            $_SESSION["email"] =  $tmp["email"];
                                            $username = $_SESSION["username"];
                                            $_SESSION["bitcoins"] = $tmp["bitcoins"];
                                            $sql = "select * from cart where name='$username'";

                                            if($res = $conn->query($sql))
                                            {
                                                $tmp = $res->num_rows;
                                                $_SESSION["contents"] = $tmp;
                                                
                                            }
                                            setcookie("logged_user", $username, time() + (3));
                                            close_connection();
                                            header("Location: http://localhost/dashboard.php");
                                        }
                                    }else{
                                        $Pass_error = true;
                                        $pass_error = "<b>Error while trying to login please try again!</b>";    
                                    }
                                }else{
                                    //wrong password!
                                    $Pass_error = true;
                                    $pass_error = "Password is incorrect!";
                                }
                            }else{
                                $User_error = true;
                                $user_error = "Account is locked!";
                            }
                        }else{
                            echo $conn->connect_error;
                        }
                    }
                }else{
                    $Pass_error = true;
                    $pass_error = '<b class="col s12 offset-s2">there is no such user</b>';
                }
            }else{
                echo "no table called 'users'";
            }

            close_connection();
        }
        
	}



?>
	
	<body>
		<main>
		<div class="row" style="width: 100%; margin-top: 10px;">
			<div class="col s6 card offset-s3 s4 z-depth-2" style="border-radius: 10px; padding: 30px;">
				<center>
					<img src="static/images/formlogo.png" style="width: 125px; height: 150px;">
					<h3 style="color: green; margin-top: 5px; margin-left: 20px; font-family: DotGothic; font-size: 30px;">SilkRoad</h3>
				</center>
				<form method="POST" class="row">
					<input type="text" name="username" class="col s8 offset-s2"  style="margin-bottom: 8px;" placeholder="Username" />
					<?php if($User_error == true){echo "<p class='col s7 offset-s3' style='color: red; font-size: 14px;'>$user_error</p>";}?>
					<input type="password" name="password" class="col s8 offset-s2" style="margin-top: 8px;" placeholder="Password" />
					<?php if($Pass_error == true){echo "<p class='col s7 offset-s3' style='color: red; font-size: 14px;'>$pass_error</p>";}?>
					<input type="submit" class="col s6 offset-s3 btn"  name="login"  value="LOGIN" style="background-color: green; margin-top: 10px;" />
				</form>
				<center>
                    <p style="margin-top: 10px;font-family: DotGothic;">Don't Have An Account? <a href="signup.php" style="color: #28a745;">Signup</a>.</p>
                </center>
			</div>
		</div>
		</main>
	</body>

<?php require "footer.php"; ?>