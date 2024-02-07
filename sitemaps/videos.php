<?php

include "../conn.php";
include "../func.php";

// Retrieve the video list from the database
$sql = "SELECT * FROM videos ORDER BY id DESC";
$result = $conn->query($sql);

// Start generating the XML for sitemap
header('Content-Type: application/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

if ($result->num_rows > 0) {
    // Loop through each video and generate the URL in sitemap
    while ($row = $result->fetch_assoc()) {
        $videoId = $row['id'];
        $videoTitle = htmlspecialchars($row['title']);
        $videoURL = 'https://driveplyr.appspages.online/watch/' . $videoId.'/'.generateSlug($videoTitle).''; // Change this URL according to your website structure
        $videoLastModified = date('c'); // You can use last modified date of the video from the database if available
        
        // Output the URL to the sitemap
        echo '<url>';
        echo '<loc>' . $videoURL . '</loc>';
        echo '<lastmod>' . $videoLastModified . '</lastmod>';
        echo '<changefreq>weekly</changefreq>'; // Change frequency as per your website's update frequency
        echo '<priority>1</priority>'; // Priority can be adjusted based on importance
        echo '</url>';
    }
}

// End the XML for sitemap
echo '</urlset>';

// Close database connection
$conn->close();
?>
