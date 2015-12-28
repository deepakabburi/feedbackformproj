
<?php
if(mysql_connect("homepages.wmich.edu","djh3058","w6gt8.ht8wkzqPM"))
{
    echo "database selected";
}
else 
{
    echo "db not selected". mysql_error();
}

?>