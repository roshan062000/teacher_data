<?php
include('teacher_conn.php');
?>
<html>
    <head></head>
    <title>Teacher detail form</title>
    <body>
        <form action="teacher_save.php" method="POST" enctype="multipart/form-data">
            <h4>Teacher Data Form</h4>
            <div class="teacher_name">
                <label>Name</label>
                <input type="text" name="teacher_name" placeholder="Enter your name" required>

            </div>
             <div class="teacher_age">
                <label>Age</label>
                <input type="number" name="teacher_age" placeholder="Enter your age" required>

            </div>
             <div class="teacher_gender">
                <label>Gender</label>
                <input type="radio" name="teacher_gender" value="Male">Male
                <input type="radio" name="teacher_gender" value="Female">Female

            </div>
            <div class="teacher_shift">
                <label>Choose your shift</label>
                <select name="teacher_shift">
                    <option type="text" value="Morning">Morning</option>
                    <option type="text" value="Day">Day</option>
                    <option type="text" value="Evening">Evening</option>
                </select>

            </div>
            <div class="teacher_subject">
                <label>Choose your subject</label>
                <input type="checkbox" name="teacher_subject[]" value="Maths">Maths
                <input type="checkbox" name="teacher_subject[]" value="Science">Science
                <input type="checkbox" name="teacher_subject[]" value="Computer">Computer
                <input type="checkbox" name="teacher_subject[]" value="History">History
                <input type="checkbox" name="teacher_subject[]" value="Geography">Geography

            </div>
            <div class="file_upload">
                <label>Upload your Pic</label>
                <input type="file" name="teacher_picture" accept="image/jpeg">
            </div>
            <div class="button">
                <input type="submit">
            </div>
        </form>
        <h4>Teacher data table</h4>
        <style> table th, td{border:1px solid black;}
        </style>
        <table width="50%">
            <th>
                
                <td>Name</td>
                <td>Age</td>
                <td>Gender</td>
                <td>Shift</td>
                <td>Subject</td>
                <td>Image</td>
                <td>Actions</td>
            </th>

            <?php
        $sql_fetchdata = "SELECT * FROM `teacher_detail` ORDER BY `id` ASC ";
        $result = mysqli_query($mysqli,$sql_fetchdata);
        while($rows=$result->fetch_assoc())
        {?>
            <tr>
            <td><?php echo $rows['id'];?></td>
            <td><?php echo $rows['name'];?></td>
            <td><?php echo $rows['age'];?></td>
            <td><?php echo $rows['gender'];?></td>
            <td><?php echo $rows['shift'];?></td>
            <td><?php echo $rows['subject'];?></td>
            <td><img src="<?php  echo "uploads/".$rows['teacher_picture']  ?>" width="50" height="50"></td>
            <td><a href="editdata.php?editid=<?php echo $rows['id'];?>">Edit</a>        
            <a href="deletedata.php?deleteid=<?php echo $rows['id'];?>">Delete</a></td> 
            </tr>
        <?php } ?>
        </table>
        
    </body>
</html>