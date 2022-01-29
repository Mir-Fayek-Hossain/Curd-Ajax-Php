<?php
session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'userregistration');

$name=trim($_POST['name']);
$pass=trim($_POST['pass']);
$cpass=
    $_SESSION['name']=$name;
    if($pass!=$cpass){
        echo "**Password did not matched**";
    }else{
        $query="SELECT * FROM usertable WHERE name='$name'";
        $result=mysqli_query($con,$querdy);
        $num=mysqli_num_rows($result);
        if($num==1){
            echo "**User already taken!**";
        }
        else{
            $pass=password_hash(trim($_POST['pass']),PASSWORD_DEFAULT);
            $reg="INSERT INTO usertable ( name, password) VALUES ('$name','$pass')";
            mysqli_query($con,$reg);
            header('location:index.php');
        }
    }
?>