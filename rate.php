<?php
$hide=1;
include("config.php");

if(isset($login)&&$login==1 || isset($authenticated)&&$authenticated==1)
{
  $invoerid=get_uid($username);
  $review=invoer($_POST['review']);
  $checkquery="SELECT id, rating FROM fl_bookreviews WHERE book_id='". intval($_POST['bid']) ."' AND user_id='".$invoerid."'";
  $checkresult=mysql_query($checkquery);
  $israted=mysql_num_rows($checkresult);
  if(isset($_POST['rating']) && ($_POST['rating']>0 && $_POST['rating']<6) && $israted==0)
  {
    $query="INSERT INTO fl_bookreviews (book_id, user_id, review, datetime, rating) VALUES ('".intval($_POST['bid'])."', '".$invoerid."', '".mysql_real_escape_string($review)."', NOW(), '".intval($_POST['rating'])."')";
    $result=mysql_query($query);
    if($result==1)
    {
      @header("location: ".$fileroot."/book.php/".$_POST['bid']);
    }
    else
    {
      echo "Oops. Something went wrong. Please try again later.";
    }
  }
  else
  {
    header("location: ".$fileroot."/book.php/".$_POST['bid']);
  }
}
?>