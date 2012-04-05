<? 
include('config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `event` ( `eventID` ,  `eventTitle` ,  `eventCategory` ,  `eventDate` ,  `eventTime` ,  `eventShortDescription` ,  `eventDescription` ,  `eventCoverImage` ,  `eventImage` ,  `isHot` ,  `isPublished` ,  `count` ,  `updated`  ) VALUES(  '{$_POST['eventID']}' ,  '{$_POST['eventTitle']}' ,  '{$_POST['eventCategory']}' ,  '{$_POST['eventDate']}' ,  '{$_POST['eventTime']}' ,  '{$_POST['eventShortDescription']}' ,  '{$_POST['eventDescription']}' ,  '{$_POST['eventCoverImage']}' ,  '{$_POST['eventImage']}' ,  '{$_POST['isHot']}' ,  '{$_POST['isPublished']}' ,  '{$_POST['count']}' ,  '{$_POST['updated']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Added row.<br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>EventID:</b><br /><input type='text' name='eventID'/> 
<p><b>EventTitle:</b><br /><input type='text' name='eventTitle'/> 
<p><b>EventCategory:</b><br /><input type='text' name='eventCategory'/> 
<p><b>EventDate:</b><br /><input type='text' name='eventDate'/> 
<p><b>EventTime:</b><br /><input type='text' name='eventTime'/> 
<p><b>EventShortDescription:</b><br /><textarea name='eventShortDescription'></textarea> 
<p><b>EventDescription:</b><br /><textarea name='eventDescription'></textarea> 
<p><b>EventCoverImage:</b><br /><input type='text' name='eventCoverImage'/> 
<p><b>EventImage:</b><br /><textarea name='eventImage'></textarea> 
<p><b>IsHot:</b><br /><input type='text' name='isHot'/> 
<p><b>IsPublished:</b><br /><input type='text' name='isPublished'/> 
<p><b>Count:</b><br /><input type='text' name='count'/> 
<p><b>Updated:</b><br /><input type='text' name='updated'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
