<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data inser in to data base through form</title>
</head>
<body>
    <?php
    $con=mysqli_connect("localhost","root","","USER");
    if($con->connect_error){
        die("connection error".$con->connect_error);
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $FIRSTNAME = $_POST["firstname"];
        $LASTNAME = $_POST["lastname"];
        $EMAIL = $_POST["email"];
        $PASSWORD = $_POST["password"];
        $NUMBER = $_POST["number"];
       

        $sql="INSERT INTO userdata(Firstname,Lastname,Email,Password,Number) VALUES 
        ('$FIRSTNAME','$LASTNAME','$EMAIL','$PASSWORD','$NUMBER')";
        if($con->query($sql) === TRUE){
            echo"data inserted sucssesfully ";
      }
      else{
        echo"error into data inserted".$sql."<br>".$con->error;
      }

    }
    $con->close();
   
    ?>
</body>
</html>