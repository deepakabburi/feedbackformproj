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
if (isset($_POST['update'])){
$updatequery = "UPDATE gitam1 SET Student='$_POST[student]', Attendance='$_POST[attendance]' WHERE Student='$_POST[hidden]'";
mysql_query($updatequery,$con); 
    
};

$rat = "SELECT * FROM gitam1";
$data=mysql_query($rat,$con);

echo "<table border=1>
<tr>
<th>Name</th>
<th>Attendance</th>
</tr>";
while($record=mysql_fetch_array($data))
{
    echo "<form action=db_update.php method=post>";
    echo "<tr>";
    echo "<td>" . "<input type=text name=student value=" . $record['Student'] . " </td>";
    echo "<td>" . "<input type=text name=attendance value=" . $record['Attendance'] . " </td>" ;
    echo "<td>" . "<input type=hidden name=hidden value=" . $record['Student'] . " </td>";
    echo "<td>" . "<input type=submit name=update value=update" . " </td>";
    echo "</tr>";
    echo "</form>";
    
} 
echo "</table>";                    
mysql_close($con);  
?>
</body>
</html>
