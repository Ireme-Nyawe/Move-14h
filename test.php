<?php
include "connection.php";

$school="ISAPAG";
$test=mysqli_query($connect,
"INSERT into school values
(null,'$school','078643','Shema')");
if($test){
    echo "Tested!";
}
?>
