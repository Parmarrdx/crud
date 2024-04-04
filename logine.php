<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logine data</title>
</head>
<body>
<!--  
// if (isset($_POST['submit'])) {
//     if (!empty($_POST['email']) && !empty($_POST['password'])) {

//         $con = mysqli_connect("localhost:3306", "root", "", "USER") or die(mysqli_error($con));

//         $username = mysqli_real_escape_string($con, $_POST['email']); // Sanitize user input
//         $password = mysqli_real_escape_string($con, $_POST['password']); // Sanitize user input

//         // Use prepared statement to prevent SQL injection
//         $qry = "SELECT * FROM userdata WHERE Email='".$username."'  AND Password='".$password."'";
//         $stmt = mysqli_prepare($con, $qry);
//         mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
//         mysqli_stmt_execute($stmt);

//         $result = mysqli_stmt_get_result($stmt);

//         $numrows = mysqli_num_rows($result);
//         if ($numrows != 0) {
//             while ($row = mysqli_fetch_assoc($result)) {
//                 $user = $row['email'];
//                 $dbPassword = $row['password']; // Store the database password in a different variable
//             }

//             if ($user == $username && password_verify($password, $dbPassword)) {
//                 // Successful login
//                 // session_start();
//                 // $_SESSION['amish'] = $user;
//                 // header("Location: home.php");
//                 echo "Login success";
//             } else {
//                 echo "Invalid credentials";
//             }
//         } else {
//             echo "Invalid credentials";
//         }

//         mysqli_stmt_close($stmt);
//         mysqli_close($con);
//     } else {
//         echo "Required fields are empty";
//     }
// }
//  nfjnjvnfngnvf -->
<?php
if (isset($_POST['submit'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $con = mysqli_connect("localhost", "root", "", "user") or die(mysqli_error($con));

        $username = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $qry = "SELECT * FROM userdata WHERE Email='$username' LIMIT 1";
        $jen = mysqli_query($con, $qry);

        if ($jen) {
            if ($row = mysqli_fetch_assoc($jen)) {
                // Password verification
                if (password_verify($password, $row['Password'])) {
                    // Start the session and redirect to welcome.php
                    session_start();
                    $_SESSION['user'] = $row['Email'];
                    header("Location: welcome.php");
                    exit();
                } else {
                    echo "Invalid password";
                }
            } else {
                echo "Invalid email";
            }
        } else {
            echo "Query failed: " . mysqli_error($con);
        }

        mysqli_close($con);
    } else {
        echo "Email and password are required";
    }
}
?>

</body>
</html>