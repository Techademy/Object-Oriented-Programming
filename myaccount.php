<?php
include("./config.php");

$fl = new TemplatePower("./templates/myaccount.tpl");

require("./header.php");

if(isset($login)&&$login==1 || isset($authenticated)&&$authenticated==1)
{
  $fl->newBlock("myform");
  $fl->assign("_ROOT.SITENAAM", $sitenaam." / Account Settings");

  if(isset($_POST['submitchanges']))
  {
    $name=invoer($_POST['name']);
    $url=invoer($_POST['url']);
    $url=eregi_replace("http://", "", $url);
    $country=invoer($_POST['country']);
    $iquery="UPDATE fl_users SET name='".$name."', url='".$url."', country='".$country."', allowemail='".$_POST['allowemail']."' WHERE user='".$username."'";
    $iresult=mysql_query($iquery);
    if($iresult==1)
    {
      header("location: ".$fileroot."/myaccount.php?feedback=update%20succesful");
    }
  }

  $query="SELECT name, url, country, allowemail FROM fl_users WHERE user='".$username."'";
  $result=mysql_query($query);
  $row=mysql_fetch_row($result);

  $fl->assign("NAME", stripslashes($row[0]));
  $fl->assign("URL", stripslashes($row[1]));
  $fl->assign("COUNTRY", stripslashes($row[2]));
  if($row[3]==1)
  {
    $fl->assign("NOSELECTED", "");
    $fl->assign("YESSELECTED", "SELECTED");
  }
  elseif($row[3]==0)
  {
    $fl->assign("YESSELECTED", "");
    $fl->assign("NOSELECTED", "SELECTED");
  }

  if(isset($feedback))
  {
    $fl->newBlock("feedback");
    $fl->assign("FEEDBACK", $feedback);
  }
}
else
{
  $fl->newBlock("feedback");
  $fl->assign("FEEDBACK", "You need to be logged in to use the personal account pages. If you don't have an account yet, you can <a href=\"signup.php\">sign up for an account here</a>");
  $fl->assign("_ROOT.SITENAAM", $sitenaam." / Please log in");
}

$fl->printToScreen();
?>