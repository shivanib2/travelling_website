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
    <div class="title">Sign Up </div>
    <div class="form">
        <div class="input_field">
            <label >First Name</label>
            <input type="text" class="input" name="fname" required style= "text-transform: capitalize">
</div>

<div class="input_field">
            <label >Middle Name</label>
            <input type="text" class="input" name="mname" style= "text-transform: capitalize"> 
</div>
<div class="input_field">
            <label >Last Name</label>
            <input type="text" class="input" name="lname" required style= "text-transform: capitalize"> 
</div>



    <div class="input_field">
            <label>Password</label>
            <input type="password" class="input" name="pass" required>

    </div>
    
    <div class="input_field">
            <label>Confirm Password</label>
            <input type="password" class="input" name="conpass" required>


    </div>
    
    <div class="input_field">
            <label>Gender</label>
            <div class="selecting">
            <select name="gender" required>
                <option value="Not selected">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
</select>
</div>

</div>
    
    <div class="input_field">
            <label>Email Address </label>
            <input type="email" class="input" name="email" required>
</div>

<div class="input_field">
            <label>Phone Number</label>
            <input type="number" class="input" name="phone" required>
</div>

<div class="input_field">
            <label>Address</label>
            <textarea class="textarea" name="address" required></textarea>

</div>


<div class="input_field terms" >
            <label class="check" >
            <input type="checkbox" required>
            <span class="ckeckmark"></span>

            </label>
<p > Agree to terms and conditions</p>

</div>

<div class="input_field">
<input type="submit" value="Sign up" name="register" class="btn">

    </div>

    </form>

</div>
</body>
</html>
<?php


if($_POST['register'])
{  
   $fname =  $_POST['fname'];
   $mname =  $_POST['mname'];
   $lname =  $_POST['lname'];
   $pwd =  $_POST['pass'];
   $cpwd =  $_POST['conpass'];
   $gender =  $_POST['gender'];
   $email =  $_POST['email'];
   $phone =  $_POST['phone'];
   $address =  $_POST['address'];
   if(strlen($pwd) < 4 ){
    echo "Password must be 4 char long";
}
elseif($pwd!=$cpwd){
    echo "Password doesn't match";
}
else{

   $query = "INSERT INTO FORM values('$fname' , '$mname' ,'$lname', '$pwd', '$cpwd', '$gender', '$email', '$phone', '$address' )";
  $data = mysqli_query($conn, $query);
  $stmt = $conn->prepare($query);
  $stmt->bindParam(1, $fname);
  $stmt->bindParam(2, $email);
  $stmt->bindParam(3, password_hash($pwd, PASSWORD_DEFAULT));
  $stmt->execute();
  
  // Send an email confirmation to the user
  $to = $email;
  $subject = 'Welcome to Travelopians!';
  $message = 'Hi ' . $name . ',
  
  Thank you for signing up for Travelopians!
  
  Once your account will be confirmed , you will be able to log in and use all of the features of Travelopians.
  
  Thanks,
  The Travelopians team';
  
  mail($to, $subject, $message);
  
  // Redirect the user to the home page
  header('Location: index.php');
  if($data)
  {
    echo "Data inserted";
  }

  else{
    echo "failed";
  }
}

}

   
   
?>
