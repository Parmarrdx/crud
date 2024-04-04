<?php
session_start();
if(isset($_SESSION['amish'],$_SESSION['name'])){
    header("location:welcome.php");
    exit;
}
if (isset($_POST['submit'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        # code...
    
        $con=mysqli_connect("localhost","root","","user") or die(mysqli_error($con));
        $username=$_POST['email'];
        
        $password=$_POST['password'];

        $qry="select * from userdata where Email ='".$username."' and Password='".$password."'";
        $jen=mysqli_query($con,$qry);
        
        $numrows=mysqli_num_rows($jen);
        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($jen)) {
                
                $user=$row['Email'];
                $dbpassword=$row['Password'];
                $fname=$row["Firstname"];
            }

            if ($username==$user && $password==$dbpassword) {
               
            
            $_SESSION['name']=$fname;
                  $_SESSION['amish']=$user;
                 header("Location:welcome.php");
             }
            }
            else
            {
            echo "Invalid password";
            }
    }

    else
    {
        echo "Required";
    }

}

?>
