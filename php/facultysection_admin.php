<html>
<body>
<form action="facultysection_admin.php" method="post">
<h1>Staff admin</h1><br />
Staff ID: <input type="text" name="fid" /><br />
Staff Name: <input type="text" name="fname" /><br /> 
<input type="submit" value="Add" name="fadd" onclick="return confirm('Please Confirm Add')" />
<input type="submit" value="Delete" name="fdel" onclick="return confirm('Please Confirm Delete')"  /><br />
<h1>Subject Admin</h1><br />
Subject Name: <input type="text" name="sub" /><br />
Subject Code: <input type="text" name="scode" /><br />
<input type="submit" value="Add" name="sadd" onclick="return confirm('Please Confirm Add')" />
<input type="submit" value="Delete" name="sdel" onclick="return confirm('Please Confirm Delete')"  /><br />
<h1>Course work details</h1><br />
Staff ID: <input type="text" name="cid" /><br />
Subject Code: <input type="text" name="ccode" /><br />
Section: <input type="text" name="section" /><br />
<input type="submit" value="Add" name="cadd" onclick="return confirm('Please Confirm Add')" />
<input type="submit" value="Delete" name="cdel" onclick="return confirm('Please Confirm Delete')" /><br />
</form>
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

if(isset($_POST['fadd'])){
 $vfadd="INSERT INTO faculty (name,id) VALUES ('$_POST[fname]','$_POST[fid]')";
 mysql_query($vfadd,$con);
 
 $staff=$_POST['fid'];
$rat = "CREATE TABLE $staff (
section varchar(20),
scode varchar(20),
q1 int NOT NULL,
q2 int NOT NULL,
q3 int NOT NULL,
q4 int NOT NULL,
q5 int NOT NULL,
q6 int NOT NULL,
q7 int NOT NULL,
q8 int NOT NULL,
q9 int NOT NULL,
q10 int NOT NULL,
q11 varchar(200) NOT NULL
)";
if(mysql_query($rat,$con))
 echo "table created";
else
 echo "table not created Error". mysql_error(); 
  
}
if(isset($_POST['fdel'])){
 $vfdel="DELETE FROM `faculty` WHERE id='$_POST[fid]'"; 
 mysql_query($vfdel,$con);   
 mysql_close($con); 
 $staf=$_POST['fid'];
 $vftdel="DROP Table $staf " ;
  mysql_query($vftdel,$con);  
   
 
}
if(isset($_POST['sadd'])){
 $vsadd="INSERT INTO sub (sub,scode) VALUES ('$_POST[sub]','$_POST[scode]')";
 if(mysql_query($vsadd,$con))
  {
        print '<script type="text/javascript">'; 
        print 'alert("The entered details are successfully added to the list")'; 
        print '</script>';
  }
 else
  {
        print '<script type="text/javascript">'; 
        print 'alert("The entered details are already existing or entered details are blank")'; 
        print '</script>';
  }
 
    
}
if(isset($_POST['sdel'])){
 $vfdel="DELETE FROM `sub` WHERE scode='$_POST[scode]'"; 
 if(mysql_query($vfdel,$con))
 echo mysql_error();
    
}
if(isset($_POST['cadd'])){
    $idsel="SELECT COUNT(*) FROM faculty WHERE id='$_POST[cid]'";
    $csel="SELECT COUNT(*) FROM sub WHERE scode='$_POST[ccode]'";
    $qid=mysql_query($idsel,$con);
    $qc=mysql_query($csel,$con);
    $rowid = mysql_fetch_row($qid);
    $rowc = mysql_fetch_row($qc);
    if($rowid[0]>0&&$rowc[0]>0)
    { 
       $vcadd="INSERT INTO crswrk (fid,scode,sec) VALUES ('$_POST[cid]','$_POST[ccode]','$_POST[section]')";
       if(mysql_query($vcadd,$con))
       {
        print '<script type="text/javascript">'; 
        print 'alert("The entered details are successfully added to the list")'; 
        print '</script>';   
       }
       else
       {
        echo mysql_error();
        print '<script type="text/javascript">'; 
       print 'alert("The entered details already exiting")'; 
       print '</script>';
       } 
    }
    else
    {  print '<script type="text/javascript">'; 
       print 'alert("The entered details are incorrect , please check and retry again")'; 
       print '</script>';
    } 
    
}
if(isset($_POST['cdel'])){
    $vcdel="DELETE FROM `crswrk` WHERE fid='$_POST[cid]',scode='$_POST[ccode]',sec='$_POST[section]'"; 
 mysql_query($vcdel,$con);
 
}
mysql_close($con);
    
?>