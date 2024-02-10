<?php
session_start();
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'conn.php';
include 'func.php';
// Check if the user is logged in


// Get the video ID from the URL parameter
$id = $_GET['id'];

// Fetch the video information from the database
$sql = "SELECT * FROM videos where id = $id";
$result = $conn->query($sql);

// Check if the video exists
if ($result->num_rows === 0) {
    echo "Video not found";
    exit;
}

// Get the video data
$row = $result->fetch_assoc();
$videoURL = $row['url'];
$videoHosting = $row['hosting'];
$videoTitle = $row['title'];
$videoDescription = $row['description'];
$videoAllowDownload = $row['allow_download'];
$videoPosterURL = $row['poster_url'];
$views = $row['views'];
$userid = $row['user'];


/*print_r($row);
die();*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="title" content="<?php echo $videoTitle ?> - DrivePlyr ">
<meta name="description" content="<?php echo $videoDescription ?> - DrivePlyr :- Custom Video Player for You">
<meta name="keywords" content="DrivePlyr, Video Player, Custom HTML5 Video Player, Video Player, Plyr, YouTube Alternatives,Drive">
<meta property="og:image" content="<?php echo $videoPosterURL ?>" />
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="author" content="Shade">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="logo.png" type="image/x-icon">

<!-- Primary Meta Tags -->
<title><?php echo $videoTitle ?> - DrivePlyr</title>
<meta name="title" content="<?php echo $videoPosterURL ?>" />
<meta name="description" content="<?php echo $videoDescription ?> - DrivePlyr" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="video.other" />
<meta property="og:url" content="https://driveplyr.appspages.online/" />
<meta property="og:title" content="<?php echo $videoTitle ?> - DrivePlyr" />
<meta property="og:description" content="<?php echo $videoDescription ?> - DrivePlyr" />
<meta property="og:image" content="<?php echo $videoPosterURL ?>" />

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="https://driveplyr.appspages.online/watch/<?php echo $id ?>" />
<meta property="twitter:title" content="<?php echo $videoPosterURL ?>" />
<meta property="twitter:description" content="<?php echo $videoDescription ?> - DrivePlyr" />
<meta property="twitter:image" content="<?php echo $videoPosterURL ?>" />
<link rel="shortcut icon" href="../../logo.png" type="image/x-icon">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=64bd1f4e71afd40013e96b95&product=sop' async='async'></script>
<meta name="google-site-verification" content="ubhg9we6wc41fJACqLrs51HI0B3boz7ktsfdGaxD01Q" />
<meta name="theme-color" content="#007bff">
<link rel="manifest" href="manifest.json">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QBWQNYW0DQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-QBWQNYW0DQ');
</script>
<script>
    // Check if the browser supports the beforeinstallprompt event
    if ('serviceWorker' in navigator && 'BeforeInstallPromptEvent' in window) {
      window.addEventListener('load', () => {
        // Wait for the beforeinstallprompt event
        window.addEventListener('beforeinstallprompt', (event) => {
          // Prevent the default "Add to Home Screen" prompt
          event.preventDefault();

          // Automatically show the "Add to Home Screen" prompt on page load
          event.prompt();
        });
      });
    }

  window.addEventListener('load', () => {
      window.addEventListener('beforeinstallprompt', (event) => {
        event.preventDefault();
        event.prompt();
      });
    });
  
        // Function to set the theme mode (light or dark)
    function setThemeMode(mode) {
        document.body.classList.toggle('dark-mode', mode === 'dark');
        localStorage.setItem('theme', mode);
    }

    // Function to toggle the theme mode
    function toggleThemeMode() {
        const currentMode = localStorage.getItem('theme');
        const newMode = currentMode === 'dark' ? 'light' : 'dark';
        setThemeMode(newMode);
    }

    // Check if the user's preference is stored in localStorage
    const storedTheme = localStorage.getItem('theme');

    if (storedTheme) {
        setThemeMode(storedTheme);
    } else {
        // Default to light mode if no preference is stored
        setThemeMode('light');
    }

    // Add an event listener to the toggle button
    const toggleButton = document.getElementById('dark-mode-toggle');
    toggleButton.addEventListener('click', toggleThemeMode);


</script>
  <link rel="shortcut icon" href="../../logo.png" type="image/x-icon">
  <title><?php echo $videoTitle ?> - DrivePlyr</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../../">DrivePlyr</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../../../">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../dashboard/">Upload</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../dashboard/add.php?url=">Dashboard</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="embed-responsive embed-responsive-16by9">
                   
                <div id="myHeader">
                <div style="overflow:hidden;" id="driveplyr<?php echo $id ?>"></div>
                    <script player="plyr" src="https://driveplyr.appspages.online/player.js" data-id="<?php echo $id ?>" data-height="500px" data-width="100%" data-type="driveplyr" defer></script>
                </div>
    
                </div>

                <div class="mt-4">
                    <h4><?php echo $videoTitle ?></h4>
                  <div class="text-muted">
                    <?php echo formatViewsCount($views).' views • '.convertToRelativeTime($row['date']) ?>
                    </div>
                    <p><?php echo youtubeLikeDescription($videoDescription) ?></p>

                    <!-- Like, Dislike, Views, Date, Report, Download buttons -->
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-primary mr-2"><i class="material-icons">thumb_up</i></button>
                            <button type="button" class="btn btn-sm btn-outline-danger mr-2"><i class="material-icons">thumb_down</i></button>
                            <button type="button" class="btn btn-sm btn-outline-secondary mr-2"><i class="material-icons">code</i></button>
                            <a href="mailto:mail@appspages.online?subject=REPORT-OF-VIDEO-ID-<?php echo $id ;  ?>"><button type="button" class="btn btn-sm btn-outline-danger mr-2"><i class="material-icons">flag</i></button></a>
                            <?php if($videoAllowDownload){ echo '<a href="https://driveplyr.appspages.online/api/download.php?url='.$videoURL.'"><button type="button" class="btn btn-sm btn-outline-success mr-2"><i class="material-icons">get_app</i></button></a>' ;}?>
                        </div>
                    </div>

                    <!-- Comments section -->
                    <h5 class="mt-4">Comments</h5>
                    <div class="comments">
                    <div id="disqus_thread"></div>
                            <script>
                                /**
                                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                                
                                var disqus_config = function () {
                                //this.page.url = "https://driveplyr.appspages.online/watch/<?php echo $id ?>/";  // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier = <?php echo $id ?>; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };
                                
                                (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://driveplyr.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                    <script id="dsq-count-scr" src="//driveplyr.disqus.com/count.js" async></script>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <!-- Channel information -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <img src="https://imgur.com/n5MBy0m.png" height="50px" width="50px" alt="Channel Logo" class="rounded-circle mr-2">
                            <div>
                                <a href="../../channel/<?php echo $userid ?>">
                                <h5 class="card-title"><?php echo getUser($userid)[0]->name ?></h5>
                                <p class="card-text">Join</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommended videos section -->
                <h5 class="mt-4">Recommended Videos</h5>
                <div class="list-group">
                <?php
                        // Assuming you have already established a database connection
                        // Replace 'your_table_name' with the actual table name

                        // Retrieve the video list from the database
                        //$user = $_SESSION['id'];

                        // Your PHP variables containing the video information
                        $video_id = $id; // Replace with the actual video ID
                        $video_title = $conn->real_escape_string($videoTitle); // Replace with the actual video title
                        $video_description = $conn->real_escape_string($videoDescription); // Replace with the actual video description
                        $video_user = $userid; // Replace with the actual video user


                        // Prepare the SQL query with placeholders for the variables
                        // Prepare the SQL query with placeholders for the variables
                        $sql = "(SELECT *, 1 as priority
                                FROM videos
                                WHERE id <> $video_id
                                AND user = '$video_user'
                                AND (
                                    title LIKE CONCAT('%', '$video_title', '%')
                                    OR description LIKE CONCAT('%', '$video_description', '%')
                                )
                                LIMIT 10)
                                UNION
                                (SELECT *, 0 as priority
                                FROM videos
                                WHERE id <> $video_id
                                AND user <> '$video_user'
                                AND id NOT IN (SELECT id FROM videos WHERE id <> $video_id AND user = '$video_user')
                                AND (
                                    title LIKE CONCAT('%', '$video_title', '%')
                                    OR description LIKE CONCAT('%', '$video_description', '%')
                                )
                                LIMIT 10)
                                UNION
                                (SELECT *, -1 as priority
                                FROM (
                                    SELECT *
                                    FROM videos
                                    ORDER BY RAND()
                                    LIMIT 10
                                ) AS random_videos
                                ORDER BY views DESC
                                )
                                ORDER BY priority DESC, RAND()
                                LIMIT 10";



                        // Execute the query
                        $result = $conn->query($sql);

                        // Check if the query was successful
                        if ($result === false) {
                            // If there's an error, display the error message
                            echo "Error executing query: " . $conn->error;
                            exit; // Exit the script to prevent further execution
                        }

                        // Fetch the results into an array
                        $relatedVideos = $result->fetch_all(MYSQLI_ASSOC);

                        // Now you have the related videos in the $relatedVideos array
                        // You can use this data to display the related videos on your website

                        if (count($relatedVideos) > 0) {
                            // Loop through each video and generate the HTML for related video thumbnails
                            foreach ($relatedVideos as $row) {
                                $videoId = $row['id'];
                                $videoTitle = $row['title'];
                                $videoPosterURL = $row['poster_url'] ?: 'https://cdn.statically.io/og/theme=dark/'.$videoTitle.'.png';
                                $videoStatus = 'Public'; //$row['status'];
                                $videoViews = $row['views'];
                                $videoDownloads = $row['downloads'];
                                $videoScore = '100%'; //$row['progress'];

                                echo '
                                <a href="../../watch/' . $videoId . '/' . generateSlug($videoTitle) . '" class="list-group-item list-group-item-action">
                                    <img src="' . $videoPosterURL . '" alt="DrivePlyr Video" class="img-fluid">
                                    <div class="caption">
                                        <h6 class="mt-2">' . $videoTitle . '</h6>
                                    </div>
                                </a>';
                            }
                        } else {
                            echo '<p>No videos found.</p>';
                        }
                        ?>
                    
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">© 2024 DrivePlyr, Inc.</span>
        </div>
    </footer>

    <!-- The Modal -->
    <div class="modal" id="myModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Share</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  <h4>Copy Code to Embed This Video</h4>
                  <center>
                     <!-- Telegram -->
                     <!-- ... (previous social media icons) ... -->
                     <!-- Copy Code Button -->
                     <button class="btn btn-success" onclick="copyCodeToClipboard()">Copy Code</button>
                     <br><br><button id="copyButton" class="btn btn-primary">Copy Link</button>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="form-control-label" for="player">Player - 
                           <a target="_blank" rel="nofollow" data-toggle="tooltip" data-original-title="See Example on DrivePlyr Documentation" href="https://driveplyr.hashnode.dev/top-html5-custom-video-players-with-documentation-video">See Examples</a></label>
                           <select onchange="document.getElementById('plyredit').innerHTML = document.getElementById('player').value" class="form-control" name="player" id="player">
                              <option value="plyr">Plyr</option>
                              <option value="sopplayer">SopPlayer</option>
                              <option value="vlitejs">vLiteJS</option>
                              <option value="griffith">griffith</option>
                              <option value="videojs">VideoJS</option>
                              <option value="jwplayer">JWPlayer</option>
                              <option value="mediaelements">Mediaelements</option>
                              <option value="clapper">Clapper</option>
                              <option value="rainplayer">RainPlayer</option>
                              <option value="openplayerjs">OpenPlayerJS</option>
                              <option value="kwgplayer">KWGPlayer</option>
                              <option value="ckin">Ckin</option>
                              <option value="cutesu">CuteSu</option>
                              <option value="xgplayer">XgPlayer</option>
                              <option value="flowplayer">Flowplayer</option>
                              <option value="fluid">Fluidplayer {Earn Money}</option>
                              <option value="flamingo">Flamingo</option>
                              <option value="redroselite">RedRoseLite</option>
                              <option value="none">NONE</option>
                           </select>
                        </div>
                     </div>
                     <pre><code class="language-html">
                      &lt;div id="driveplyr<?php echo $id ?>"&gt;&lt;/div&gt;
                      &lt;script player="<span id="plyredit">fluid</span>" src="https://driveplyr.appspages.online/player.js" data-id="<?php echo $id ?>" data-height="500px" data-width="100%" data-type="driveplyr" defer&gt;&lt;/script&gt;
                      </code></pre>
                     <script>
                        function copyCodeToClipboard() {
                          const codeBlock = document.querySelector("pre code");
                          const codeText = codeBlock.innerText;
                        
                          const textArea = document.createElement("textarea");
                          textArea.value = codeText;
                          document.body.appendChild(textArea);
                        
                          textArea.select();
                          document.execCommand("copy");
                          document.body.removeChild(textArea);
                        
                          alert("Code copied to clipboard!");
                        }
                     </script>
                     <!-- Add Bootstrap JS and custom JavaScript -->
                     <script>
                        document.getElementById("copyButton").addEventListener("click", function() {
                          var currentLink = window.location.href;
                          var tempInput = document.createElement("input");
                          tempInput.style = "position: absolute; left: -1000px; top: -1000px";
                          tempInput.value = currentLink;
                          document.body.appendChild(tempInput);
                          tempInput.select();
                          document.execCommand("copy");
                          document.body.removeChild(tempInput);
                          alert("Current link copied to clipboard!");
                        });
                     </script>
                     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
                     <!-- ShareThis BEGIN -->
                     <div class="sharethis-inline-share-buttons"></div>
                     <!-- ShareThis END -->
                     <!-- Telegram -->
                     <a style="color: #ac2bac;" href="#!" role="button" onclick="shareToTelegram(); return false;">
                     <i class="fab fa-telegram fa-lg"></i>
                     </a>
                     <!-- Facebook -->
                     <a style="color: #3b5998;" href="#!" role="button" onclick="shareToFacebook(); return false;">
                     <i class="fab fa-facebook-f fa-lg"></i>
                     </a>
                     <!-- Twitter -->
                     <a style="color: #55acee;" href="#!" role="button" onclick="shareToTwitter(); return false;">
                     <i class="fab fa-twitter fa-lg"></i>
                     </a>
                     <!-- Google
                        <a style="color: #dd4b39;" href="#!" role="button" onclick="shareToGoogle(); return false;">
                          <i class="fab fa-google fa-lg"></i>
                        </a> -->
                     <!-- Instagram -->
                     <a style="color: #ac2bac;" href="#!" role="button" onclick="shareToInstagram(); return false;">
                     <i class="fab fa-instagram fa-lg"></i>
                     </a>
                     <script>
                        function shareToTelegram() {
                          shareToSocialMedia('https://telegram.me/share/', getCurrentURLAndTitle());
                        }
                        
                        function shareToFacebook() {
                          shareToSocialMedia('https://www.facebook.com/sharer/sharer.php', getCurrentURLAndTitle());
                        }
                        
                        function shareToTwitter() {
                          shareToSocialMedia('https://twitter.com/intent/tweet', getCurrentURLAndTitle());
                        }
                        
                        function shareToGoogle() {
                          shareToSocialMedia('https://plus.google.com/share', getCurrentURLAndTitle());
                        }
                        
                        function shareToInstagram() {
                          shareToSocialMedia('https://www.instagram.com/share/url', getCurrentURLAndTitle());
                        }
                        
                        function getCurrentURLAndTitle() {
                          return {
                            url: window.location.href,
                            title: document.title
                          };
                        }
                        
                        function shareToSocialMedia(url, data) {
                          var params = Object.keys(data).map(function (key) {
                            return encodeURIComponent(key) + '=' + encodeURIComponent(data[key]);
                          }).join('&');
                        
                          window.open(url + '?' + params, 'Share', 'width=600,height=400');
                        }
                     </script>
                     <script>
                        window.onscroll = function() {myFunction()};
                        
                        var header = document.getElementById("myHeader");
                        var sticky = header.offsetTop;
                        
                        function myFunction() {
                          if (window.pageYOffset > sticky) {
                            header.classList.add("sticky");
                          } else {
                            header.classList.remove("sticky");
                          }
                        }
                            
                     </script>
                  </center>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <?php  include 'tracker.php';?>

    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
