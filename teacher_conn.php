<?php
$dbhost='localhost';
$dbuser='root';
$dbpassword='';
$dbname='teacher';
$mysqli= new mysqli($dbhost,$dbuser,$dbpassword,$dbname);
if($mysqli->connect_errno){
    echo'connection not successfull';
}
else
{
    echo'connection successfull';
}
?>