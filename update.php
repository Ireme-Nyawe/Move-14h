<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "connection.php";
    $id=$_GET['id'];
    $select_existing=mysqli_query($connect,"SELECT * from school
     where id='$id'");
    $existing=mysqli_fetch_array($select_existing);
    ?>
    <form action="" method="POST">
<h3>Update School Here</h3>
<p>
    <label for="">School Name</label>
    <input type="text" name="sname" value="<?php echo $existing['name'];?>">
</p>

<p>
    <input type="submit" name="update" value="UPDATE">
</p>
    </form>
    <?php
    if(isset($_POST['update'])){
        $name=$_POST['sname'];
        $update=mysqli_query($connect,"UPDATE school set name='$name'
         where id='$id'");
        if($update){
            header("location:index.php");
        }
    }
    ?>
</body>
</html>