
<?php
 session_start();
 if (!isset($_SESSION['amish'],$_SESSION['name'])) {
    header("location:login1.php");
    exit;
}
echo "Welcome " . $_SESSION['name'] . "! Your email is: " . $_SESSION['amish'];
$conn=mysqli_connect("localhost","root","","user");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check connection

// Fetch data from the database
$sql = "SELECT * FROM userdata";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Records</title>
    <link rel="stylesheet" href="css/viewpage.css">
    
</head>
<body>
    <div>
        <div>
        <h6 style="font-size:25px; margin:9px 0px;">click heare add a data </h6>
        <button  onclick="document.location='registrionsystem.php'">Registrion</button>
        
        </div>
       
        <!--  -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Number</th>
                    
                    <th>Update</th>
                    <th>delate</th>
                </tr>
            </thead>
            <tbody>

                 <?php
                 
                   $counter = 1;                
                    if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $counter++ . "</td>";
                        echo "<td>" . $row["Firstname"] . "</td>";
                        echo "<td>" . $row["Lastname"] . "</td>";
                        echo "<td>" . $row["Email"] . "</td>";
                       
                        echo "<td>" . $row["Password"] . "</td>";
                        echo "<td>" . $row["Number"] . "</td>";
                        echo "<td><a href='update.php?id=" . $row["ID"] . "'>Update</a></td>";
                        echo "<td><a href='delete.php?id=" . $row["ID"] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }
                $counter;
                ?> 
            </tbody>
        </table>
    </div>
    <div>
        <form action="logout.php" >
        <button type="submit" class="log out">log out</button>
        </form>
    </div>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>