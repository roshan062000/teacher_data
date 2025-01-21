<?php
include('teacher_conn.php');
$deleteid=$_GET['deleteid'];
//to delete the data
$sqlDelete = "DELETE FROM `teacher_detail` WHERE id=$deleteid";
$deleteData=mysqli_query($mysqli,$sqlDelete);
if($deleteData){
    echo'deleted successfully';
    header("Location:teacher_form.php");
}
else
{
    echo'not deleted';
}
?>