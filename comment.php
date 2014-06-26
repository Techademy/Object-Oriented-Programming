<?php
$hide=1;
include("config.php");

if(isset($login)&&$login==1 || isset($authenticated)&&$authenticated==1)
{
  $invoerid=get_uid($username);
  $comment=invoer($comment);
  $query="INSERT INTO fl_authorcomments (author_id, user_id, comment, datetime) VALUES ('".intval($aid)."', '".$invoerid."', '".$comment."', NOW())";
  $result=mysql_query($query);
  if($result==1)
  {
    @header("location: ".$fileroot."/author.php/".$aid);
  }
  else
  {
    echo "Oops. Something went wrong. Please try again later.";
  }
}
?>