<?php
$conn = mysqli_connect('localhost', 'root' , '' , 'shat' );
if(!$conn){
    die("Error".mysqli_connect_error());
}
// else
// {
//     echo 'good';
// }
?>