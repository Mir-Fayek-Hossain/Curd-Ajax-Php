<?php
session_start();     
 $con=mysqli_connect('localhost','root','');    
 mysqli_select_db($con,'userregistration');
 $name=trim($_POST['name']);
 $pass=trim($_POST['pass']);
 $query="SELECT * FROM usertable WHERE name='$name'";
 $result= mysqli_query($con,$query);
 $num=mysqli_num_rows($result);
 if($num==0){
     echo "**Wrong username.**";
 }
else if($num==1){    
     $row = mysqli_fetch_assoc($result);
     $pass_hash=$row['password'];
     if(password_verify($pass,$pass_hash)){    
     $_SESSION['username']=$name;
      header('location:index.php');
     }
     else{
         echo"**Wrong password**";
     }
}
?>