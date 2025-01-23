<?php
include('teacher_conn.php');
$editid=$_GET['editid'];
$sqlEdit = "SELECT * FROM `teacher_detail` WHERE id=$editid";
$Editdata=mysqli_query($mysqli,$sqlEdit);
//if($Editdata){
    //echo'edit successfull';
    //header("Location:teacher_form.php");
//}
//else{
    //echo'edit not successfull';
//}
//single value of teachers
$teacher_value=$Editdata->fetch_assoc();
print_r($teacher_value);
?>
<html>
    <head></head>
    <title>Teacher detail form</title>
    <body>
        <form action="update.php" method="POST">
            <h4>Teacher Data Form</h4>
            <div class="teacher_name">
                <input type="hidden" name="update_teacher_id" value="<?php echo $teacher_value['id']; ?>" >
                <label>Name</label>
                <input type="text" name="teacher_name" placeholder="Enter your name" value="<?php echo $teacher_value['name']; ?>" required>

            </div>
             <div class="teacher_age">
                <label>Age</label>
                <input type="number" name="teacher_age" placeholder="Enter your age" value="<?php echo $teacher_value['age']; ?>" required>

            </div>
             <div class="teacher_gender">
                <label>Gender</label>
                <input type="radio" name="teacher_gender" value="Male" <?php if($teacher_value['gender'] == "Male") {echo"checked";} ?>>Male
                <input type="radio" name="teacher_gender" value="Female" <?php if($teacher_value['gender']=="Female") {echo"checked";}?>>Female

            </div>
            <div class="teacher_shift">
                <label>Choose your shift</label>
                <select name="teacher_shift">
                    <option type="text" value="Morning" <?php if($teacher_value['shift'] == "Morning") {echo"selected";} ?>>Morning</option>
                    <option type="text" value="Day" <?php if($teacher_value['shift'] == "Day") {echo"selected";} ?>>Day</option>
                    <option type="text" value="Evening" <?php if($teacher_value['shift'] == "Evening") {echo"selected";} ?>>Evening</option>
                </select>

            </div>
            <div class="teacher_subject">
                <label>Choose your subject</label>
                <?php echo $teacher_value['subject'];
                $subject_array=(explode(",", $teacher_value['subject'])); ?>
                <input type="checkbox" name="teacher_subject[]" value="Maths" <?php if(in_array("Maths",$subject_array)){echo "checked";}?>>Maths
                <input type="checkbox" name="teacher_subject[]" value="Science" <?php if(in_array("Science",$subject_array)){echo "checked";}?>>Science
                <input type="checkbox" name="teacher_subject[]" value="Computer" <?php if(in_array("Computer",$subject_array)){echo "checked";}?>>Computer
                <input type="checkbox" name="teacher_subject[]" value="History" <?php if(in_array("History",$subject_array)){echo "checked";}?>>History
                <input type="checkbox" name="teacher_subject[]" value="Geography" <?php if(in_array("Geography",$subject_array)){echo "checked";}?>>Geography

            </div>
            <div class="button">
                <input type="submit">
            </div>
        </form>
    </body>
</html>