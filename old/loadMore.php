<?php
require_once ('MDB2.php');

function addIntervalToDate ($d ="", $format="Y-m-d", $interval )
{
    if ($d =="") 
        $d=date("Y-m-d");
    return date($format, mktime(0,0,0,date('m',strtotime($d)), date('d',strtotime($d))+$interval, date('Y',strtotime($d)) ));
}

$monday = addIntervalToDate ( $_REQUEST['latestDate'], "Y-m-d", 1 );
$sundayNextWeek = addIntervalToDate ( $monday, "Y-m-d", 6);
$eventList = array();
$dateList = array();
$latestDate = $sundayNextWeek;

$dateList [] = $monday;
$dateFriendlyList[] = date('d F', strtotime($monday));

$eventList[$monday] = array();
//use add interval function
    for ( $i = 1 ; $i < 7 ; $i++)
    {
        $dateInterval=addIntervalToDate ( $monday, "Y-m-d", $i) ;
        $eventList[$dateInterval] = array();

        $dateList[] = $dateInterval;
        $dateFriendlyList[] = date('d F', strtotime($dateInterval));    
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
        //echo $row['eventdate'];
        $eventDate = $row['eventdate'];
        //echo $eventDate."#"."QWEQWEQWEEW";
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
                            "eventDate" => $row['eventdate']
                           );
    }
   
    $count = 0;
   //print_r( $eventList);


    echo $latestDate."#";
    echo "<div class='row event-timetable add-bottom'>";
    echo "<div class='event-row-span '>";
    foreach ( $eventList as $events )
    {
    	$date =  $dateList[$count];
        $friendlyDate = $dateFriendlyList[$count];
    	$count += 1;

        echo "<div class='event-timetable-individual well text-left'>";
    	echo "<p><a class='btn-small btn-info' href='events-date.php?date=$date'>$friendlyDate</a></p>";
        echo "<br/>";

    	foreach ( $events as $event )
    	{
    		$id = $event['id'];
    		$title = $event['eventTitle'];
    		$category = $event['category'];
    		echo "<p><a href='event-details.php?id=$id' class='$category'>$title</a></p>";
            echo "<br/>";
    	}
        echo "</div>";

    }
    echo "</div>";
    echo "<div class='clear-float'></div>";
    echo "</div>";

?>