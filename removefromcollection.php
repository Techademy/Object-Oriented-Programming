<?php
$hide=1;
include("config.php");

if(isset($login)&&$login==1 || isset($authenticated)&&$authenticated==1)
{
  $invoerid=get_uid($username);
  $query="DELETE FROM fl_collection WHERE user='".$invoerid."' AND book='".intval($_POST['bid'])."'";
  $result=mysql_query($query);
  if($result==1)
  {
    header("location: ".$fileroot."/mycollection.php");
  }
  else
  {
    report_error("removefromcollection.php", mysql_error());
    echo "Oops. Something went wrong. Please try again later.";
  }
}
else
{
  header("location: ".$fileroot."/index.php");
}

?>