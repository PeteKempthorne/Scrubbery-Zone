<?php 

	// require the class definition file
	require_once( "webpage.class.php" );
	
	// create a new instance of the webpage class passing the title and an array of stylesheets to the constructor
	$page = new Webpage( "The Scrubbery Zone", "css/style.css", "", "", "");
	
	// echo the page contents back to the browser
	$page->getPageTop();
	$page->getNav();

	
	if(isset($_SESSION['sessionFirstname']) && isset($_SESSION['sessionLastname']))
	{
	?>
		<br />
			<div class="row no-pad row-eq-height">				
				<div class="col-md-9">
			<div class="row no-pad">
				<div class="col-lg-12 articleBar">
					Upload Image
				</div>
			</div>	
		

		<div class="col-lg-12 addArticleForm">
			<FORM action="imgprocess.php" id="imgForm" name="form" method="post" id="form" enctype="multipart/form-data">					
			<div class="form-group">
				<label for="fileToUpload">Select image to upload:</label>
				<input type="file" class="form-control" id="fileToUpload" name="fileToUpload">
			</div>
			<div class="form-group">
				<input type="submit" value="Upload Image" id="submitimg" name="submitimg">
			</div>									
			</form>
		</div>

	<?php
	}
	else
	{
		echo "<strong>You must be logged in to view this. Login <a href=\"loggerz.php\">here</a></strong>";
	}
	
	$page->getMainBottom();
	$page->getPageBottom();
?>