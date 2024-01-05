
<?php include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<div class="container">
<form action="#" method="POST">
    <div class="title">BOOK NOW</div>
    <div class="form">
        <div class="input_field">
            <label>Full Name</label>
            <input type="text" class="input" name="fname" required style= "text-transform: capitalize">
</div>


<div class="input_field">
            <label>Phone Number</label>
            <input type="number" class="input" name="phone" required >
</div>
<div class="input_field">
            <label>Destinations</label>
            <div class="selecting" >
            <select name="des" required>
            <option value="Not selected">Select</option>
                <option value="Norway">Norway</option>
                <option value="Florida">Florida</option>
                <option value="India">India</option>
                <option value="California">California</option>
                <option value="Chicago">Chicago</option>
                <option value="Paris">Paris</option>
                <option value="London">London</option>
                <option value="Singapore">Singapore</option>
                <option value="Bali">Bali</option>
</select>
</div>
</div>
<div class="input_field">
            <label>From</label>
            <input type="date" class="input" name="fr" required>
</div>
<div class="input_field">
            <label>TO</label>
            <input type="date" class="input" name="till" required>
</div>
<div class="input_field">
            <label>No. of Travellers</label>
            <input type="number" class="input" name="trav" required >
</div>

<div class="input_field terms" >
            <label class="check">
            <input type="checkbox" required>
            <span class="ckeckmark"></span>

            </label>
<p > Agree to terms and conditions</p>

</div>
<div class="input_field">

<input type="submit" value="Proceed To Pay " name="pay" class="btn">
    </div>

    </form>

</div>


</body>
</html>

<?php
error_reporting(0);

if($_POST['pay'])
{  
   $fname =  $_POST['fname'];
   $phone =  $_POST['phone'];
   $des =  $_POST['des'];
   $fr=  $_POST['fr'];
   $till =  $_POST['till'];
   $trav=  $_POST['trav'];

$query = "INSERT INTO PAYMENT values('$fname', '$phone','$des','$fr','$till','$trav')";
  $data = mysqli_query($conn, $query);

  if($data)
  {
    echo "Data inserted";
  }

  else{
    echo "failed";
  }
}


   
   
?>
