<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    width: 100%;
    max-width: 400px;
    padding: 20px;
}

.profile-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    padding: 20px;
}

.profile-image img {
    border-radius: 50%;
    width: 150px;
    height: 150px;
    object-fit: cover;
    border: 3px solid #007bff;
}

.profile-info {
    margin-top: 15px;
}

.profile-name {
    font-size: 24px;
    font-weight: bold;
    color: #333;
}

.profile-email,
.profile-phone {
    font-size: 16px;
    color: #666;
    margin: 5px 0;
}

.btn-update {
    margin-top: 15px;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-update:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="profile-card">
            <div class="profile-image">
                <img src="https://via.placeholder.com/150" alt="User Image">
            </div>
            <div class="profile-info">
                <h2 class="profile-name">John Doe</h2>
                <p class="profile-email">Email: john.doe@example.com</p>
                <p class="profile-phone">Phone: +123 456 7890</p>
                <button class="btn-update">Update Info</button>
            </div>
        </div>
    </div>
</body>
</html>
