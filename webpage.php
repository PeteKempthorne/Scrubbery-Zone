<?php 

	// require the class definition file
	require_once( "webpage.class.php" );
	
	// create a new instance of the webpage class passing the title and an array of stylesheets to the constructor
	$page = new Webpage( "The Scrubbery Zone - Total Nub Since the 80's", "/PetePrime/css/style.css", "", "", "");
	
	// echo the page contents back to the browser
	$page->getPageTop();
	$page->getNav();
	$page->getMainTop();

	?>
	<div class="row no-pad">
		<div class="col-9 articleTitle">
		<h4>Contact Pete</h4>
		</div>
		<div class="col-3 articleDate">29th April 2018</div>				
		</div>
		<div class="col-lg-12 articleImage">
		<img src="/PetePrime/img/Rimworld-RIP-Birds.png" class="img-fluid"/>
	</div>	
	<div class="col-lg-12 articleText">	
		<p>			
			Page under contruction
		</p>
	</div>
	<?php
	$page->getMainBottom();
	$page->getPageBottom();
?>