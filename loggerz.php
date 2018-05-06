<?php 

	// require the class definition file
	require_once( "webpage.class.php" );
	
	// create a new instance of the webpage class passing the title and an array of stylesheets to the constructor
	$page = new Webpage( "The Scrubbery Zone - Total Nub Since the 80's", "css/style.css", "", "", "");
	
	// echo the page contents back to the browser
	$page->getPageTop();
	$page->getNav();

	?>
	<br />
	<div class="row no-pad">
		<div class="col-lg-12 articleBar">
			Login
		</div>
	</div>
	<br />
	<div class="row no-pad">
		<div class="col-lg-12 addArticleForm">
		<form action="" method="post">
			<div id="formLayout">
				
				<div class="form-group">
					<label for="username">Username:</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
				</div>
				<div class="form-group">
					<input type="submit" value="Sign In" class="submitlogin">
				</div>				
			</div>
			</form>		
		
		<?php
		//error_reporting(0);
		include 'database_conn.php';		

		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//$username=mysql_real_escape_string($username);
		//$password=mysql_real_escape_string($password);
				
		if($username == "")
		{
			$errors[] = "Please enter a username";
		}
		if($username != "" && strlen($username) < 4)
		{
			$errors[] = "Username has to be at least 4 characters long";
		}
		if($username != "" && !preg_match("/^[a-zA-Z0-9 \-]{0,255}$/i", $username))
		{
			$errors[] = "Please do not enter unacceptable characters into the username field";
		}
		if($password == "")
		{
			$errors[] = "Please enter a password";
		}
		if($password != "" && strlen($password) < 8)
		{
			$errors[] = "Username has to be at least 8 characters long";
		}
		if($password != "" && !preg_match("/^[a-zA-Z0-9 \-]{0,255}$/i", $password))
		{
			$errors[] = "Please do not enter unacceptable characters into the password field";
		}
		if($errors)
		{
			echo "<em>The following problem(s) occured:</em><br />\n";
			for ($a=0; $a < count($errors); $a++)
			{
				echo "$errors[$a] <br />\n";
			}
		}
		else
		{
			$sql = "select * from user where UserName = '$username' and Password = '$password'";			
							
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc())
			{
				$UserID = $row['UserID'];
				$firstname = $row['FirstName'];
				$lastname = $row['LastName'];
				mysqli_close($conn);				
			}
			$count=mysqli_num_rows($result);		
			if($count==1)
			{			
				session_start();
				$_SESSION['sessionUserID']=$UserID;
				$_SESSION['sessionFirstname']=$firstname;
				$_SESSION['sessionLastname']=$lastname;
				echo "<p><b>You are successfully logged in. Click <a href=\"admin.php\">here</a> for admin page.</b></p>";	
				
			}
			else
			{
				if(isset($_POST['username']) && isset($_POST['password']))
				{
					echo "<b>Bad password or username</b>";
					mysqli_close($conn);
				}
			
			}
		}
		?>
		</div>
		</div>

	<?php
	$page->getPageBottom();
?>