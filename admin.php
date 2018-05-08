<?php 

	// require the class definition file
	require_once( "webpage.class.php" );
	
	// create a new instance of the webpage class passing the title and an array of stylesheets to the constructor
	$page = new Webpage( "The Scrubbery Admin Zone - Total Nub Since the 80's", "css/style.css", "", "", "");
	
	// echo the page contents back to the browser
	$page->getPageTop();
	$page->getNav();	
	
	if(isset($_SESSION['sessionFirstname']) && isset($_SESSION['sessionLastname']))
	{
		?>		
			<br />
			<div class="row no-pad">
				<div class="col-lg-12 articleBar">
					Admin zone
				</div>
			</div>
			<br />
			<div class="col-lg-12 articleText">	
				<p>
					<ul>
						<li><a href="add-article.php">Add Article</a></li>
						<li><a href="imgupload.php">Upload Image</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</p>
			</div>		
		<?php
	}
	else
	{	
		?>
			<strong>You must be logged in to view this. Login <a href="login.php">here</a></strong>
		<?php
	}
	?>
	<?php 
	
	$page->getPageBottom();
?>