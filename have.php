<?php
$hide=1;
include("config.php");

$file=eregi_replace($_SERVER['SERVER_NAME'], "", $_SERVER['REQUEST_URI']);
if($fileroot!="")
{
  $file=eregi_replace($fileroot, "", $file);
}
$var=explode("/", $file);

if((isset($login)&&$login==1) || (isset($authenticated)&&$authenticated==1))
{
  $invoerid=get_uid($username);
  $wantquery="INSERT INTO fl_collection (user, book) VALUES ('".$invoerid."', '".invoer($var[2])."')";
  $wantresult=mysql_query($wantquery);
  if($wantresult==1)
  {
    @header("location: ".$fileroot."/book.php/".invoer($var[2]));
  }
  else
  {
    echo "Oops. Something went wrong. Please try again later.";
  }
}
else
{
  header("location: ".$fileroot."/book.php/".invoer($var[2]));
}

?>
