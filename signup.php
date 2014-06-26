<?php
$hide=1;
include("./config.php");

$fl = new TemplatePower("./templates/signup.tpl");

require("./header.php");

$fl->assign("_ROOT.SITENAAM", $sitenaam." / Sign up");

if(isset($_POST['signup_submit']))
{
  if($_POST['signup_password_1']==$_POST['signup_password_2'] && $_POST['signup_password_1']!="")
  {
    if($_POST['signup_username']!="")
    {
      if(isset($_POST['signup_email']))
      {
        $encpass=md5($_POST['signup_password_1']);
        $signup_website=ereg_replace("http://", "", $_POST['signup_website']);
        $query="INSERT INTO fl_users (user, passwd, name, email, url, address, country, since) VALUES ('".invoer($_POST['signup_username'])."', '".$encpass."', '".invoer($signup_name)."', '".invoer($_POST['signup_email'])."', '".invoer($_POST['signup_website'])."', '".invoer($_POST['signup_address'])."', '".invoer($_POST['signup_country'])."', NOW())";
        $result=mysql_query($query);
        if($result==1)
        {
          //confirm_signup(nl2br($_POST['signup_email']), $_POST['signup_username'], $_POST['signup_password_1']);
          $fl->newBlock("feedback");
          $fl->assign("FEEDBACK", "Your account has been created. An e-mail has been sent to <strong>".$_POST['signup_email']."</strong> confirming your information.");
        }
        else
        {
          $fl->newBlock("feedback");
          $fl->assign("FEEDBACK", "Something went wrong while signing up. The database said: ".mysql_error()."<br>If this problem keeps occuring, please send an e-mail with the error to <strong>".$infoemail."</strong>");
          $error="yes";
        }
      }
      else
      {
        $error="yes";
        $fl->newBlock("feedback");
        $fl->assign("FEEDBACK", "You did not fill in an e-mailaddress. Please enter your e-mailaddress and try again");
      }
    }
    else
    {
      $error="yes";
      $fl->newBlock("feedback");
      $fl->assign("FEEDBACK", "You did not fill in a username. Please enter your preferred username and try again");
    }
  }
  else
  {
    $error="yes";
    $fl->newBlock("feedback");
    $fl->assign("FEEDBACK", "Passwords do not match or password field was left empty. Please try again");
  }
}

if((isset($error)&&$error=="yes") || !isset($_POST['signup_submit']))
{
  $fl->newBlock("joinform");
  if(isset($error)&&$error=="yes")
  {
    $fl->assign("SIGNUP_USERNAME", $_POST['signup_username']);
    $fl->assign("SIGNUP_NAME", $_POST['signup_name']);
    $fl->assign("SIGNUP_EMAIL", $_POST['signup_email']);
    $fl->assign("SIGNUP_WEBSITE", $_POST['signup_website']);
    $fl->assign("SIGNUP_ADDRESS", $_POST['signup_address']);
    $fl->assign("SIGNUP_COUNTRY", $_POST['signup_country']);
  }
}

$fl->printToScreen();
?>
