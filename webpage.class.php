<?php

class Webpage
//starts webpage class
{
	//private variables to be used in the constructor
   	private $stylesheet;
	private $title; 
	private $script;
	private $scriptTwo;
	private $scriptThree;
	
	function __construct($title, $stylesheet, $script, $metaTags, $metaDesc)
	//The constructor
	{
		$this->title = $title;
		$this->styles = $stylesheet;
		$this->script = $script;
		$this->metaTags = $metaTags;
		$this->metaDesc = $metaDesc;
	}//end of constructor
	
	function displayHeadFirst()
	{
		//starts the function to display the first part of the head section
		//ending the PHP so that I don't have to echo all the HTML and use backslahses in front of quotes
		?><?php
		//Session start for admin login
session_start();
?>
 <!--
Peter Kempthorne 2018
Version 1.0
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	 <?php
	}//end of head meta zone 

	function displayMeta()
	{
		//starts the function to display the page title
		echo "<meta name=\"keywords\" content=\"\">\n";
		echo "<meta name=\"description\" content=\"\">\n";
		echo "<meta charset=\"UTF-8\">\n";
		echo "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n";
		echo "<meta name=\"viewport\" content=\"width = device-width, initial-scale = 1\">\n";
		
	}//end of title
	
	function displayTitle()
	{
		//starts the function to display the page title
		echo "<title>$this->title</title>\n";
		
	}//end of title
	
	function displayStyle()
	{
		//starts the function to display stylesheets. Bootsrap is required. Fonts added as well
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$this->styles\" />\n";
		echo "<link rel=\"Stylesheet\" type=\"text/css\" href=\"/css/bootstrap.css\" />\n";
		echo "<link rel=\"Stylesheet\" type=\"text/css\" href=\"https://fonts.googleapis.com/css?family=Do Hyeon\" />\n";
		
	}//end of style
	
	function displayScript()
	{
		//starts the function to link the javascript
		echo "<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>\n"; 
		echo "<script src=\"/js/bootstrap.min.js\"></script>\n";
		echo "<script src=\"$this->script\"></script>\n";
		
	}//end of script
			    	
	    
	function displayHeadSecond()
	{
		//starts the function to display the end of the head section
		?>
            </head>
			<body>
			<div class="container">
        <?php
	}//end of head and beginning of body and main container
	 	
	
	function displayNav()
	{
	//starts the function to display the page nav area        
	?>	
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container-fluid">
			<div class="logo-lg d-none d-md-block">
				<a href="https://www.thescrubberyzone.com"><img src="/img/logo1.png" alt="Logo" class="img-fluid"></a>		
			</div>	
			<div class="logo-sm d-sm-block d-md-none mx-auto">
				<a href="https://www.thescrubberyzone.com"><img src="/img/logo1small.png" alt="Logo" class="img-fluid"></a>		
			</div>			
			<div class="navbar-header"> 
			  <!-- Button that toggles the navbar on and off on small screens -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>		
			</div>
		  
			<!-- Nav links that go inside the collapsable menu when small screen or outside as normal links when not-->
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a href="/about.php">About Me</a></li>
						<li class="nav-item"><a href="/contact.php">Contact</a></li>
						<?php
						//If I am logged in it will show a link to the admin zone
						if(isset($_SESSION['sessionFirstname']) && isset($_SESSION['sessionLastname']))
						{
							echo "<li class=\"nav-item\"><a href=\"/admin.php\">Admin</a></li>";
						}
						?>
					</ul>
				</div>
			</div>
		</nav>  
	


	<?php 
	}
 
	function displayContentFront()
	{
		//HTML start below PHP end tag          
		 ?>
		 
		<?php 
	} 	

	function displayNews()
	{
		
				
		?>
		
		
			<br />
			<div class="row no-pad row-eq-height"> 
				<div class="col-md-9">
					<div class="row no-pad">
						<div class="col-lg-12 articleBar">
							Latest
						</div>
					</div>
					<?php
					include 'database_conn.php';		
					//Pagination is adapated from a tutorial
					if (isset($_GET['pageno'])) 
					{
						$pageno = $_GET['pageno'];
					} 
					else
					{
						$pageno = 1;
					}		
					$articlesPerPage = 5; // 5 articles per page currently. easily adjusted here	
					$offset = ($pageno - 1) * $articlesPerPage;	//Need this to use as an offest in the SQL query to get data for different pages
					
					$sql2 = "SELECT COUNT(*) FROM article";		
					$result2 = $conn->query($sql2);
					$total_row = mysqli_fetch_row($result2);  
					$totalArticles = $total_row[0]; //number of articles in db
					$totalPages = ceil($totalArticles / $articlesPerPage); //no of record divided by articles per page. Ceil function to round up fractions
					
					$pagSql = "SELECT * FROM article ORDER BY ArticleID DESC LIMIT $offset, $articlesPerPage";
					$ragResult = $conn->query($pagSql);
					while($row = $ragResult->fetch_assoc())
					{
						$title = $row['Title'];
						$date = $row['Date'];
						$image = $row['Image'];
						$content = $row['Content'];
						$linky = $row['PageLink'];						
						
						//Dont want entire article posted to front page so using a shortened bit from the start of the article and then adding a link to click through to the article
						$contentShrink = substr($content, 0, 150);
						echo "<div class=\"row no-pad\">";
						echo "	<div class=\"col-9 articleTitle\">";
						echo "	<h4>$title</h4>";
						echo "</div>";
						echo "	<div class=\"col-3 articleDate\">$date</div>";					
						echo "</div>";
						echo "<div class=\"col-lg-12 articleImage\">";
						//Making the iamge also a link to click through
						echo "  <a href=\"article/$linky.php\"><img src=\"img/$image\" class=\"img-fluid\" alt\"$title\"/></a>";	
						echo "</div>";	
						echo "<div class=\"col-lg-12 articleText\">";	
						echo "	<p>$contentShrink...</p>";	
						echo "	<p><a href=\"article/$linky.php\">Click here to read more...</a></p>";	
						echo "</div>";
					}
					mysqli_close($conn);					
					?>						
					
					<ul class="pagination">
						<li><a href="?pageno=1">First | </a></li>
						<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
							<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev |</a>
						</li>
						<li class="<?php if($pageno >= $totalPages){ echo 'disabled'; } ?>">
							<a href="<?php if($pageno >= $totalPages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"> Next</a>
						</li>
						<li><a href="?pageno=<?php echo $totalPages; ?>"> | Last</a></li>
					</ul>

				</div>					

				<div class="col-lg-3 d-none d-lg-block sideLane">
					<div class="col-lg-12 rightBar">
						Links
					</div>
					<div class="col-lg-12">
						<img src="/img/icons/twittersmall.png" alt="email"> <a href="http://www.twitter.com/supremopete">@SupremoPete</a>
					</div>
					<div class="col-lg-12">
						<img src="/img/icons/ytsmall.png" alt="email"> <a href="http://www.youtube.com/supremopete">SupremoPete</a>
					</div>
					<div class="col-lg-12">
						<img src="/img/icons/mailsmall.png" alt="email"> <a href="mailto:pete@thescrubberyzone.com">pete@thescrubberyzone.com</a>
					</div>
				</div>
				
				<div class="col-md-3 d-none d-md-block d-lg-none sideLane">
					<div class="col-lg-12 rightBar">
						Links
					</div>
					<div class="col-12">
						 <a href="http://www.twitter.com/supremopete"><img src="/img/icons/twittersmall.png" alt="Twitter"></a>
						 <a href="http://www.youtube.com/supremopete"><img src="/img/icons/ytsmall.png" alt="Youtube"></a>
						 <a href="mailto:supremopete@gmail.com"><img src="/img/icons/mailsmall.png" alt="email"></a>
					</div>

				</div>
				
			</div>
		<?php
	}
	
	function displayMainTop()
	{
		?>
			<br />
			<div class="row no-pad row-eq-height">				
				<div class="col-md-9">
			<div class="row no-pad">
				<div class="col-lg-12 articleBar">
					Article
				</div>
			</div>
				
		<?php
	}
	
	function displayMainBottom()
	{
		?>
		</div>
			<div class="col-lg-3 d-none d-lg-block sideLane">
				<div class="col-lg-12 rightBar">
					Links
				</div>
				<div class="col-lg-12">
					<img src="/img/icons/twittersmall.png" alt="email"> <a href="http://www.twitter.com/supremopete">@SupremoPete</a>
				</div>
				<div class="col-lg-12">
					<img src="/img/icons/ytsmall.png" alt="email"> <a href="http://www.youtube.com/supremopete">SupremoPete</a>
				</div>
				<div class="col-lg-12">
					<img src="/img/icons/mailsmall.png" alt="email"> <a href="mailto:pete@thescrubberyzone.com">pete@thescrubberyzone.com</a>
				</div>
			</div>
				
			<div class="col-md-3 d-none d-md-block d-lg-none sideLane">
				<div class="col-lg-12 rightBar">
					Links
				</div>
				<div class="col-12">
					<a href="http://www.twitter.com/supremopete"><img src="/img/icons/twittersmall.png" alt="Twitter"></a>
					<a href="http://www.youtube.com/supremopete"><img src="/img/icons/ytsmall.png" alt="Youtube"></a>
					<a href="mailto:supremopete@gmail.com"><img src="/img/icons/mailsmall.png" alt="email"></a>
				</div>

			</div>
				
		</div>
		<?php
	}
	
	function displayBottom()
	{
		//End of HTML with scripts and footer after rest of stuff is done
		?>	
				<br />
				<div class="container-fluid">
				<div class="row botty">      
					<div class="col-12 bottyCol">
						The Scrubbery Zone 2018 &copy;
					</div>
				</div>
				</div>
				<br />
			</div>
			
			
			</body>
			</html>
		
		<?php
	}
	
   	function getPageTop()
	{	
		//this starts the main function, display, which will display the whole page
		$this -> displayHeadFirst();//displays the first part of the head
		$this -> displayMeta();//displays the meta tags and such
		$this -> displayTitle();//displays the page title
		$this -> displayStyle();//displays the stylesheet
		$this -> displayScript();//displays the scripts
		$this -> displayHeadSecond();//displays the second part of the head and start of body and container div
	}
	
	function getNav()
	{
		$this -> displayNav();//displays the navigation
	}
	
	function getContentFront()
	{
		$this -> displayContentFront();//displays the top splash for index
	}
	
	function getEndContent()
	{
		$this -> displayEndContent();//displays the footer
	}
	
	function getNews()
	{
		$this -> displayNews();//displays the news area
	}
	
	function getMainTop()
	{
		$this -> displayMainTop();//
	}
	
	function getMainBottom()
	{
		$this -> displayMainBottom();//
	}
	
	function getPageBottom()
	{	
		$this -> displayBottom();//displays the rest of the body

	}//end of display functions

}

?>