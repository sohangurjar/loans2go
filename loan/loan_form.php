<?php
// Establish connection
$con = mysqli_connect("localhost", "root", "", "sohan");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET["id"];
function deleteOldestRow($con) {
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
	
	// $loanid = $_POST['loanid'];

	$sql = "INSERT INTO applications (`Name`, Email, Phone, Aadhar, `LoanId`) VALUES ('$name', '$email', '$phone', '$aadhar', '$id')";
	$messages = mysqli_query($con, "SELECT * FROM messages");
	$num_rows = mysqli_num_rows($messages);
	if($num_rows >= 3){
		deleteOldestRow($con);
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
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Information Form</title>
    <!-- <link rel="stylesheet" href="form-styles.css"> -->
     <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.form-container {
    background-color: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 400px;
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    color: #333;
}

.input-group {
    margin-bottom: 20px;
    text-align: left;
}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #666;
}

input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

input:focus {
    border-color: #74c0fc;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

small {
    font-size: 12px;
    color: #888;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #74c0fc;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    color: white;
    cursor: pointer;
}

button:hover {
    background-color: #5a9bd8;
}

     </style>
</head>
<body>
    <div class="form-container">
        <h2>Submit Your Details</h2>
        <form action="#" method="post">
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="input-group">
                <label for="contact">Contact No.:</label>
                <input type="tel" id="contact" name="phone" placeholder="Enter your contact number" pattern="[0-9]{10}" required>
                <small>Format: 10 digits</small>
            </div>

            <div class="input-group">
                <label for="aadhar">Aadhar No.:</label>
                <input type="text" id="aadhar" name="aadhar" placeholder="Enter your Aadhar number" pattern="[0-9]{12}" required>
                <small>Format: 12 digits</small>
            </div>


            <input type="submit" name="submit">
        </form>
    </div>
</body>
</html>
