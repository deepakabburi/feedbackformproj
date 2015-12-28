<html>
<body>
<?php

$con=mysql_connect("localhost","root","");
if (mysql_select_db("feedback",$con))
{
    echo "database selected";
}
else 
{
    echo "db not selected". mysql_error();
}
$rat = "INSERT INTO gitam1 (Student,Attendance) VALUES ('$_POST[student]','$_POST[attendance]')";
mysql_query($rat,$con);                     
mysql_close($con);
?>
</body>
</html>