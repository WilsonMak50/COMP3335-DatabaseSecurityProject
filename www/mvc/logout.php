<?php

if (isset($_COOKIE["user"])) {
	unset($_COOKIE["user"]);
	setcookie("user","",time()-1800);
	header("Location: home.php");
}else
{
	header("Location: home.php");
}

?>
