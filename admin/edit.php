<? 
include('config.php'); 
if (isset($_GET['id']) ) { 
$id = (int) $_GET['id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `event` SET  `eventID` =  '{$_POST['eventID']}' ,  `eventTitle` =  '{$_POST['eventTitle']}' ,  `eventCategory` =  '{$_POST['eventCategory']}' ,  `eventDate` =  '{$_POST['eventDate']}' ,  `eventTime` =  '{$_POST['eventTime']}' ,  `eventShortDescription` =  '{$_POST['eventShortDescription']}' ,  `eventDescription` =  '{$_POST['eventDescription']}' ,  `eventCoverImage` =  '{$_POST['eventCoverImage']}' ,  `eventImage` =  '{$_POST['eventImage']}' ,  `isHot` =  '{$_POST['isHot']}' ,  `isPublished` =  '{$_POST['isPublished']}' ,  `count` =  '{$_POST['count']}' ,  `updated` =  '{$_POST['updated']}'   WHERE `id` = '$id' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `event` WHERE `id` = '$id' ")); 
?>

<form action='' method='POST'> 
<p><b>EventID:</b><br /><input type='text' name='eventID' value='<?= stripslashes($row['eventID']) ?>' /> 
<p><b>EventTitle:</b><br /><input type='text' name='eventTitle' value='<?= stripslashes($row['eventTitle']) ?>' /> 
<p><b>EventCategory:</b><br /><input type='text' name='eventCategory' value='<?= stripslashes($row['eventCategory']) ?>' /> 
<p><b>EventDate:</b><br /><input type='text' name='eventDate' value='<?= stripslashes($row['eventDate']) ?>' /> 
<p><b>EventTime:</b><br /><input type='text' name='eventTime' value='<?= stripslashes($row['eventTime']) ?>' /> 
<p><b>EventShortDescription:</b><br /><textarea name='eventShortDescription'><?= stripslashes($row['eventShortDescription']) ?></textarea> 
<p><b>EventDescription:</b><br /><textarea name='eventDescription'><?= stripslashes($row['eventDescription']) ?></textarea> 
<p><b>EventCoverImage:</b><br /><input type='text' name='eventCoverImage' value='<?= stripslashes($row['eventCoverImage']) ?>' /> 
<p><b>EventImage:</b><br /><textarea name='eventImage'><?= stripslashes($row['eventImage']) ?></textarea> 
<p><b>IsHot:</b><br /><input type='text' name='isHot' value='<?= stripslashes($row['isHot']) ?>' /> 
<p><b>IsPublished:</b><br /><input type='text' name='isPublished' value='<?= stripslashes($row['isPublished']) ?>' /> 
<p><b>Count:</b><br /><input type='text' name='count' value='<?= stripslashes($row['count']) ?>' /> 
<p><b>Updated:</b><br /><input type='text' name='updated' value='<?= stripslashes($row['updated']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<? } ?> 
