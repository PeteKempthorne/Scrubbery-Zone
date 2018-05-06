<?php 

	// require the class definition file
	require_once( "webpage.class.php" );
	
	// create a new instance of the webpage class passing the title and an array of stylesheets to the constructor
	$page = new Webpage( "The Scrubbery Admin Zone - Total Nub Since the 80's", "css/style.css", "", "", "");
	
	// echo the page contents back to the browser
	$page->getPageTop();
	$page->getNav();	
	
		session_destroy();
	?>
		<p><b>You are successfully logged out. Click <a href="login.php">here</a> to login.</b></p>	
	<?php 	
	$page->getPageBottom();
?>