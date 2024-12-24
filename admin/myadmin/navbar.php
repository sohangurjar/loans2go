<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "sohan");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_SESSION['user_id'];
$mesResult = mysqli_query($con, "SELECT * FROM messages");

function timeAgo($timestamp) {

    // Ensure the timestamp is in the correct format
    $currentTime = new DateTime(); // Current DateTime object
    $timestamp = trim($timestamp);
    $timestampObj = new DateTime($timestamp); // Convert the provided timestamp to DateTime object
    
    // Calculate the difference between the two times
    $timeDiff = $currentTime->getTimestamp() - $timestampObj->getTimestamp(); // Difference in seconds
    
    // If the time difference is negative, return 'Invalid timestamp'
    if ($timeDiff < 0) {
        return 'Invalid timestamp4';
    }

    
    // Time calculations
    if ($timeDiff < 60) {
        return $timeDiff . ' seconds ago';
    } elseif ($timeDiff < 3600) {
        $minutes = floor($timeDiff / 60);
        return $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' ago';
    } elseif ($timeDiff < 86400) {
        $hours = floor($timeDiff / 3600);
        return $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
    } elseif ($timeDiff < 604800) {
        $days = floor($timeDiff / 86400);
        return $days . ' day' . ($days > 1 ? 's' : '') . ' ago';
    } elseif ($timeDiff < 2592000) {
        $weeks = floor($timeDiff / 604800);
        return $weeks . ' week' . ($weeks > 1 ? 's' : '') . ' ago';
    } elseif ($timeDiff < 31536000) {
        $months = floor($timeDiff / 2592000);
        return $months . ' month' . ($months > 1 ? 's' : '') . ' ago';
    } else {
        $years = floor($timeDiff / 31536000);
        return $years . ' year' . ($years > 1 ? 's' : '') . ' ago';
    }
}
?>

<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
            <li>
                <a href="../.././loan/index.php">
                    <button type="button" class="btn btn-info btn-fw">User Panel</button>
                </a>
            </li>
            <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-email"></i>
                    <span class="count bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                    <h6 class="p-3 mb-0">Messages</h6>
                    <?php
                    if ($mesResult->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($mesResult)) {
                            $submission_time = $row['Time'];
                    ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item d-flex align-items-center">
                                <div class="preview-thumbnail rounded-circle" style="height: 5px; width: 5px; background-color: green;">
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject"><?php echo $row["Name"]; ?> Applied for a Loan</p>
                                    <p class="text-muted mb-0"> <?php echo timeAgo($submission_time); ?> </p>
                                </div>
                            </a>
                    <?php
                        }
                    }
                    ?>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                    <div class="navbar-profile">
                    <?php 
                    $users = mysqli_query($con, "SELECT * FROM USER WHERE Id = '$id'");
                    $row1 = mysqli_fetch_assoc($users);
                    if(!$row1['Image']){
                        $src = "https://via.placeholder.com/100";
                    } else{
                        $src = "./uploads/" . $row1['Image'];   
                    }?>
                        <img class="img-xs rounded-circle" src="<?php echo $src; ?>" alt="">
                        <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['name']; ?></p>
                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                    <h6 class="p-3 mb-0">Profile</h6>
                    <div class="dropdown-divider"></div>
                    <a href="./user_profile.php" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1">Profile</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="../.././loan/logout.php" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-logout text-danger"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1">Log out</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>
    </div>
</nav>
