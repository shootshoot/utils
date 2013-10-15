<?php
require('../functions.php');

$whitelist = array(
    dirname(__FILE__).'/reglement.pdf',
    dirname(__FILE__).'/lot.pdf',
    dirname(__FILE__).'/mentions-legales.pdf',
);

$file = lpu_get_param('PATH_INFO', FALSE, 'server');
$filepath = dirname(__FILE__). $file;

download_file($filepath, $whitelist);


exit;
