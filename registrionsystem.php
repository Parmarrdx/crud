<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user registrion system</title>
    <link rel="stylesheet" href="css/employ.css">
    <style>
      .error{
        color: red;
      }
    </style>
</head>
<body>
    
    <h1>Please feel valid details</h1>
<div class="main" >
    
    <div class="signup">
        <div class="inputs">
        <?php
        
// define variables and set to empty values
$firstnameErr = $lastnameErr=$emailErr = $passwordErr = $conformpasswordErr = $numberErr = "";
$firstname = $lastname=$email = $password = $comment = $conformpassword = $number = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "Firstname is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
  }
  if (empty($_POST["lastname"])) {
    $lastnameErr = "lastname is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
  }
  if (empty($_POST["email"])) {
    $emailErr = "email is required";
  }
  else{
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["password"])) {
    $passwordErr= "password requierd";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["conformpassword"])) {
    $conformpasswordErr = "reenter your password";
  } else {
    $conformpassword  = test_input($_POST["conformpassword"]);
  }


  if (empty($_POST["number"])) {
    $numberErr = "enter your mobile number";
  } else {
    $number = test_input($_POST["number"]);
  }
  if($password==$conformpassword){
       echo "data inserted";
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

    <form action="insert.php" method="post">
        
        <label for="First name">First name</label><br>
        <input type="text" name="firstname"placeholder="Enter a First name here" >
       
        <span class="error">* <?php echo $firstnameErr;?></span><br>
        <label for="Lastname">Lastname</label><br>
        <input type="text" name="lastname"placeholder="Enter Lastname name here" >
        <span class="error">* <?php echo $lastnameErr;?></span><br>
        <label for="Lastname">Email</label><br>
        <input type="email" name="email"placeholder="Enter Email here" >
        <span class="error">* <?php echo $emailErr;?></span><br>
        <label for="Password">Password</label><br>
        <input type="password" name="password" placeholder="Enter a password here" >
        <span class="error">* <?php echo $passwordErr;?></span><br>
        <label for="Conformpassword">Conformpassword</label><br>
        <input type="text" name="conformpassword"placeholder="Reenter  a password  here" >
        <span class="error">* <?php echo $conformpasswordErr;?></span><br>
        <label for="Mobile number">Moblie number</label><br>
        <input type="text" name="number"placeholder="Enter your contect number  here" >
        <span class="error">* <?php echo $numberErr;?></span><br>
        <button type="submit">shign in </button>
        </form>
        
    </div>
</div>
    <div class="login" >
<div class="inputs">
        <form action="logine1.php" method="post">
            <label for="email">Email</label><br>
            <input type="email" name="email" placeholder="enter your email here"><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" placeholder="enter password here"><br>
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
    </div>
    
        
    <!--<?
    //php echo htmlspecialchars($_SERVER["PHP_SELF"]);
    ?>  -->
  
</div>
</body>

</html>
