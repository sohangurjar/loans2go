<?php
// Establish connection
$con = mysqli_connect("localhost", "root", "", "sohan");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "connection done";
}
$id = $_GET["id"];
$sql = "DELETE FROM loans WHERE `Loan Id` = $id";
  if(mysqli_query($con, $sql)){
    header("Location: ./loans.php"); 
    exit();
  } else {
      echo "Error: " . mysqli_error($con);
  }
?>