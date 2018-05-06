<?php 

	// require the class definition file
	require_once( "webpage.class.php" );
	
	// create a new instance of the webpage class passing the title and an array of stylesheets to the constructor
	$page = new Webpage( "The Scrubbery Zone - Total Nub Since the 80's", "css/style.css", "", "SupremoPete, Goramoth, Noximous, the scrubbery zone, pc gaming, pc games, indie games, 2018, dead air invitational", "Welcome to The Scrubbery Zone. An independant site focused on gaming and in particular games I myself enjoy.");
	
	// echo the page contents back to the browser
	$page->getPageTop();
	$page->getNav();
	$page->getContentFront();
	$page->getNews();
	//content here
	?>
	<?php 
	//$page->getEndContent();
	$page->getPageBottom();
?>