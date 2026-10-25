# DrivePlyr20

**PHP template collection for Google Drive proxy playback with multiple HTML5 video-player integrations.** This repository contains server-side templates and player examples; it is intended to run on a PHP-capable host.

[![Source](https://img.shields.io/badge/source-GitHub-181717?logo=github)](https://github.com/sh20raj-backup/DrivePlyr20)
[![Pages artifact workflow](https://github.com/sh20raj-backup/DrivePlyr20/actions/workflows/pages.yml/badge.svg?branch=main)](https://github.com/sh20raj-backup/DrivePlyr20/actions/workflows/pages.yml)

## Related projects

- [Sopplayer](https://github.com/sh20raj-backup/Sopplayer) — HTML5 media player library and CDN distribution.
- [DrivePlyr](https://github.com/sh20raj-backup/DrivePlyr) — static demos and integration examples.
- [VideoPlyr](https://github.com/sh20raj-backup/VideoPlyr) — HTML5 player demo hub.

## Sopplayer CDN

New integrations should use the version-pinned backup CDN:

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/sh20raj-backup/Sopplayer@v2.0.0/sopplayer.min.css">
<script src="https://cdn.jsdelivr.net/gh/sh20raj-backup/Sopplayer@v2.0.0/sopplayer.min.js"></script>
```

## Hosting and deployment

The [Pages workflow](.github/workflows/pages.yml) can publish static assets for reference and demo purposes. **GitHub Pages does not run PHP**; PHP templates in `player/` must be served by PHP-enabled hosting to function. A successful Pages deployment is not a PHP application runtime test.

Use the GitHub Actions tab to inspect current workflow results: https://github.com/sh20raj-backup/DrivePlyr20/actions

## License

Refer to the repository's existing license file, if present.
