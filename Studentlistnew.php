<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
    <style>

body {
    font-family: Arial, sans-serif;
    background-color: #003333; /* Deep blue background for the body */
    color: #ffffff; /* Adding white text for better readability */
    margin: 0;
    padding: 0;
    
}
.tb1{
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff; /* Keeping table background white for contrast */
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    overflow: scroll;
    height: 300px;
}
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    
}
th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
    color: black;
    margin: 5px;
    
}
td, a{
    color: #003333;
    text-decoration: none;

}
th {
    background-color: #f2f2f2; /* Light grey header to maintain contrast */
    
}
caption {
    font-size: 30px;
    margin: 30px auto;
    color: white; /* Deep blue for caption text */
}
form {
    width: 80%;
    margin: 20px auto;
    background-color: #fff; /* Keeping form background white for clarity */
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
}
input[type="text"] {
    width: calc(100% - 20px);
    padding: 8px;
    
}
input[type="submit"], input[type="reset"] {
    padding: 10px 20px;
    background-color: #000066; /* Deep blue for buttons */
    color: white; /* White text for buttons to contrast with the deep blue */
    border: none;
    cursor: pointer;
    margin-top: 10px;
    border-radius: 3px;
    margin-left: 10px;
}
input[type="submit"]:hover, input[type="reset"]:hover {
    background-color: #00004d; /* Slightly darker blue for hover effect */
}
#abc{
    float: right
}
.aaa{
    text-decoration: none;
}
</style>
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
        <td><a href="StudentAdd.php?id=<?php echo $row['Rollno']; ?>">Add</a></td>

    </tr>
    <?php

        }


        
    // Delete Student
    if(isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];
        $sql = "DELETE FROM students WHERE Rollno='$id'";
        if(mysqli_query($conn, $sql)) {
            header("Location: Studentlistnew.php");
            exit();
        } else {
            echo "<h2>Error deleting record:</h2><p class='error-message'>" . mysqli_error($conn) . "</p>";
        }
        
    }

    ?>




    </table>
</body>
</html>