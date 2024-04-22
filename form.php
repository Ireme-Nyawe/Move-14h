<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="">
        <table>
            
        </table>
        <form action="form.php" method="POST">
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
    $query="INSERT into school(name,phone,principal)
    values('$name','$phone','$principal')";
    $query_add=mysqli_query($connect,$query);
    if($query_add){
        echo "Good Job, Added well!";
    }
   }
    ?>
</body>
</html>