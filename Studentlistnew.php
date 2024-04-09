<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include "db_conn.php";
    $sql = "select * from students";
    //Executing query
    $result = mysqli_query($conn,$sql);
    ?>

<table align="center" border="1px" cellpadding="0" cellspacing="0">
    <caption align="center">Student List</caption>
    <tr>
        <th>Rollno</th>
        <th>Student Fullname</th>
        <th>Address</th>
        <th>Email</th>
    </tr>

    <?php
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {        
    ?>
    <tr>
        <td><?php echo $row['Rollno']; ?></td>
        <td><?php echo $row['Sname']; ?></td>
        <td><?php echo $row['Address']; ?></td>
        <td><?php echo $row['Email']; ?></td>
        <td><a href="edit_student.php?id=<?php echo $row['Rollno']; ?>">Edit</a></td>
        <td><a href="?delete_id=<?php echo $row['Rollno']; ?>">Delete</a></td>

    </tr>
    <?php

        }


        
    // Delete Student
    if(isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];
        $sql = "DELETE FROM students WHERE Rollno='$id'";
        if(mysqli_query($conn, $sql)) {
            header("Location: StudentList.php");
            exit();
        } else {
            echo "<h2>Error deleting record:</h2><p class='error-message'>" . mysqli_error($conn) . "</p>";
        }
        
    }

    ?>




    </table>
</body>
</html>