<HTML>
    <head>
    <title>Dynamic Drop Down List</title>
    </head>
    <body>
        <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            Age:
            <select name='NEW'>
            <option value="">--- Select ---</option>
            <?
                mysql_connect("localhost","root","");
                mysql_select_db("feedback");

                $select="zero to three";
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

            <input type="submit" name="Submit" value="Select" />
        </form>
    </body>
</html>