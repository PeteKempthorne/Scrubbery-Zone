<?php 

	// require the class definition file
	require_once( "../../../../webpage.class.php" );
	//include the database file
	include '../../../../database_conn.php';	
	//title and date are taken from the form on add_article and sent through the js and articleprocess files
	$artTitle = "{title}";
	$artContent = "{posttext}";
	//Title and date check incase on the off chance 2 articles ahve the same name
	$sql = "SELECT * FROM article WHERE Title = '$artTitle' AND CONTENT = '$artContent'";		
	//$sql = "SELECT * FROM article WHERE Title = '$artTitle'";		
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc())
	{
		
		$title = $row['Title'];
		$date = $row['Date'];
		$image = $row['Image'];
		$content = $row['Content'];
		$metaTags = $row['MetaTags'];
		$metaDesc = $row['MetaDesc'];		
	}
	//counts how many rows were retrived from database. Should be 1
	$count=mysqli_num_rows($result);
	//close connection to db as it is no longer needed
	mysqli_close($conn);
	//if statement to determine what is created on the webpage.
	if($count==1)
	{	
		// create a new instance of the webpage class passing the title and an array of stylesheets to the constructor
		$page = new Webpage( "".$title." - The Scrubbery Zone", "../../../../css/style.css", "", "".$metaTags."", "".$metaDesc."");
		
		// echo the page contents back to the browser
		$page->getPageTop();
		$page->getNav();
		$page->getMainTop();
		
		echo "<div class=\"row no-pad\">";
		echo "	<div class=\"col-9 articleTitle\">";
		echo "	<h4>$title</h4>";
		echo "</div>";
		echo "	<div class=\"col-3 articleDate\">$date</div>";					
		echo "</div>";
		echo "<div class=\"col-lg-12 articleImage\">";
		echo "  <img src=\"/img/$image\" class=\"img-fluid\" alt=\"$title\" />";	
		echo "</div>";	
		echo "<div class=\"col-lg-12 articleText\">";	
		echo "$content";		
		echo "</div>";	
		
		$page->getMainBottom();
		$page->getPageBottom();
	}
	else
	{
		echo "<p>Lol no</p>";
	}
?>