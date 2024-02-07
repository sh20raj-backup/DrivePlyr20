<?php
session_start();
include '../../conn.php';

function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    echo "Not Allowed";
    exit;
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Invalid video ID";
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM videos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Video not found";
    exit;
}

if (!isset($_POST['url']) || !isset($_POST['title']) || !isset($_POST['description']) || !isset($_POST['poster_url']) || !isset($_POST['player'])) {
    echo "Missing required fields";
    exit;
}

$url = sanitizeInput($_POST['url']);
$title = sanitizeInput($_POST['title']);
$description = sanitizeInput($_POST['description']);
$allowDownload = isset($_POST['allow_download']) ? 1 : 0;
$monetization = isset($_POST['monetization']) ? 1 : 0;
$posterURL = sanitizeInput($_POST['poster_url']);
$player = sanitizeInput($_POST['player']);

$userID = $_SESSION['id']; // Assuming the session contains 'id' information

$updateSql = "UPDATE videos SET url = ?, title = ?, description = ?, allow_download = ?, monetization = ?, player = ?, poster_url = ? WHERE id = ? AND user = ?";
$stmt = $conn->prepare($updateSql);
$stmt->bind_param("sssiiisii", $url, $title, $description, $allowDownload, $monetization, $player, $posterURL, $id, $userID);

if ($stmt->execute()) {
    header('Location: ../edit.php?id=' . $id);
} else {
    echo "Error updating video details: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
