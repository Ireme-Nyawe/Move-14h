<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="">
        <table>
            <thead>
                <tr>
                    <th colspan="100">Available School</th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>School-Name</th>
                    <th>School-Phone</th>
                    <th>School-Principal</th>
                </tr>
            </thead>
            <?php
            include 'connection.php';
            $query_select=mysqli_query($connect,"SELECT * from school");
            if(mysqli_num_rows($query_select)==0){
                ?>
                <tr>
                    <td colspan="100">No data Found!</td>
                </tr>
                <?php

            }
            while($schools=mysqli_fetch_array($query_select)){
                ?>
                <tr>
                    <td><?php echo $schools['id'];?></td>
                    <td><?php echo $schools['name'];?></td>
                    <td><?php echo $schools['phone'];?></td>
                    <td><?php echo $schools['principal'];?></td>
                    <td>
                        <a href="delete.php?id=<?php echo $schools['id']?>" 
                        onclick="return confirm('Are you sure Abou Deleting <?php echo $schools['name']; ?>??')">dalete</a>
                        <a href="update.php?id=<?php echo $schools['id']?>">update</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <form action="index.php" method="POST">
            <h3>Add Your School Here</h3>
            <p>
                <label for="">School Name</label>
                <input type="text" name="name">
            </p>
            <p>
                <label for="">School Phone</label>
                <input type="text" name="phone">
            </p>
            <p>
                <label for="">School Principal</label>
                <input type="text" name="principal">
            </p>
            <p>
                <input type="submit" value="Add School" name="add">
            </p>
        </form>
    </div>
    <?php
    include 'connection.php';
   if(isset($_POST['add'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $principal=$_POST['principal'];
    $check=mysqli_query($connect,"SELECT * from school where name='$name'");
   if(mysqli_num_rows($check)>0){
    echo "Already added!";
   }
   else{

       $query="INSERT into school(name,phone,principal) values('$name','$phone','$principal')";
       $query_add=mysqli_query($connect,$query);
       if($query_add){
           header("location:index.php");
        }
    }
   }
    ?>
    <hr>
    <form action="index.php" method="POST">
            <h3>Add Trainee Here </h3>
            <p>
                <label for="">Name</label>
                <input type="text" name="name">
            </p>
            <p>
                <label for="">Gender</label>
                <select name="gender" >
                    <option value="">Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </p>
            <p>
                <label for="">School </label>
                <select name="" id="">
                    <option value="">Select Trainee School</option>
                    <?php
                    $get_schools=mysqli_query($connect,"SELECT * from school");
                    while($schools=mysqli_fetch_array($get_schools)){
                        ?>
                        <option value="<?php echo $schools['id']?>"><?php echo $schools['name']?></option>
                        <?php
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="">Email </label>
                <input type="text" name="email">
            </p>
            <p>
                <input type="submit" value="Add Trainee" name="add_trainee">
            </p>

            <?php
            if(isset($_POST['add_trainee'])){
                echo "clicked";
            }
            ?>
        </form>
</body>
</html>