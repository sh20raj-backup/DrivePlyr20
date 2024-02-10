<?php
include '../../conn.php';

// Function to output CSV data
function outputCSV($data) {
    // Set the "Content-Type" header to specify CSV format
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="user_emails.csv"');

    // Create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    // Output the CSV headers
    fputcsv($output, array('Email'));

    // Fetch and output each user's email
    foreach ($data as $row) {
        fputcsv($output, $row);
    }

    // Close the file pointer
    fclose($output);
}

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
    $usersData = array();

    // Fetch each user's email and store them in the $usersData array
    while ($row = $result->fetch_assoc()) {
        $usersData[] = $row;
    }

    // If download parameter is set to true, download the CSV file directly
    if(isset($_GET['download']) && $_GET['download'] === 'true') {
        outputCSV($usersData);
    } else {
        // Set the "Content-Type" header to specify JSON format
        header('Content-Type: application/json');

        // Convert the $usersData array to JSON format
        $json = json_encode($usersData);

        // Print the JSON data
        echo $json;
    }
} else {
    echo "No users found.";
}

// Close the database connection
$conn->close();
?>
