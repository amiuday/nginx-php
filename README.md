# nginx-php

🧠 Core Idea (1-line truth)

Nginx handles the web. PHP handles the logic. They are separated on purpose.

That separation is the strategy.

🔍 Why NOT run PHP directly?

PHP cannot:

Handle thousands of concurrent connections efficiently

Serve static files fast

Act as a reverse proxy

Handle SSL termination properly

Nginx can do all of this — extremely well.


===================================================
🎯 Responsibilities (Clear separation)
🟢 Nginx (Front-facing)

Accepts HTTP/HTTPS requests

Handles:

Static files (HTML, CSS, JS, images)

Load balancing

SSL/TLS

Rate limiting

Reverse proxy

Extremely fast, event-driven

🔵 PHP-FPM (Backend logic)

Executes PHP code

Manages PHP worker processes

Handles only .php requests

Optimized for CPU-bound logic


🐳 Docker-based Architecture (What YOU built)
Browser
   |
   v
EC2 Host (Port 80)
   |
   v
Nginx Container
   |
   |  fastcgi_pass php:9000
   v
PHP-FPM Container
   |
   v
Shared Volume (/var/www/html)


This is production-grade architecture.

🔑 One powerful takeaway (remember this)

“Web servers handle traffic. App servers handle logic.”

If you understand this, you understand:

Nginx + PHP

Nginx + Java

Nginx + Python

ALB + ECS

API Gateway + Lambda

===========================================================
default.conf file


🔄 Full Request Flow (REAL LIFE)
User opens:
http://your-ip/

Step-by-step:

Browser → Nginx (port 80)

Nginx checks /

No static file → routes to /index.php

Nginx forwards request via FastCGI

PHP-FPM executes index.php

PHP sends output back

Nginx returns response to browser

🧠 One-line summary (remember this forever)

Nginx decides WHERE the request goes.
PHP-FPM decides WHAT logic runs.
================================================================
