<?php
session_start();
include('connect.php');
if( isset($_POST['email']) &&  isset($_POST['password']) ){
    $email    = stripcslashes(strtolower($_POST['email']));
    $pass_md5 = md5($_POST['password']);
    $username = filter_input(INPUT_POST,'username');
    $password = stripcslashes(strtolower($_POST['password']));
    $email  = htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
    $password  = htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
}

if(empty($email)){
    $email_error = "<p> please insert yout email</p>";
    $errors = 1 ;
}

if(empty($password)){
    $password_error = "<p> please insert yout password</p>";
    $errors = 1 ;
    include('sign-in.php');
}
// else{
//     include('sign-in.php');
// }
if(!isset($errors)){
    $sql = "SELECT `email` , `password` FROM `worker` WHERE `email` = '$email' AND `password` = '$pass_md5' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    // echo $row['email'];
    // echo $row['password'];
    // echo $email;
    // echo $password;
    if($row['email'] === $email && $row['password'] === $pass_md5){  
        header('Location: http://localhost/Shatably/');
        exit();
    }else{
        $erroremail = "wrong email or password";
        include('sign-in.php');
    }
}


?>