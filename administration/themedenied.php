<?php
include("../config.php");

$fl = new TemplatePower("./themedenied.tpl");

require("./header.php");

$query="SELECT b.name, b.notify, u.name, u.email FROM fl_worlds b, fl_users u WHERE b.id='$id' AND u.id=b.submittedby";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.NAME", opmaak($row[0]));

$dquery="DELETE FROM fl_worlds WHERE id='$id'";
$dresult=mysql_query($dquery);
if($dresult==1)
{
	$fl->assign("_ROOT.FEEDBACK", "Author has been denied");

	if($row[1]==1)
	{
		$body="Hello $row[2],\n\n";
		$body.="You have recently added $row[0] to FantasyLibrary.net. Our editor in charge has decided to deny this theme from the website. Here is why:\n\n";
		$body.=$denytext;
		$body.="\n\nWe are sorry that we did not add the theme. We hope you will keep supporting us by adding new themes to the Library.\n\n";
		$body.="Sincerely,\n\n";
		$body.="The FantasyLibrary.net Librarians";
		mail("$row[2] <$row[3]>", "FantasyLibrary.net Notification: ".opmaak($row[0]), $body, "FROM: The FantasyLibrary.net Librarian <librarian@fantasylibrary.net>");
		$fl->newBlock("denymail");
	}
}
else
{
	$fl->assign("_ROOT.FEEDBACK", "Something went wrong: ".mysql_error());
}
$fl->printToScreen();
?>