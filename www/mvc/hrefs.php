<?php 
//define('ROOT_DIR', realpath(__DIR__.'/..'));
//require __DIR__.'/..mvc/model.php';
$config_path = __DIR__.'/../mvc/newUser/user-registration-form.php';
//$loginurl = __DIR__.'/../mvc/index.php';
require $config_path;
//require $loginurl;
session_start();
?>
<HTML>
<HEAD>
<TITLE>user-registration</TITLE>
<link href="./assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="./user-registration.css" type="text/css"
	rel="stylesheet" />
<script src="./vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
</HEAD>
<BODY>
	<div class="phppot-container">
	<?php require_once "$config_path";?>
	</div>
</BODY>
</HTML>