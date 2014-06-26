<?php
include("./config.php");

$fl = new TemplatePower("./templates/addpublisher.tpl");

require("./header.php");

$fl->assign("_ROOT.SITENAAM", $sitenaam." / Add a publisher");

if((isset($login)&&$login==1) || (isset($authenticated)&&$authenticated==1))
{
	if(isset($POST['notify'])&&$_POST['notify']=="yes")
	{
		$notify=1;
	}
	else
	{
		$notify=0;
	}
	
	if(isset($_POST['url']))
	{
		$_POST['url']=eregi_replace("http://", "", $_POST['url']);
	}
	
	if(!isset($_POST['finished'])||(isset($_POST['finished'])&&$_POST['name']==""))
	{
		$fl->newBlock("pubform");
		if(isset($_POST['finished'])&&$_POST['name']=="")
		{
			$fl->assign("FORMNAME", stripslashes($_POST['name']));
			$fl->assign("FORMADDRESS", stripslashes($_POST['address']));
			$fl->assign("FORMCOUNTRY", stripslashes($_POST['country']));
			$fl->assign("FORMDESCRIPTION", stripslashes($_POST['description']));
			$fl->assign("FORMURL", stripslashes($_POST['url']));
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
		$address=invoer($_POST['address']);
		$country=invoer($_POST['country']);
		$description=invoer($_POST['description']);
		$url=invoer($_POST['url']);
		$invoerid=get_uid($username);
		$query="INSERT INTO fl_publishers (name, address, country, description, url, submittedby, notify) VALUES ('".$name."', '".$address."', '".$country."', '".$description."', '".$url."', '".$invoerid."', '".$notify."')";
		$result=mysql_query($query);
		if($result==1)
		{
			$fl->newBlock("feedback");
			$fl->assign("FEEDBACK", "The publisher was succesfully added to the database");
			if($notify==1)
			{
				$fl->newBlock("feedback");
				$fl->assign("FEEDBACK", "You will be notified when the publisher is approved by one of our librarians");
			}
		}
		else
		{
			report_error("addpublisher.php", mysql_error());
			$fl->newBlock("feedback");
			$fl->assign("FEEDBACK", "Something went wrong while adding the publisher. Our librarians have been notified. Please try again later");
		}
	}

}
else
{
	$fl->newBlock("feedback");
	$fl->assign("FEEDBACK", "You need to be logged in to add a publisher to the library. If you don't have an account yet, you can <a href=\"".$fileroot."/signup.php\">sign up for an account here</a>");
}

$fl->printToScreen();
?>