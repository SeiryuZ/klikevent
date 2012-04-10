<?php

require ('config.php');
require_once ('MDB2.php');
require_once ('db_param.php');
require ('smarty_setup.php');
//get all the remaining post values
$name = $_POST['nama'];
$email = $_POST['email'];
$eventTitle = $_POST['eventTitle'];
$location1 = $_POST['location1'];
$location2 = $_POST['location2'];
$category = $_POST["category"];
$eventCategory  = "";
$date1 	 = $_POST['date1'];
$eventShortDescription = $_POST['eventShortDescription'];
$eventDescription = $_POST['eventDescription'];
$eventCoverImage = "";
$eventImage="";



// generate the eventCategory variable
$categoryList = array (	"Paid", "Day", "Night", 
						"Art and Hobby", "Exhibition",
						"Education","Others");

foreach ( $categoryList as $categoryItem )
{
	$found = false;

	foreach ( $category as $inputtedCategory )
	{
		if ( strcasecmp( $categoryItem, $inputtedCategory) == 0 )
		{
			$eventCategory .= "1";
			$found = true;
		}

		if ( $inputtedCategory == "all day" && 
			($categoryItem == "day" || $categoryItem == "night") )
		{
			$eventCategory .= "1";
			$found = true;
		}

		if ( $found )
			break;
	}

	if ( !$found )
		$eventCategory .="0";
}




$imgList = array();

//GET ALL THE IMAGE FILE NAMES
$index = 0;
foreach ( $HTTP_POST_FILES['imgfile'] ['name'] as $imgName )
{
	if ( isset ( $imgName ) && !empty ($imgName) )
	{
		$imgList[] = array ( $imgName , $index );
	}

	$index++;
}


//generate folder name
$foldername = md5($name.$email.date('l jS \of F Y h:i:s A'));

//make folder name
if (! mkdir (STATIC_PATH."/events/"."$foldername" ) )
{
	die ("Fail to make folder");
}

foreach ( $imgList as $img )
{	
	//generate path
	$path = STATIC_PATH."/events/"."$foldername/".$img[0];
	//copy the file
	copy($HTTP_POST_FILES['imgfile']['tmp_name'][$img[1]], $path);
	

if ( $img[1] == 0 )
		$eventCoverImage = "$foldername/".$img[0];
	else
		$eventImage .= "$foldername/".$img[0].":";
}




//insert into database
$sql = "INSERT INTO tips_event_owner ";
$sql .= " (eventTitle, eventCategory, eventDate, ";
$sql .= " location1, location2, eventShortDescription, ";
$sql .= " eventDescription, eventCoverImage, eventImage, ";
$sql .= " tipsCPName, tipsCPEmail ) VALUES ";
$sql .= "( '$eventTitle', 
				  	'$eventCategory', 
				  	'$date1',
				  	'$location1',
				  	'$location2',
				  	'$eventShortDescription',
				  	'$eventDescription',
				  	'$eventCoverImage',
				  	'$eventImage',
				  	'$name',
				  	'$email'  )";




$db = MDB2::connect($dsn);

//check for DB error
if ( PEAR::isError( $db ) )
{
	die ( $db->getMessage() . ', ' . $db->getDebugInfo());
}


$result = $db->exec($sql);



if (PEAR::isError($result)) {
die ( $result->getMessage()."<hr/>".$result->getUserInfo());
}

//disconnect database
$db->disconnect();
//init smarty
$smarty = new MySmarty();

$smarty->display ('thanks.tpl');






?>