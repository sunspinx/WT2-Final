<?php
define("HOSTNAME", "localhost");
define("USERNAME", "xdomin");
define("PASSWORD", "edx4even");
define("DBNAME", "wt2_final");
define("API_KEY", "KHt9t83cmV6pfcyfSbcB9jyG7TnJMySYT28CUv2jSMN9RrNj");

//medoo db knižnica, https://medoo.in/doc
require  'app/class/core/Medoo.php';
use Medoo\Medoo;

$medoo = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => DBNAME,
	'server' => HOSTNAME,
	'username' => USERNAME,
	'password' => PASSWORD,
]);
