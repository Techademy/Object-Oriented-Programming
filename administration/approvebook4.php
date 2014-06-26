<?php
include("../config.php");

$fl = new TemplatePower("./approvebook4.tpl");

require("./header.php");

if($step3complete)
{
	$updatequery="UPDATE fl_books SET approved=NOW() WHERE id='$id'";
	$updateresult=mysql_query($updatequery);
	if($updateresult==1)
	{
		$success=1;
	}
	else
	{
		$success=mysql_error();
	}
}

$query="SELECT title, isbn, submittedby, UNIX_TIMESTAMP(added), notify from fl_books where id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$asin=ereg_replace("-", "", $row[1]);
$fl->assignGlobal("ASIN", $asin);
$fl->assignGlobal("ID", $id);

$fl->assign("_ROOT.UID", $row[2]);
$fl->assign("_ROOT.ADDED", date("d-m-Y G:i", $row[3]));
if($row[4]==1)
{
	$notify="yes";
}
elseif($row[4]==0)
{
	$notify="no";
}
$fl->assign("_ROOT.NOTIFY", $notify);

if($success==1)
{
	$fl->newBlock("confirm");
	$fl->assign("CONFIRM", "The book has been approved and added to the site. Check it out <a href=\"$fileroot/book.php/$id\" target=\"_blank\">here</a>.");
	if($row[4]==1)
	{
		$equery="SELECT email FROM fl_users WHERE id='$row[2]'";
		$eresult=mysql_query($equery);
		$erow=mysql_fetch_row($eresult);
		send_book_confirmation($id, $erow[0]);
		$fl->newBlock("confirm");
		$fl->assign("CONFIRM", "The user has been notified about the approval of the book");
	}
}
else
{
	$fl->newBlock("confirm");
	$fl->assign("CONFIRM", "Something went wrong: $success");
}

$fl->printToScreen();
?>