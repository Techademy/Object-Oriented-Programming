<?php
include("./config.php");

$fl = new TemplatePower("./templates/addauthor.tpl");

require("./header.php");

$fl->assign("_ROOT.SITENAAM", $sitenaam." / Add an author");

if((isset($login)&&$login==1) || (isset($authenticated)&&$authenticated==1))
{
  if(isset($_POST['notify'])&&$_POST['notify']=="yes")
  {
    $notify=1;
  }
  else
  {
    $notify=0;
  }

  if(!isset($_POST['finished'])||(isset($_POST['finished'])&&$_POST['name']==""))
  {
    $fl->newBlock("authorform");
    if(isset($_POST['finished'])&&$_POST['name']=="")
    {
      $fl->assign("FORMNAME", stripslashes($_POST['name']));
      $fl->assign("FORMFIRSTNAME", stripslashes($_POST['firstname']));
      $fl->assign("FORMBIO", stripslashes($_POST['bio']));
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
  if(isset($_POST['finished'])&&$_POST['name']!="")
  {
    $name=invoer($_POST['name']);
    $firstname=invoer($_POST['firstname']);
    $bio=invoer($_POST['bio']);
    $invoerid=get_uid($username);
    $query="INSERT INTO fl_authors (name, bio, submittedby, notify, firstname) VALUES ('".$name."', '".$bio."', '".$invoerid."', '".$notify."', '".$firstname."')";
    $result=mysql_query($query);
    if($result==1)
    {
      $fl->newBlock("feedback");
      $fl->assign("FEEDBACK", "The author was succesfully added to the database");
      if($notify==1)
      {
        $fl->newBlock("feedback");
        $fl->assign("FEEDBACK", "You will be notified when the author is approved by one of our librarians");
      }
    }
    else
    {
      report_error("addauthor.php", mysql_error());
      $fl->newBlock("feedback");
      $fl->assign("FEEDBACK", "Something went wrong while adding the author. Our librarians have been notified. Please try again later");
    }
  }

}
else
{
  $fl->newBlock("feedback");
  $fl->assign("FEEDBACK", "You need to be logged in to add an author to the library. If you don't have an account yet, you can <a href=\"".$fileroot."/signup.php\">sign up for an account here</a>");
}

$fl->printToScreen();
?>