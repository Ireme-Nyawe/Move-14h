<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <h3>Login HEre</h3>
        <p>
        <label for="">Email</label>
        <input type="email" name="email">
        </p>
        <p>
        <label for="">password</label>
        <input type="password" name="password">
        </p>
        <input type="submit" name="login">

    </form>
    <?php
    include "../connection.php";
    if($_POST['login']){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query="SELECT * from users where email='$email' and password='$password'";
        $execute=mysqli_query($connect,$query);
        if(mysqli_num_rows($execute)==0){
            echo "User Not Foumd, TopUp To register!";
        }
        else{
            $user_info=mysqli_fetch_array($execute);
            $user_role=$user_info['role'];
            $user_id=$user_info['id'];
            $_SESSION['logger_user']=$user_id;
            if($user_role=='student'){
                header("location:student.php");
            }
            else{
                header("location:admin.php");
            }
        }
        $id=$_SESSION['loged_user'];
    }
    ?>
</body>
</html>