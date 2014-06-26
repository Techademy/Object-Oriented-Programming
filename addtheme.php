<?php
include("./config.php");

$fl = new TemplatePower("./templates/addtheme.tpl");

require("./header.php");

$fl->assign("_ROOT.SITENAAM", $sitenaam." / Add a theme");

if(isset($login)&&$login==1 || isset($authenticated)&&$authenticated==1)
{
  if(isset($notify)&&$notify=="yes")
  {
    $notify=1;
  }
  else
  {
    $notify=0;
  }

  if(!isset($finished)||(isset($finished)&&$name==""))
  {
    $fl->newBlock("themeform");
    if(isset($finished)&&$name=="")
    {
      $fl->assign("FORMNAME", stripslashes($name));
      $fl->assign("FORMDESC", stripslashes($description));
      if($notify==1)
      {
        $fl->assign("CHECKED", "CHECKED");
      }
      else
      {
        $fl->assign("CHECKED", "");
      }
      $fl->newBlock("feedback");
      $fl->assign("FEEDBACK", "You did not complete the required field (Name). Please complete the form and try again");
    }
  }
  if(isset($finished)&&$name!="")
  {
    $name=invoer($name);
    $description=invoer($description);
    $invoerid=get_uid($username);
    $query="INSERT INTO fl_worlds (name, description, submittedby, notify) VALUES ('".$name."', '".$description."', '".$invoerid."', '".$notify."')";
    $result=mysql_query($query);
    if($result==1)
    {
      $fl->newBlock("feedback");
      $fl->assign("FEEDBACK", "The theme was succesfully added to the database");
      if($notify==1)
      {
        $fl->newBlock("feedback");
        $fl->assign("FEEDBACK", "You will be notified when the theme is approved by one of our librarians");
      }
    }
    else
    {
      report_error("addtheme.php", mysql_error());
      $fl->newBlock("feedback");
      $fl->assign("FEEDBACK", "Something went wrong while adding the theme. Our librarians have been notified. Please try again later");
    }
  }

}
else
{
  $fl->newBlock("feedback");
  $fl->assign("FEEDBACK", "You need to be logged in to add a theme to the library. If you don't have an account yet, you can <a href=\"".$fileroot."/signup.php\">sign up for an account here</a>");
}

$fl->printToScreen();
?>