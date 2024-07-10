<?php
$dbcon=mysqli_connect("localhost","root","","student_data");
if(isset($_POST['register'])){
    $sname=$_POST['sname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    $input_error=array();
    if(empty($sname)){
        $input_error['sname']="Sname is required!";
    }
    if(empty($username)){
        $input_error['username']="Username is required!";
    }
    if(empty($email)){
        $input_error['email']="Email is required!";
    }
    if(empty($mobile)){
        $input_error['mobile']="Mobile is required!";
    }
    if(empty($password)){
        $input_error['password']="password is required!";
    }
    if(count($input_error)==0){
      $query="INSERT INTO `register_form`(`sname`, `username`, `email`, `mobile`, `password`) VALUES ('$sname','$username','$email','$mobile','$password')";
      $query_result=mysqli_query($dbcon,$query);
        if($query_result){
            echo '
               <script>
                    alert("Successfully Inserted");
                    window.location.href="index.php";
               </script> 
            ';
        $sname=false;
        $username=false;
        $email=false;
        $mobile=false;
        $password=false;

    }

   
    }
}


?>








<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action=""  method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="sname">
            <span class="error"><?php if(isset($input_error['sname'])){echo $input_error['sname'];}?></span>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="username">
            <span class="error"><?php if(isset($input_error['username'])){echo $input_error['username'];}?></span>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email">
            <span class="error"><?php if(isset($input_error['email'])){echo $input_error['email'];}?></span>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="mobile">
            <span class="error"><?php if(isset($input_error['mobile'])){echo $input_error['mobile'];}?></span>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password">
            <span class="error"><?php if(isset($input_error['password'])){echo $input_error['password'];}?></span>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" >
          </div>
        </div>
		
		
        
        <div class="button">
          <input type="submit" value="Register" name="register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>