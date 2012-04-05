<?php
require ('smarty_setup.php');
require_once ('MDB2.php');

//init smarty
$smarty = new MySmarty();

//check or reject input
$date = "";


//if empty or not set
if ( !isset ( $_GET['date'] ) || empty ( $_GET['date'])  )
{

    $date =  date ( "Y-m-d" );


}
else
{
    //check whether input is correct
    $date = $_GET['date'];
}


function addIntervalToDate ($d ="", $format="Y-m-d", $interval )
{
    if ($d =="") 
        $d=date("Y-m-d");
    return date($format, mktime(0,0,0,date('m',strtotime($d)), date('d',strtotime($d))+$interval, date('Y',strtotime($d)) ));
}


$prevDate = addIntervalToDate($date, "Y-m-d", -1);
$nextDate = addIntervalToDate($date, "Y-m-d", 1);


//no cache available
if ( !$smarty->isCached('events-date.tpl', $date) )
{
	//database configuration
    require_once ('db_param.php');
     
    //load database for hot item
    $db = MDB2::connect($dsn);

    //check for DB error
    if ( PEAR::isError( $db ) )
    {
        die ( $db->getMessage() . ', ' . $db->getDebugInfo());
    }

    //set to get associative array
    $db->setFetchMode(MDB2_FETCHMODE_ASSOC);
	
	//create query
    $sql =  'SELECT eventTitle, count, eventCoverImage, eventShortDescription, eventID, eventcategory FROM event '; 
    $sql .= "WHERE eventDate = '$date' ";
    $sql .= 'ORDER BY updated '; 
	
	//process query
    $res = $db->query ( $sql );

    if ( PEAR::isError ( $res ) )
    {
        die ( $res->getMessage()."#".$sql );
    }

    //get category
    $sql = 'SELECT * FROM category ';

    $res2 = $db->query( $sql );

    if ( PEAR::isError ( $res2 ) )
    {
        die ( $res->getMessage()."#".$sql );
    }


    //disconnect database
    $db->disconnect();
	
    //load database for items to be shown
    $eventItems = array ();

    $isFound = false;

    $categoryList = array();
    //pack category
    while ( $row = $res2->fetchRow() )
    {
        $categoryList [] = $row['categoryname'];
    }

    
	while ( $row = $res->fetchRow() )
    {
        //cek for image existance
        $imgPath = $row ['eventcoverimage'];

        if ( !file_exists($imgPath) )
            $imgPath = "img/notfound.png";
        

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
     
        

        //in order to ensure portability of MDB2 package, all column name become lower case
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
                       
    //assign item
    $smarty->assign("eventItems",$eventItems);
    $smarty->assign("isFound", $isFound);
    $smarty->assign("categoryList", $categoryList);
   
    
}


$smarty->assign ("prevDate", $prevDate);
$smarty->assign ("nextDate", $nextDate);
$smarty->assign("date", date('d F', strtotime($date)));

//display it
$smarty->display('events-date.tpl', $date);
?>
