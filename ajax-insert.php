<?php

$firstname = $_POST["first_name"];
$lastname = $_POST["last_name"];
$femail = $_POST["user_email"];

$conn = mysqli_connect("localhost", "root", "p.jha@1995","myApp") or die ("Connection Failed");

$sql1= "SELECT * from userDetails WHERE email='$femail'";

$result= mysqli_query($conn, $sql1) or die(" QUERY ERROR");

if(mysqli_num_rows($result)>0)
{
    echo "Email Already resgitered";
}
else
{
    $sql= "INSERT INTO  userDetails(firstName, lastName, email) VALUES ('{$firstname}','{$lastname}','{$femail}')";

    //$result= mysqli_query($conn, $sql) or die("Connection Failed");
    
    if(mysqli_query($conn, $sql))
    {
    echo 1;
    }else
    {
    echo mysqli_error($conn);
    }
}

mysqli_close($conn);

?>