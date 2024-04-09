<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
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
    //Add student
    include "db_conn.php";
    if(isset($_POST['btnAdd']))
    {
        //Get data from student form
        $Rollno = $_POST['Rollno'];
        $Sname = $_POST['Sname'];
        $Address = $_POST['Address'];
        $Email = $_POST['Email'];
        if($Rollno=="" || $Sname=="" || $Address=="" || $Email=="")
        {
            echo "(*) is not empty";
        }
        else
        {
            //Retrieving data from table
            $sql = "select Rollno from students where Rollno='$Rollno'";
            //Executing query
            $result = mysqli_query($conn,$sql);
            //Testing exist data and then insert into table
            if(mysqli_num_rows($result)==0)
            {
                $sql = "INSERT INTO students VALUES ('$Rollno', '$Sname', '$Address', '$Email')";
                mysqli_query($conn,$sql);
                echo '<meta http-equiv="refresh" content="0; URL=Studentlistnew.php"';
            }
            else
            {
                echo "Existed student in list";
            }

        }
    }


    ?>

    <form method="post" id="AddStudent">
        <table align="center" border="0" cellpadding="1" cellspacing="1">
           <caption align="center"><b>Adding Student</b></caption> 
           <tr>
                <td>Rollno</td>
                <td><input type="text" name="Rollno"/>(*)</td>
           </tr>

           <tr>
                <td>Student Name</td>
                <td><input type="text" name="Sname"/>(*)</td>
           </tr>

           <tr>
                <td>Student Address</td>
                <td><input type="text" name="Address"/>(*)</td>
           </tr>

           <tr>
                <td>Student Email</td>
                <td><input type="text" name="Email"/>(*)</td>
           </tr>

           <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Add" name="btnAdd"/>
                    <input type="reset" value="cancel" name="btnCancel"/>
                    <h5><a href="Studentlistnew.php"></a>back to list</h5>
                </td>
                
           </tr>
          
        </table>
    </form>

</body>
</html>