
<title><?php echo $title ?></title>
<link href="https://cdn.jsdelivr.net/gh/sh20raj-backup/Sopplayer@v2.0.0/sopplayer.min.css" rel="stylesheet" />
<link rel="icon" href="../logo.png">
<script src="https://cdn.jsdelivr.net/gh/sh20raj-backup/Sopplayer@v2.0.0/sopplayer.min.js" defer></script>
<style>
  html, body { height: 100%; margin: 0; padding: 0; }
  #my-video { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
  .vjs-poster { background-color: transparent; }
</style>
<video id="my-video" class="sopplayer" controls preload="auto" data-setup="{}" width="100%" poster="<?php echo $poster_url ?>">
  <source src="<?php echo $videourl ?>" type="video/mp4" />
</video>
