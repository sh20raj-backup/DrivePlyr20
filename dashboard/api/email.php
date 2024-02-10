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
    // Set the "Content-Type" header to specify CSV format
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="user_emails.csv"');

    // Create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    // Output the CSV headers
    fputcsv($output, array('Email'));

    // Fetch and output each user's email
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }

    // Close the file pointer
    fclose($output);
} else {
    echo "No users found.";
}

// Close the database connection
$conn->close();
?>
