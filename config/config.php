<?php
define('DEVELOPMENT_ENVIRONMENT', true);
define('BASE_PATH', 'http://localhost/novi-builder');
define('URL_WEBSITE', 'http://novi-builder.test');
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
// define('BASE_PATH', 'https://nvireview.com');
// define('URL_WEBSITE', 'https://nvireview.com');
// define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/public');
define('DEFAULT_CONTROLLER', 'home');
define('SITES_URL', $_SERVER['HTTP_HOST']);

define('DB_NAME', 'db_novi'); // Data base Name
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');

define('TIMEZONE', 'Asia/Jakarta');

//================================================================================================
define('FAVICON', 'favicon.png');
//================================================================================================
define('SITE_LOGO', 'NviReview Stream Free Movies & TV Shows');
define('SITE_NAME', 'NviReview');
define('SITE_DESCRIPTION', 'Browse and Watch all your favorite online movies &amp; series for free!');
define('SITE_KEYWORDS', 'full movie, full episode, full hd movie, free download');

define('HISTATS_ID', '4802318');
//================================================================================================

define('PROTECT_CONTENT', 'true'); // disable klik kanan, block text, copy paste pada halaman LP

define('URL_END', '.html');