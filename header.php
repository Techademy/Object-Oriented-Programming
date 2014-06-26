<?php
$fl->assignInclude("header", "./templates/header.tpl");
$fl->assignInclude("footer", "./templates/footer.tpl");
if((isset($login)&&$login==1) || (isset($authenticated)&&$authenticated==1))
{
  $fl->assignInclude('accountmenu', './templates/accountmenu.tpl');
}
$fl->prepare();

$fl->assignGlobal("FILEROOT", $fileroot);

if((isset($login)&&$login==1) || (isset($authenticated)&&$authenticated==1))
{
  $fl->assignGlobal("TARGET", "logout");
  $fl->assign("LOGGEDIN_USERNAME", get_realname($username));
}
else
{
  $fl->assignGlobal("TARGET", "login");
  $fl->newBlock("logininput");
  $fl->newBlock("passwordinput");
  if(ereg("index.php", $_SERVER['REQUEST_URI']))
  {
    $fl->newBlock("joinform");
  }
}

if(isset($username)&&get_userlevel($username)==3)
{
  $fl->newBlock("admin");
}
elseif(isset($username)&&isset($COOKIE['LoginCookie'])&&get_userlevel($username)!=3)
{
  $fl->newBlock("nonadmin");
}
?>
