<?php
defined('BASEPATH') or exit('No direct script access allowed');

header('Author: Ferdy Ramadhan, S.Kom.');
header('X-XSS-Protection: 1');
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('Vary: Accept-Encoding');

if (isset($header)) {
   echo $header;
}

if (isset($main_header)) {
   echo $main_header;
}

if (isset($content)) {
   echo $content;
}

if (isset($notices)) {
   echo $notices;
}

if (isset($footer)) {
   echo $footer;
}