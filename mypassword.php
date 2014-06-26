<?php
include("./config.php");

$fl = new TemplatePower("./templates/mypassword.tpl");

require("./header.php");

if(isset($login)&&$login==1 || isset($authenticated)&&$authenticated==1)
{
	$fl->assign("_ROOT.SITENAAM", $sitenaam." / Change Password");
	if(isset($_POST['changepass']))
	{
		if(md5($_POST['oldpass'])==$cookiepass)
		{
			if($_POST['newpass1']==$_POST['newpass2'])
			{
				$newpassenc=md5($_POST['newpass1']);
				$pquery="UPDATE fl_users SET passwd='".$newpassenc."' WHERE user='".$username."'";
				$presult=mysql_query($pquery);
				if($presult==1)
				{
					logout_user();
					header("location: ".$fileroot."/my.php");
				}
				else
				{
					report_error("mypassword.php", mysql_error());
					$fl->newBlock("feedback");
					$fl->newBlock("FEEDBACK", "Something went wrong while trying to update your password. The librarians have been notified. Please try again later");
				}
			}
			else
			{
				$fl->newBlock("feedback");
				$fl->assign("FEEDBACK", "The new passwords you entered aren't the same. Please try again");
				$fl->newBlock("passform");
			}
		}
		else
		{
			$fl->newBlock("feedback");
			$fl->assign("FEEDBACK", "Your old password is incorrect, please try again");
			$fl->newBlock("passform");
		}
	}
	else
	{
	$fl->newBlock("passform");
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