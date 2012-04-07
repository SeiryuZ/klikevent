<?php
require_once ('config.php');
require_once ('smarty_setup.php');
require_once ('MDB2.php');


//init smarty
$smarty = new MySmarty();

//no cache available
if ( !$smarty->isCached('index.tpl') )
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
    $sql =  'SELECT eventID, eventTitle, eventDate, count, eventCoverImage, eventShortDescription FROM event '; 
    $sql .= 'WHERE isHot = 1 AND isPublished = 1 ';
    $sql .= 'ORDER BY count DESC '; 

    //process query
    $res = $db->query ( $sql );

    if ( PEAR::isError ( $res ) )
    {
        die ( $res->getMessage()."#".$sql );
    }

    //disconnect database
    $db->disconnect();
    
    //add items to hot items array
    $hotItems = array ( );

    while ( $row = $res->fetchRow() )
    {
        //cek for image existance
        $imgPath = STATIC_PATH."/".$row ['eventcoverimage'];
        
        if ( !file_exists( $imgPath ) )
            $imgPath = "notfound.png";

        $date = date('d F', strtotime($row['eventdate']));
    
        
        //in order to ensure portability of MDB2 package, all column name become lower case
        $hotItems [] = array (  "id" =>$row['eventid'],
                                "eventTitle" => $row['eventtitle'],
                                "eventCoverImage" =>  $imgPath,
                                "eventShortDescription" =>  $row['eventshortdescription'],
                                "count" => $row['count'],
                                "eventDate" => $date,
                         );
        

    }
  
    //assign hot item
    $smarty->assign("hotItems", $hotItems);

    
}

//display it
$smarty->display('index.tpl');
?>
