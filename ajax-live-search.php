<?php
$searchTerm = $_POST['searchT'];

$conn = mysqli_connect("localhost", "root", "p.jha@1995","myApp") or die ("Connection Failed");

$sql= "SELECT * from userDetails WHERE firstName LIKE '%{$searchTerm}%' OR lastName LIKE '%{$searchTerm}%'";

$result= mysqli_query($conn, $sql) or die("Connection Failed");

if(mysqli_num_rows($result)>0)
{
$output= '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email-ID</th>
            </tr>';

            while($row=mysqli_fetch_assoc($result)){

                $output .= "<tr><td>{$row["id"]}</td><td>{$row["firstName"]} {$row["lastName"]}</td><td>{$row["email"]}</td></tr>";
                
            }
            $output .= "</table>";
            
            mysqli_close($conn);

            echo $output;
}else
{
echo "<h2> NO RECORD FOUND</h2>";
}


?>