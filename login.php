<?php
$hide=1;
include("config.php");
if(ereg("signup.php", $_SERVER['HTTP_REFERER']) || ereg("login.php", $_SERVER['HTTP_REFERER']) || ereg("logout.php", $_SERVER['HTTP_REFERER']))
{
	header("location: ".$fileroot."/index.php");
}
else
{
	header("location: ".$_SERVER['HTTP_REFERER']);
}
?>