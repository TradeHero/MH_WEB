<?php 
#Show Error
define('APP_SHOW_ERROR', true);

ini_set('display_errors', (APP_SHOW_ERROR) ? 'On' : 'Off');
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
define('SHOW_SQL_ERROR', APP_SHOW_ERROR);

define('APP_VERSION', '2.3.5');
define('APP_INSTALL_HASH', '6c4614cd2f738ea7c682928564658b18b70bc656');

define('APP_ROOT', dirname(__FILE__));
define('APP_DOMAIN_PATH', 'blog.tradehero.mobi/iwp/');

define('EXECUTE_FILE', 'execute.php');
define('DEFAULT_MAX_CLIENT_REQUEST_TIMEOUT', 180);//Request to client wp

$config = array();
$config['SQL_DATABASE'] = 'thwp';
$config['SQL_HOST'] = 'localhost';
$config['SQL_USERNAME'] = 'thadmin';
$config['SQL_PASSWORD'] = 'password9901';
$config['SQL_PORT'] = '3306';
$config['SQL_TABLE_NAME_PREFIX'] = 'infwp_';

define('SQL_DRIVER', 'mysqli');

session_name ('adminPanel');

?>