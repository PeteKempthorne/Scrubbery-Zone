<?php 

	// require the class definition file
	require_once( "../../../../webpage.class.php" );
	
	// create a new instance of the webpage class passing the title and an array of stylesheets to the constructor
	$page = new Webpage( "The Dead Air Invitational - The Scrubbery Zone", "../../../../css/style.css", "", "", "");
	
	// echo the page contents back to the browser
	$page->getPageTop();
	$page->getNav();
	$page->getMainTop();
	
	include '../../../../database_conn.php';		
	$title = "The Dead Air Invitational";
	$sql = "SELECT * FROM article WHERE Title = '$title'";			
	$result = $conn->query($sql);
			
	while($row = $result->fetch_assoc())
	{
		$title = $row['Title'];
		$date = $row['Date'];
		$image = $row['Image'];
		$content = $row['Content'];
		$metaTags = $row['MetaTags'];
		$metaDesc = $row['MetaDesc'];
		
		echo "<div class=\"row no-pad\">";
		echo "	<div class=\"col-9 articleTitle\">";
		echo "	<h4>$title</h4>";
		echo "</div>";
		echo "	<div class=\"col-3 articleDate\">$date</div>";					
		echo "</div>";
		echo "<div class=\"col-lg-12 articleImage\">";
		echo "  <img src=\"/img/$image\" class=\"img-fluid\"/>";	
		echo "</div>";	
		echo "<div class=\"col-lg-12 articleText\">";	
		echo "$content";		
		echo "</div>";
	}	
	mysqli_close($conn);
	
	$page->getMainBottom();
	$page->getPageBottom();
?>