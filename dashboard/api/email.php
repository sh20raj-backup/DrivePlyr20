<?php
include '../../conn.php';

// Query to fetch all users' emails from the 'users' table
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT email FROM users WHERE id = $id";
} else {
    $sql = "SELECT email FROM users";
}

$result = $conn->query($sql);

// Check if any users were found
if ($result->num_rows > 0) {
    $emails = array();

    // Fetch each user's email and store them in the $emails array
    while ($row = $result->fetch_assoc()) {
        $emails[] = $row['email'];
    }

    // If download parameter is set to true, download the CSV file directly
    if(isset($_GET['download']) && $_GET['download'] === 'true') {
        // Set the "Content-Type" header to specify CSV format
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="user_emails.csv"');

        // Output the CSV data
        echo implode(",", $emails);
    } else {
        // Output the emails as comma-separated string
        echo implode(",", $emails);
    }
} else {
    echo "No users found.";
}

// Close the database connection
$conn->close();
?>
