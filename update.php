<?php
include('teacher_conn.php');// 
print_r($_POST);
print_r($_FILES); echo $_POST['earlier_teacher_picture']; 
$teacher_name=$_POST['teacher_name'];
$teacher_age=$_POST['teacher_age'];
$teacher_gender=$_POST['teacher_gender'];
$teacher_shift=$_POST['teacher_shift'];
$teacher_subject=implode(",",$_POST['teacher_subject']);
$update_teacher_id=$_POST['update_teacher_id'];

//file upload

//image name is being fetched

//
if($_FILES['error'] == 0){ 
    // check kar rahe hai ki image update hua hai ki nai 
    //agar image ka error attibute agar 0 aye 

//only used to remove the earlier image from folder
$image_unlink = "uploads/".$_POST['earlier_teacher_picture'];
unlink($image_unlink);
//only used to remove the earlier image from folder

// updating the new image
$time=time();
$image_name=$time.$_FILES['teacher_picture']['name'];
$imagepath="uploads/".$image_name;
//function helps to upload files in folder
move_uploaded_file($_FILES["teacher_picture"]["tmp_name"],$imagepath);
//updateing the new image
}
else{

// if the user is not updating the image
$image_name = $_POST['earlier_teacher_picture'];
}

//file upload

//sql insertion of data
$sql="UPDATE `teacher_detail` SET `name`='$teacher_name',`age`='$teacher_age',`gender`='$teacher_gender',`shift`='$teacher_shift',`subject`='$teacher_subject' , `teacher_picture` = '$image_name' WHERE id=$update_teacher_id ";
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