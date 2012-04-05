<? 
include('config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>EventID</b></td>"; 
echo "<td><b>EventTitle</b></td>"; 
echo "<td><b>EventCategory</b></td>"; 
echo "<td><b>EventDate</b></td>"; 
echo "<td><b>EventTime</b></td>"; 
echo "<td><b>EventShortDescription</b></td>"; 
echo "<td><b>EventDescription</b></td>"; 
echo "<td><b>EventCoverImage</b></td>"; 
echo "<td><b>EventImage</b></td>"; 
echo "<td><b>IsHot</b></td>"; 
echo "<td><b>IsPublished</b></td>"; 
echo "<td><b>Count</b></td>"; 
echo "<td><b>Updated</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `event`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['eventID']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['eventTitle']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['eventCategory']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['eventDate']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['eventTime']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['eventShortDescription']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['eventDescription']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['eventCoverImage']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['eventImage']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['isHot']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['isPublished']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['count']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['updated']) . "</td>";  
echo "<td valign='top'><a href=edit.php?id={$row['id']}>Edit</a></td><td><a href=delete.php?id={$row['id']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php>New Row</a>"; 
?>