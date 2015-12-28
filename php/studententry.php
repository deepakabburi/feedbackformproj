<html>
<body>
<form action="studententry.php" method="post">
Year:<input type="hidden" name="year" />
<select name="year">
    <option value="1">1st Year</option>
    <option value="2">2nd Year</option>
    <option value="3">3rd Year</option>
    <option value="4">4th Year</option>
    <option value="5">5th Year</option>
</select><br />
Section:<input type="hidden" name="section" />
<select name="section">
    <option value="3A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
    <option value="E">E</option>
</select><br />
Subject code:<input type="hidden"  /> 
<select name='NEW'>
<option value="">--- Select ---</option>
            <?
                mysql_connect("localhost","root","");
                mysql_select_db("feedback");

              // $select="zero to three";
                if(isset($select)&&$select!=""){
                   $select=$_POST['NEW'];
                }
            ?>
            <?
                $list=mysql_query("select scode from sub ");

                while($row_list=mysql_fetch_assoc($list)){
                ?>
                    <option value="<? echo $row_list['scode']; ?>" <? if($row_list['scode']==$select){ echo "selected"; } ?>><? echo $row_list['scode']; ?></option>
                <?
                }
                ?>
            </select> 
            <br>
Faculty:<input type="hidden" name="fname" /> 
<select name='NEW1'>
<option value="">--- Select ---</option>
            <?
                mysql_connect("localhost","root","");
                mysql_select_db("feedback");

                //$select="zero to three";
                if(isset($select)&&$select!=""){
                    $select=$_POST['NEW1'];
                }
            ?>
            <?
                $list=mysql_query("select name from faculty ");

                while($row_list=mysql_fetch_assoc($list)){
                ?>
                    <option value="<? echo $row_list['name']; ?>" <? if($row_list['name']==$select){ echo "selected"; } ?>><? echo $row_list['name']; ?></option>
                <?
                }
                ?>
            </select>
            <br /> 
Question 1:<input type="hidden" name="q1" />
<select name="q1">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select><br />
Question 2:<input type="hidden" name="q2" />
<select name="q2">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select><br />
Question 3:<input type="hidden" name="q3" />
<select name="q3">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select><br />
Question 4:<input type="hidden" name="q4" />
<select name="q4">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select><br />
Question 5:<input type="hidden" name="q5" />
<select name="q5">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select><br />
Question 6:<input type="hidden" name="q6" />
<select name="q6">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select><br />
Question 7:<input type="hidden" name="q7" />
<select name="q7">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select><br />
Question 8:<input type="hidden" name="q8" />
<select name="q8">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select><br />
Question 9:<input type="hidden" name="q9" />
<select name="q9">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select><br />
Question 10:<input type="hidden" name="q10" />
<select name="q10">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select><br />
Question 11:<input type="text" name="q11" />
<input type="submit" value="Submit" name="submit" />
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
if(isset($_POST['submit'])){
$test="SELECT fid FROM faculty,crswrk where id=fid AND name='$_POST[NEW1]' AND scode='$_POST[NEW]' AND sec='$_POST[section]'";
$test1=mysql_query($test,$con);
echo "testing1" . mysql_error() . $test1;
$test2 = mysql_fetch_row($test1);
echo "testing 2" . $test2[0] . mysql_error();
$rat = "INSERT INTO $test2[0] (section,scode,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11) VALUES ('$_POST[section]','$_POST[NEW]','$_POST[q1]','$_POST[q2]','$_POST[q3]','$_POST[q4]','$_POST[q5]','$_POST[q6]',
'$_POST[q7]','$_POST[q8]','$_POST[q9]','$_POST[q10]','$_POST[q11]')";
mysql_query($rat,$con);
echo mysql_error();                     
mysql_close($con);
}
?>
</body>
</html>