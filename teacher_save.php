<?php
include('teacher_conn.php');
print_r($_POST);
//to store value in dbms
$teacher_name=$_POST['teacher_name'];
$teacher_age=$_POST['teacher_age'];
$teacher_gender=$_POST['teacher_gender'];
$teacher_shift=$_POST['teacher_shift'];
$teacher_subject=implode(",",$_POST['teacher_subject']);
//query to insert data
$sql="INSERT INTO `teacher_detail`(`name`, `age`, `gender`, `shift`, `subject`) VALUES ('$teacher_name','$teacher_age','$teacher_gender','$teacher_shift','$teacher_subject')";
echo $sql;
$insertData=mysqli_query($mysqli,$sql);
if($insertData){
    echo'inserted successfully';
}
else{
    echo'not inserted successfully';
}
header("Location:teacher_form.php");
?>