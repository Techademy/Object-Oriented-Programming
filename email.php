<?php
include("./config.php");

$fl = new TemplatePower("./templates/email.tpl");

require("./header.php");

$query="SELECT name, email, allowemail FROM fl_users WHERE id='".intval($_POST['emailid'])."'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.SITENAAM", $sitenaam." / Email ".opmaak($row[0]));

if($row[2]==0)
{
  $fl->newBlock("email");
  $fl->assign("UID", opmaak($_POST['emailid']));
  $fl->assign("FEEDBACK", "This user has chosen not to receive e-mail through Fantasylibrary.net. You will not be able to send any e-mail to this user using this website");
}
elseif($row[2]==1)
{
  $fl->newBlock("email");
  $fl->assign("UID", opmaak($_POST['emailid']));
  $message.="\n\n----------------------------------------------------------\n\n";
  $message.="This message was sent through your personal page at\n";
  $message.="www.FantasyLibrary.net/user.php/".$_POST['emailid']."\n\n";
  $message.="If you do not want to receive e-mail through that page:\n";
  $message.="Log in to your account on www.FantasyLibrary.net/myaccount.php\n";
  $message.="Set 'Allow E-mail' to No\n";
  $uquery="SELECT name, email FROM fl_users WHERE user='".invoer($username)."'";
  $uresult=mysql_query($uquery);
  $urow=mysql_fetch_row($uresult);
  mail($row[0]." <".$row[1].">", opmaak($_POST['subject']), stripslashes($_POST['message']), "FROM: ".$urow[0]." <".$urow[1].">");
  $fl->assign("FEEDBACK", "Your e-mail has been sent to ".$row[0].".");
}

$fl->printToScreen();
?>