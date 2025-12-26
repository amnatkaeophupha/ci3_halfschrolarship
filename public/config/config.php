<?php

$curPage = curPageURL();

define('SITE_URL', $curPage."/central"); 
define('ADMIN_DIR', 'https://www.aru.ac.th/myadmin');

// DATABASE CONNECT SETTINGS (REQUIRED)
define('DB_HOST', 'localhost'); 
// define('DB_HOST', 'www.aru.ac.th'); 
define('DB_PORT', 3306); 
define('DB_USER', 'admin'); 
define('DB_PASS', 'Adminaruacth'); 
define('DB_NAME', 'myadmin'); 
define('DB_CHARSET', 'utf8'); 
define('DB_COLLATE', 'utf8_general_ci'); 
define('SITE_ID', 9);

if(!defined('ABSPATH')) define('ABSPATH', dirname(__FILE__)); //C:\xampp\htdocs\asi\config

/*==============================================
// YOU DON'T NEED DO CHANGE ANYTHING BELOW
==============================================*/
// CONNECT TO DATABASE
$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET.";port=".DB_PORT;
$opt = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
		PDO::ATTR_PERSISTENT => true,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
];
try {	
	$conn = new PDO($dsn, DB_USER, DB_PASS, $opt);
	$conn->exec("set names utf8");
}
catch (PDOException $e) {
    print "Error! " . $e->getMessage() . "<br/>";
    die();
}

if (!extension_loaded('pdo') )
{
	exit('<strong>FATAL ERROR! This software requires PDO extension (PHP Data Objects).</strong> Please contact your hosting!<br /><br />Read more about <a href="http://php.net/manual/en/book.pdo.php" target="_blank">PHP PDO</a>');
}

// check for PHP version
if (version_compare(phpversion(), '5.5', '<')) {
	// php version isn't high enough
	$php_version = phpversion();		
	exit('Error! Your version of PHP ('.$php_version.') is very old. You need at least PHP 5.5.1 to be installed on your server!');
}

$stmt = $conn->prepare("SELECT * FROM site WHERE cfg_site_id=".SITE_ID."");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if($row['active']==0){

   header('Location: https://www.aru.ac.th/myadmin/views/page-coming-soon.php');
}

$seo_meta_title = $row['cfg_site_meta_title'];
$seo_meta_author = $row['cfg_site_meta_author'];
$seo_meta_description = $row['cfg_site_meta_description'];
$seo_meta_keywords = $row['cfg_site_meta_keywords'];
$facebook_page = $row['cfg_facebook_page'];
$twitter_page = $row['cfg_twitter_page'];
$google_maps_api_key = $row['cfg_google_maps_api_key'];
$analytics_code = $row['cfg_analytics_code'];

$url_route = ADMIN_DIR.'/uploads/'.$row['cfg_site_folder'];

define('URL_ACTIVITY_IMAGE', $url_route.'/activity/');
define('URL_ACTIVITY_GALLERY', $url_route.'/gallery/');
define('URL_IMAGE_STAFF', $url_route.'/staff/');

define('URL_IMAGE_CAROUSEL', $url_route.'/carousel/');

define('URL_CONTENT', $url_route.'/content/');

// Site Program
define('URL_EDOC', $url_route.'/edoc/');

define('NOIMAGE', 'https://www.aru.ac.th/myadmin/uploads/avatars/no-image.png');

$stmt->closeCursor();

