<html>
<body>
<form action="enteringdata_admin.php" method="post">
StaffID: <input type="text" name="fid" /><br />  
<input type="submit" value="Submit" name="submit" />
</form>
<?php
if(isset($_POST['submit']))
{
$con=mysql_connect("localhost","root","");
if (mysql_select_db("feedback",$con))
{
    echo "database selected";
}
else 
{
    echo "db not selected". mysql_error();
}
$staff=$_POST['fid'];
$rat = "CREATE TABLE $staff (
section varchar(20),
scode varchar(20),
q1 int,
q2 int,
q3 int,
q4 int,
q5 int,
q6 int,
q7 int,
q8 int,
q9 int,
q10 int,
q11 varchar(200)
)";
if(mysql_query($rat,$con))
 echo "table created";
else
 echo "table not created Error". mysql_error(); 
mysql_close($con);
}
?>
</body>
</html>