<?php

$con=mysqli_connect('localhost','root','','channelling');
if($con){
    echo "connection successful";
}else{
    die(mysqli_error($con));
}
?>