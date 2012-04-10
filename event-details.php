<?php
require_once ('config.php');
require ('smarty_setup.php');
require_once ('MDB2.php');

//init smarty
$smarty = new MySmarty();

//check or reject input
$id = "";

//if empty or not set
if ( !isset ( $_GET['id'] ) || empty ( $_GET['id'])  )
{
    $id =  -1;
}
else
{
    //check whether input is correct
    $id = $_GET['id'];
}

//update count

require_once ('db_param.php');
     

$db = MDB2::connect($dsn);

  
if ( PEAR::isError( $db ) )
{        
    die ( $db->getMessage() . ', ' . $db->getDebugInfo());
}

$sql = "UPDATE event SET count = count + 1 ";
$sql .= "WHERE eventID = $id";


if ( PEAR::isError ( $db->exec($sql) ) )
{
    die ( $res->getMessage(). "|". $sql );
}

//disconnect database
$db->disconnect();

//no cache available
if ( !$smarty->isCached('events-details.tpl' ,  $id) )
{
	
     
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
    $sql =  'SELECT * FROM event '; 
    $sql .= "WHERE eventID = $id AND isPublished = 1 ";
    $sql .= 'ORDER BY updated '; 
	
	//process query
    $res = $db->query ( $sql );

    if ( PEAR::isError ( $res ) )
    {
        die ( $res->getMessage(). "|". $sql );
    }

    //disconnect database
    $db->disconnect();
	
    //load database for items to be shown
    $eventDetails = array ();
    
    //sentinel for not found
    $isFound = false;

	while ( $row = $res->fetchRow() )
    {
        //cek for image existance
        $imgPath = STATIC_PATH."/events/".$row ['eventcoverimage'];


        if ( !file_exists($imgPath) )
            $imgPath = "img/notfound.png";

        $imagesPath = $row['eventimage'];

        $imagesPath = explode(':', $imagesPath);

        for ( $i = 0 ; $i < count( $imagesPath) -  1 ; $i++ )
        {
            $tempPath = STATIC_PATH."/events/".$imagesPath[$i];

            if ( !file_exists($tempPath) )
                $imagesPath[$i] = "img/notfound.png";
            else
                $imagesPath[$i] = $tempPath;
        }

        //check whether no gallery images
        if ( empty ($imagesPath[0]) )
        {
            $imagesPath = null;
        }

        //portability options is on, so collumn must be all in LC
        $eventDetails [] =  array(  

                                    "id" => $row['eventID'],
                                    "eventTitle" => $row['eventtitle'],
                                    "eventDate" => $row['eventdate'],
                                    "location1" => $row['location1'],
                                    "location2" => $row['location2'],
                                    "eventCoverImage" =>  $imgPath,
                                    "eventDescription"=> $row['eventdescription'],
                                    "eventShortDescription"=> $row['eventshortdescription'],
                                    "isHot" => $row['ishot'],
                                    "count" => $row['count'],
                                    "info" => $row['info'],
                                    "gallery" => $imagesPath,
                                    "updated" => $row['updated']
                                    
                                 );
        $isFound = true;
    }
    $smarty->assign("isFound",$isFound);
    //assign item
    $smarty->assign("eventDetails",$eventDetails);
  
}


//display it
$smarty->display('event-details.tpl', $id);

?>