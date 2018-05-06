<?php

//results from our form
$title = $_POST['title'];
$image = $_POST['image'];
$metaTags = $_POST['metaTags'];
$metaDesc= $_POST['metaDesc'];
$posttext = $_POST['posttext'];

$date = date("Y-m-d H:i:s");
$dateYear = date("Y");
$dateMonth = date("m");
$dateDay = date("d");

	// doing this here as well so I can enter into the DB. Not the best but it works
	$urlreplace = preg_replace('/[^A-Za-z0-9 \-]/', '', $title);		
	$url2 = str_replace(' ', '-', $urlreplace);
	$url = $dateYear."/".$dateMonth."/".$dateDay."/".$url2;
	//opens db from our db connect file
	include 'database_conn.php';

	//our SQL statement	
	$sql = "INSERT INTO `article` (`Title`, `Image`, `MetaTags`, `MetaDesc`, `Content`, `Date`, `PageLink`) VALUES ('" .  $title . "', '" .  $image . "', '" .  $metaTags . "', '" .  $metaDesc . "', '" .  $posttext . "', '" .  $date . "', '" .  $url . "')";
			
	$result = $conn->query($sql);						
	if($result)
	{
		ini_set('error_reporting', E_ALL);
		print 'Success! Article added.'; 
		//array of our form data
		$data['title'] = $title;
		$data['image']= $image;
		$data['metaTags'] = $metaTags;
		$data['metaDesc'] = $metaDesc;
		$data['posttext'] = $posttext;	
		$data['date'] = $date;
		//PHP file that will be created using the data variables
		$tpl_file = "../../../../articlewebpage.php";
		//directory or path
		$tpl_path = "article/".$dateYear."/".$dateMonth."/".$dateDay."/";
		mkdir($tpl_path, 0755);
		//placeholder array to use the variables on the created page
		$placeholders = array("{title}", "{image}", "{metaTags}", "{metaDesc}", "{posttext}", "{date}");
		//gets contents of the page as defined before
		$tpl = file_get_contents($tpl_path.$tpl_file);
		//replace placeholder array characters in the tpl file with the data values from above
		$new_member_file = str_replace($placeholders, $data, $tpl);
		//replace everything except numbers, letter and spaces with nothing
		$pagereplace = preg_replace('/[^A-Za-z0-9 \-]/', '', $data['title']);		
		//Dont want spaces in the URL
		$page = str_replace(' ', '-', $pagereplace);
		//add .php to file name
		$html_file_name = $page.".php";
		//opens our new filename. W is for write only
		$fp = fopen($tpl_path.$html_file_name, 'w'); 
		//writes to the file just opened. $new_member_file holds all the code
		fwrite($fp, $new_member_file); 
		//closes the file
		fclose($fp);		
		//closes db connection
		mysqli_close($conn);
	}
	else
	{
		print 'Error : ('. $mysqli->errno .') '. $mysqli->error;
		mysqli_close($conn);
	}


?>