<?php
require ('smarty_setup.php');
require_once ('MDB2.php');


function findMonday($d="",$format="Y-m-d") {
    if($d=="") 
        $d=date("Y-m-d");
    $delta = date("w",strtotime($d)) - 1;
    if ($delta <0) 
        $delta = 6;
    return date($format, mktime(0,0,0,date('m',strtotime($d)), date('d',strtotime($d))-$delta, date('Y',strtotime($d)) ));
}


function addIntervalToDate ($d ="", $format="Y-m-d", $interval )
{
    if ($d =="") 
        $d=date("Y-m-d");
    return date($format, mktime(0,0,0,date('m',strtotime($d)), date('d',strtotime($d))+$interval, date('Y',strtotime($d)) ));
}


//init smarty
$smarty = new MySmarty();

//check or reject input
$date = "";

//if empty or not set
if ( !isset ( $_GET['date'] ) || empty ( $_GET['date'])  )
{
    $date =  date ( "d-m-Y" );
}
else
{
    //check whether input is correct
    $date = $_GET['date'];
}




///no cache available
if ( !$smarty->isCached('events.tpl', $date ))
{

    //get the monday and next two monday
    $monday = findMonday($date, "Y-m-d");
    $sundayNextWeek = addIntervalToDate($monday, "Y-m-d", 6);
   

    //prepare the list of dates to be queried
    $eventList = array();
    $eventList[$monday] = array();

    $dateList = array();
    $dateList[] = date('d F', strtotime($monday));

    $latestDate = $sundayNextWeek;
   
    //use add interval function
    for ( $i = 1 ; $i < 7 ; $i++)
    {
        $dateInterval                =addIntervalToDate ( $monday, "Y-m-d", $i);
        $eventList[$dateInterval] = array();
        $dateList[] = date('d F', strtotime($dateInterval));
       
        
    }
    



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
    $sql =  'SELECT eventID, eventTitle, eventDate, eventCategory FROM event '; 
    $sql .= "WHERE eventDate >= '$monday' AND eventDate <= '$sundayNextWeek' ";
    $sql .= "AND isPublished = 1 ";
    $sql .= 'ORDER BY updated '; 
  
    //process query
    $res = $db->query ( $sql );

    if ( PEAR::isError ( $res ) )
    {
        die ( $res->getMessage() );
    }

    //get category
    $sql = 'SELECT * FROM category ';

    $res2 = $db->query( $sql );

    if ( PEAR::isError ( $res2 ) )
    {
        die ( $res->getMessage()."#".$sql );
    }

    $categoryList = array();
    //pack category
    while ( $row = $res2->fetchRow() )
    {
        $categoryList [] = $row['categoryname'];
    }


    //disconnect database
    $db->disconnect();
    
    
    
    while ( $row = $res->fetchRow() )
    {
       
        $eventDate = date('d F', strtotime($row['eventdate']));

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

        
        //$eventList[$eventDate] [] = array("1","2","3");
        //in order to ensure portability of MDB2 package, all column name become lower case
        $eventList [$eventDate] [] = array ( 
                            "id" => $row['eventid'],
                            "eventTitle" => $row['eventtitle'],
                            "category"=> $category,
                           );
    }
    
                
    //assign item
    $smarty->assign("eventList",$eventList);
    $smarty->assign("dateList", $dateList);
    $smarty->assign("categoryList", $categoryList);
    $smarty->assign("latestDate", $latestDate);
    $smarty->assign("todayDate", $date);

    $smarty->assign("todayFriendlyDate",date('d F', strtotime($date)) );
   




}

//display it
$smarty->display('events.tpl', $date );
?>
