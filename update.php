<?php
include('teacher_form.php');
print_r($_POST);
$teacher_name=$_POST['teacher_name'];
$teacher_age=$_POST['teacher_age'];
$teacher_gender=$_POST['teacher_gender'];
$teacher_shift=$_POST['teacher_shift'];
$teacher_subject=implode(",";$_POST['teacher_subject']);
$update_teacher_id=$_POST['update_teacher_id'];
//sql insertion of data
$sql="UPDATE `teacher_detail` SET `name`='[$teacher_name]',`age`='[$teacher_age]',`gender`='[$teacher_gender]',`shift`='[$teacher_shift]',`subject`='[$teacher_subject]' WHERE id=".$update_teacher_id"";
echo $sql;
$updateData=mysqli_query($mysqli,$sql);
if($updateData){
    echo'data updated';
    header("Location:teacher_form.php");
}
else{
    echo'data not updated';
}
?>