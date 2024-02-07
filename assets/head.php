<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">

    <!-- Primary Meta Tags -->
<title>DrivePlyr</title>
<meta name="title" content="DrivePlyr" />
<meta name="description" content="DrivePlyr is a video sharing platform that allows users to upload, share, and view videos.

" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="https://driveplyr.appspages.online/" />
<meta property="og:title" content="DrivePlyr" />
<meta property="og:description" content="DrivePlyr is a video sharing platform that allows users to upload, share, and view videos.

" />
<meta property="og:image" content="../logo.png" />

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="https://driveplyr.appspages.online/" />
<meta property="twitter:title" content="DrivePlyr" />
<meta property="twitter:description" content="DrivePlyr is a video sharing platform that allows users to upload, share, and view videos.

" />
<meta property="twitter:image" content="../logo.png" />

<!-- Meta Tags Generated with https://metatags.io -->


    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- CSS File -->
    <link rel="stylesheet" href="styles.css" />
    <meta name="google-site-verification" content="ubhg9we6wc41fJACqLrs51HI0B3boz7ktsfdGaxD01Q" />
    <style>

    </style>
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