<?php
define('SS_DATABASE_SERVER',   '127.0.0.1');
//define('SS_DATABASE_CLASS',    'MySQLDatabase');
define('SS_DATABASE_TIMEZONE', '+00:00');
define('SS_DATABASE_USERNAME', 'root');
define('SS_DATABASE_PASSWORD', 'root');
define('SS_DATABASE_NAME',     'vagrant');
//define('SS_DATABASE_SUFFIX', 'dev_');
//
define('SS_ENVIRONMENT_TYPE', 'dev');

define('SS_DEFAULT_ADMIN_USERNAME', 'admin');
define('SS_DEFAULT_ADMIN_PASSWORD', 'admin');

global $_FILE_TO_URL_MAPPING;
$_FILE_TO_URL_MAPPING['/vagrant/www'] = 'http://ss.local.dev';