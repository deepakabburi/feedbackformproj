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

$rat = "INSERT INTO gitam1 (Student,Attendance) VALUES ('sarat','19')";
mysql_query($rat,$con);                     
mysql_close($con);  
?>
