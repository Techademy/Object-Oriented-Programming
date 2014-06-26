<?php
include("./config.php");

$fl = new TemplatePower("./templates/my.tpl");

require("./header.php");

if(isset($login)&&$login==1 || isset($authenticated)&&$authenticated==1)
{
  $fl->newBlock("welcome");
  $fl->assign("_ROOT.SITENAAM", $sitenaam." / My FantasyLibrary.net");
}
else
{
  $fl->newBlock("feedback");
  $fl->assign("FEEDBACK", "You need to be logged in to use the personal account pages. If you don't have an account yet, you can <a href=\"signup.php\">sign up for an account here</a>");
  $fl->assign("_ROOT.SITENAAM", $sitenaam." / Please log in");
}

$fl->printToScreen();
?>