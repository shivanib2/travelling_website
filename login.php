<?php 
include("connection.php");
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
    <div class="title">Login </div>
    <div class="form">
      

    <div class="input_field">
            <label>Email Address </label>
            <input type="text" class="input" name="email" required>
</div>


    <div class="input_field">
            <label>Password</label>
            <input type="password" class="input" name="pwd" required>

    </div>
    
  
<div class="input_field">
<input type="submit" value="Login" name="login" class="btn">

    </div>

    </form>

</div>
</body>
</html>
<?php

if($_POST['login'])
{  
    $email = $_POST['email'];
   $pwd = $_POST['pwd'];
   
   if (!$email || !$pwd) {
    // Display an error message
    die('Please fill in all required fields');
  }
  
   $sql = "INSERT INTO USER values('$email','$pwd' )";
  $data = mysqli_query($conn, $sql);
  $query = 'SELECT * FROM  FORM WHERE email = ?';

$stmt = $conn->prepare($query);
$stmt->bindParam(1, $email);
$stmt->execute();

$user = $stmt->fetch();

if (!$user) {
  // Display an error message
  die('User does not exist');
}

// Verify the password
if (!password_verify($pwd, $user['password'])) {
  // Display an error message
  die('Incorrect password');
}

// Log the user in and redirect them to the home page
session_start();
$_SESSION['user_id'] = $user['id'];

header('Location: index.php');


  if($data)
  {
    echo "Data inserted";
  }

  else{
    echo "failed";
  }
}

?>


