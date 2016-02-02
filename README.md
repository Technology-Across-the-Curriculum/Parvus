

# Parvus

Parvus is an extremely simple and easy to understand skeleton PHP application, that has been rewritten from Mini, 
to incorporate some missing professional features.If you just want to show some pages, do a few database calls and a 
little-bit of AJAX here and there, without reading in massive documentations of highly complex professional frameworks, 
then Parvus might be very useful for you. Parvus is easy to install, runs nearly everywhere and doesn't make 
things more complicated than necessary.

## Features

- extremely simple, easy to understand
- simple but clean structure
- makes "beautiful" clean URLs
~~- demo CRUD actions: Create, Read, Update and Delete database entries easily~~
~~- demo AJAX call~~
- tries to follow PSR 1/2 coding guidelines
- uses PDO for any database requests, comes with an additional PDO debug tool to emulate your SQL statements
- commented code
- uses only native PHP code, so people don't have to learn a framework

## This is a fork form Mini developed by Panique

## Requirements

- PHP 5.3.0+
- MySQL
- mod_rewrite activated (tutorials below, but there's also [TINY](https://github.com/panique/tiny), a mod_rewrite-less 
version of MINI)


## Installation

1. Edit the database credentials in `application/config/config.php`
2. Make sure you have mod_rewrite activated on your server / in your environment. Some guidelines:
   [Ubuntu 14.04 LTS](http://www.dev-metal.com/enable-mod_rewrite-ubuntu-14-04-lts/),
   [Ubuntu 12.04 LTS](http://www.dev-metal.com/enable-mod_rewrite-ubuntu-12-04-lts/),
   [EasyPHP on Windows](http://stackoverflow.com/questions/8158770/easyphp-and-htaccess),
   [AMPPS on Windows/Mac OS](http://www.softaculous.com/board/index.php?tid=3634&title=AMPPS_rewrite_enable/disable_option%3F_please%3F),
   [XAMPP for Windows](http://www.leonardaustin.com/blog/technical/enable-mod_rewrite-in-xampp/),
   [MAMP on Mac OS](http://stackoverflow.com/questions/7670561/how-to-get-htaccess-to-work-on-mamp)

MINI runs without any further configuration. You can also put it inside a sub-folder, it will work without any 
further configuration.

## Server configs for

### nginx

```nginx
server {
    server_name default_server _;   # Listen to any servername
    listen      [::]:80;
    listen      80;

    root /var/www/html/myproject/public;

    location / {
        index index.php;
        try_files /$uri /$uri/ /index.php?url=$uri;
    }

    location ~ \.(php)$ {
        fastcgi_pass   unix:/var/run/php5-fpm.sock;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

A deeper discussion on nginx setups can be found [here](https://github.com/panique/mini/issues/55).

## Security

The script makes use of mod_rewrite and blocks all access to everything outside the /public folder.
Your .git folder/files, operating system temp files, the application-folder and everything else is not accessible
(when set up correctly). For database requests PDO is used, so no need to think about SQL injection (unless you
are using extremely outdated MySQL versions).

## Goodies

Parvus comes with a little customized [PDO debugger tool](https://github.com/panique/pdo-debug) (find the code in
application/libs/helper.php), trying to emulate your PDO-SQL statements. It's extremely easy to use:

```php
$sql = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
$query = $this->db->prepare($sql);
$parameters = array(':song_id' => $song_id);

echo Helper::debugPDO($sql, $parameters);

$query->execute($parameters);
```

## License

This project is licensed under the MIT License.
This means you can use and modify it for free in private or commercial projects.


## History

Parvus is the successor of Mini. Mini was lacking some if the desirced freature of a professional framework, like multiple
models in a controller, so Parvus was born to act more like a profecional framework wihtout the complexity.


## Contribute

Please commit into the develop branch (which holds the in-development version), not into master branch
(which holds the tested and stable version).

## Changelog
**February 2016**
- [NathanHealea] Added multiple model and entity loading to single contoller
- [NathanHealea] Removed demo code that was in Mini

## From MINI
**February 2015**

- [jeroenseegers] nginx setup configuration

**December 2014**
- [panique] css fixes
- [panique] renamed controller / view to singular
- [panique] added charset to PDO creation (increased security) 

**November 2014**
- [panique] auto-install script for Vagrant
- [panique] basic documentation
- [panique] PDO-debugger is now a static helper-method, not a global function anymore
- [panique] folder renaming
- [reg4in] JS AJAX calls runs now properly even when using script in sub-folder
- [panique] removed all "models", using one model file now
- [panique] full project renaming, re-branding

**October 2014**
- [tarcnux/panique] PDO debugging
- [panique] demo ajax call
- [panique] better output escaping
- [panique] renamed /libs to /core
- [tarcnux] basic CRUD (create/read/update/delete) examples have now an U (update)
- [panique] URL is now config-free, application detects URL and sub-folder
- [elysdir] htaccess has some good explanation-comments now
- [bst27] fallback for non-existing controller / method
- [panique] fallback will show error-page now
- [digitaltoast] URL split fix to make php-mvc work flawlessly on nginx
- [AD7six] security improvement: moved index.php to /public, route ALL request to /public

**September 2014**
- [panique] added link to support forum
- [panique] added link to Facebook page

**August 2014**
- [panique] several changes in the README, donate-button changes

**June 2014**
- [digitaltoast] removed X-UA-Compatible meta tag from header (as it's not needed anymore these days)
- [digitaltoast] removed protocol in jQuery URL (modern way to load external files, making it independent to protocol change)
- [digitaltoast] downgraded jQuery from 2.1 to 1.11 to avoid problems when working with IE7/8 (jQuery 2 dropped IE7/8 support)
- [panique] moved jQuery loading to footer (to avoid page render blocking)

**April 2014**
- [panique] updated jQuery link to 2.1
- [panique] more than 3 parameters (arguments to be concrete) are possible
- [panique] cleaner way of parameter handling
- [panique] smaller cleanings and improvements
- [panique] Apache 2.4 install information

**January 2014**
- [panique] fixed .htaccess issue when there's a controller named "index" and a base index.php (which collide)

