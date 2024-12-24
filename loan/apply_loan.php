<?php
// Establish connection
$con = mysqli_connect("localhost", "root", "", "sohan");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    echo "connection done";
}
$id = $_GET["id"];
function deleteOldestRow() {
    // This query deletes the row with the earliest 'created_at' timestamp
    $deleteMessage = "DELETE FROM messages ORDER BY `Time` ASC LIMIT 1";
    mysqli_query($con, $deleteMessage);
}
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $aadhar = mysqli_real_escape_string($con, $_POST['aadhar']);
	// $time = date('Y-m-d H:i:s');
	
	$loanid = $_POST['loanid'];

	$sql = "INSERT INTO applications (`Name`, Email, Phone, Aadhar, `LoanId`) VALUES ('$name', '$email', '$phone', '$aadhar', '$loanid')";
	$messages = mysqli_query($con, "SELECT * FROM messages");
	$num_rows = mysqli_num_rows($messages);
	if(num_rows >= 3){
		deleteOldestRow();
	}
	$sql2 = "INSERT INTO messages (`Name`) VALUES ('$name')";
	if (mysqli_query($con, $sql) && mysqli_query($con, $sql2)) {
		echo "Applied successful!";
		header("Location: ./loans.php");  
		exit();
	} else {
		echo "Error: " . mysqli_error($con);
	}
        
}

else{
    echo "not submitted";
}
?>
