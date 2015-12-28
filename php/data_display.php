<html>
<body>
<?php
$con=mysql_connect("localhost","root","");
if (mysql_select_db("sarat",$con))
{
    echo "database selected";
}
else 
{
    echo "db not selected". mysql_error();
}

$rat = "SELECT * FROM gitam1";
$data=mysql_query($rat,$con);
echo "<table border=1>
<tr>
<th>Name</th>
<th>Attendance</th>
</tr>";
while($record=mysql_fetch_array($data))               
{
    echo "<tr>";
    echo "<td>" . $record['Student'] . "</td>";
    echo "<td>" . $record['Attendance'] . "</td>" ;
    echo "</tr>";
    
} 
echo "</table>";                    
mysql_close($con);  
?>
</body>
</html>
