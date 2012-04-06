<?php
require ('smarty_setup.php');
require_once ('MDB2.php');
require_once ('db_param.php');


$smarty = new MySmarty ();

$filter = "";


// process filter
if ( !isset ( $_GET['filter']) || empty ( $_GET['filter']) )
{
	$filter = "";
}
else
{
	$filter = $_GET['filter'];
}


if ( !$smarty->isCached ("filter.php", $filter ))
{

	//query existing filter
	$db = MDB2::connect($dsn);

	//check for DB error
	if ( PEAR::isError( $db ) )
	{
	    die ( $db->getMessage() . ', ' . $db->getDebugInfo());
	}
	$db->setFetchMode(MDB2_FETCHMODE_ASSOC);

	//create query
	$sql =  'SELECT * from category';

	$res = $db->query ( $sql );

	if ( PEAR::isError ( $res ) )
	{
	    die ( $res->getMessage()."#".$sql );
	}

	$filterCode ="";
	$categoryList = array();
	while ( $row = $res->fetchRow() )
	{
		//add to category list
		$categoryList [] = $row['categoryname'];

		if ( $filter == $row['categoryname'])
			$filterCode .="1";
		else
			$filterCode .="_";
	}
	
	$sql =  'SELECT eventTitle, count, eventCoverImage, eventShortDescription, eventID, eventcategory FROM event '; 
    $sql .= "WHERE eventCategory LIKE '%$filterCode%' ";
    $sql .= 'ORDER BY updated '; 

echo $sql;

	//query database for items with the same filter
    $res = $db->query ( $sql );

    if ( PEAR::isError ( $res ) )
	{
	    die ( $res->getMessage()."#".$sql );
	}

	$eventItems = array();

	$isFound = false;

	//pack it into an  array
	while ( $row = $res->fetchRow() )
	{

		$categoryCode = $row['eventcategory'];
      
        $category = '';
        //use the correct category
        for ($i = 0 ; $i < strlen($categoryCode); $i++ )
        {
            //get each char
            $character = substr ($categoryCode, $i, 1);
            
            //append the correct character
            if ( $character == '1' ){
                $category .= $categoryList[$i]." ";
            }
                
        }

		$eventItems [] = array (
				"id" => $row['eventid'],
                            "eventTitle" => $row['eventtitle'],
                            "eventShortDescription"=> $row['eventshortdescription'],
                            "category" => $category,
                            "count" => $row['count'],
                            "eventCoverImage" =>  $imgPath,
                            "eventDate" => $date,
			);

		$isFound = true;
	}


	//assign
	$smarty->assign("eventItems",$eventItems);
    $smarty->assign("isFound", $isFound);
    $smarty->assign("categoryList", $categoryList);
    $smarty->assign("filter", $filter);
}

$smarty->display( 'filter.tpl', $filter);


?>