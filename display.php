<html>
    <head>
        <title>Display</title>
        <style>
            body
                {
                    background: #e51e57;

                }
                table{
                    background-color: White;

                }
            

        </style>
    </head>


<?php
include("connection.php");
error_reporting(0);

$query = "SELECT * FROM FORM";

$data = mysqli_query($conn , $query);

$total = mysqli_num_rows($data);
//echo $total;



if($total != 0)
{
    ?>

   
<h2 align="center" ><mark >All Records </mark></h2>

  <center> <table border="1" cellspacing="90%" >
    <tr>
    <th width=10%>First Name </th>
    <th width= 10%>Last Name </th>
    <th width= 10%>Gender </th>
    <th width= 20%>Email</th>
    <th width= 10%>Phone </th>
    <th width= 30%>Address </th>
</tr>




   <?php
   while($result = mysqli_fetch_assoc($data))
{

  echo "
  <tr>
    <td>" . $result['fname']. "</td>
    <td>" .$result['lname']. "</td>
    <td>" . $result['Gender']. "</td>
    <td>" . $result['Email Address']. "</td>
    <td>" . $result['Phone Number']. "</td>
    <td>" . $result['Address']. "</td>

        </tr>

  ";

}

}

else{
    echo "No records found";

}

?>
</table>
</center>

