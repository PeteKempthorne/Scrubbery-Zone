<?php 

	// require the class definition file
	require_once( "webpage.class.php" );
	
	// create a new instance of the webpage class passing the title and an array of stylesheets to the constructor
	$page = new Webpage( "The Scrubbery Zone - Total Nub Since the 80's", "css/style.css", "js/newarticle.js", "", "");
	
	// echo the page contents back to the browser
	$page->getPageTop();
	$page->getNav();
	?>
	
		
	<?php
	if(isset($_SESSION['sessionFirstname']) && isset($_SESSION['sessionLastname']))
	{
	?>
	<br />
	<div class="row no-pad">
		<div class="col-lg-12 articleBar">
			New Article
		</div>
	</div>
	<br />
	
	<div class="row no-pad">
	<div class="col-lg-12 addArticleForm">
		<FORM id="artForm" name="form">		
		<div class="form-group">
			<label for="title">Article title</label>
			<input type="text" class="form-control" id="title" name="title" placeholder="Enter article title">
		</div>
		
		<div class="form-group">
			<label for="image">Image link</label>
			<input type="text" class="form-control" id="image" name="image" placeholder="Enter image">
		</div>

		<div class="form-group">
			<label for="metaTags">Meta tags</label>
			<input type="text" class="form-control" id="metaTags" name="metaTags" placeholder="Enter tags">
		</div>

		<div class="form-group">
			<label for="metaDesc">Meta description</label>
			<input type="text" class="form-control" id="metaDesc" name="metaDesc" placeholder="Enter meta description">
		</div>
			
		<div class="form-group">
			<label for="posttext">Content</label>
			<textarea class="form-control" id="posttext" name="posttext" rows="8"></textarea>
		</div>
		<div class="form-group">
			<input type="button" value="Submit" id="submitnew">
		</div>			
			
		<div id="error">
		</div>
		</form>
	</div>
	</div>
	<?php
	}
	else
	{
		echo "<strong>You must be logged in to view this. Login <a href=\"login.php\">here</a></strong>";
	}
	?>

	<?php
	$page->getPageBottom();
?>