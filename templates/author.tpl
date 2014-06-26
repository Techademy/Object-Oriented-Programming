<!-- INCLUDE BLOCK : header -->
		<div class="left">
			<div class="blockheader">
				account
			</div>
			<div class="block">
<!-- START BLOCK : logininput -->
<form name="login" action="{TARGET}.php" method="post">
username: <input name="login_username" type="text" class="login" tabindex="1"><br />
<!-- END BLOCK : logininput -->
<!-- START BLOCK : passwordinput -->
password: <input name="login_password" type="password" class="login" tabindex="2"><br /><br />
<input type="submit" value="{TARGET}" class="loginknop" name="loginknop" tabindex="3"></form>
<!-- END BLOCK : passwordinput -->
<!-- INCLUDE BLOCK : accountmenu -->
<!-- START BLOCK : admin -->
>> <a href="{FILEROOT}/administration/">Administration</a><br />
<!-- END BLOCK : admin -->
				<!-- START BLOCK : joinform -->
<br />
Do you want your own collection online? Want to comment on books, authors and publishers? Want to add your own books to the Fantasylibrary.net database? <a href="signup.php">Sign up for an account</a> and get all these privileges! It's free!<br>
<!-- END BLOCK : joinform -->
			</div>
			<div class="blockheader">
				search
			</div>
			<div class="block">
				<form method="post" action="/search.php"><input type="text" name="searchquery" size="10" /><br /><br /><input type="submit" class="submit" value="Search" name="search"></form>
			</div>
						<div class="blockheader">
				ad
			</div>
			<div class="block">
				<script type="text/javascript"><!--
google_ad_client = "pub-0803742726684306";
google_ad_width = 125;
google_ad_height = 125;
google_ad_format = "125x125_as";
google_ad_channel ="7528484414";
google_ad_type = "text_image";
google_color_border = "596589";
google_color_bg = "F0F1F4";
google_color_link = "596589";
google_color_url = "596589";
google_color_text = "596589";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
			</div>
		</div>
      </td>
      <td valign="top" width="25">
      &nbsp;
      </td>
      <td valign="top">
     <div class="main">
			<div class="bigblockheader">
				{AUTHOR}
			</div>
			<div class="maincontent">

<!-- START BLOCK : feedback -->
{FEEDBACK}
<!-- END BLOCK : feedback -->

<table>
<!-- START BLOCK : author -->
<tr>
<td valign="top">
<!-- START BLOCK : picture -->
<table cellpadding="3" cellspacing="3">
<tr>
<td>
<img src="{FILEROOT}/images/authors/{IMAGE}" alt="{ALT}" border="0"><br>
</td>
</tr>
</table>

</td>
<td valign="top">
<!-- END BLOCK : picture -->
<table cellpadding="3" cellspacing="3">
<tr>
<td>
{BIO}<br>
<br>
<!-- START BLOCK : bookheader -->
<strong>{BOOKHEADER}</strong><br>
<br>
<!-- END BLOCK : bookheader -->
<!-- START BLOCK : books -->
<a href="{FILEROOT}/book.php/{BID}">{BOOK}</a><br>
<!-- END BLOCK : books -->
</td>
</tr>
</table>
</td>
</tr>
<!-- END BLOCK : author -->
</table>

			</div>
		</div>
      </td>
      <td valign="top" width="10">
      &nbsp;
      </td>
      <td valign="top">
		<div class="right">
			<div class="blockheader">
				comments
			</div>
			<div class="rightblock">
				<!-- START BLOCK : commentform -->
<strong>Add a comment</strong><br>
<form method="post" action="{FILEROOT}/comment.php">
<input type="hidden" name="aid" value="{AID}">
<textarea name="comment" class="sidearea"></textarea><br>
<input type="submit" name="submitcomment" value="Add Comment" class="sidearea">
</form><br>
<br>
<!-- END BLOCK : commentform -->
<!-- START BLOCK : loggedoutcommentform -->
You need to be logged in to comment. Don't have an account yet? <a href="{FILEROOT}/signup.php">Sign up!</a><br>
<br>
<!-- END BLOCK : loggedoutcommentform -->
<!-- START BLOCK : mostrecentcomments -->
<br>
<strong>Most recent comment{S}</strong><br>
<!-- END BLOCK : mostrecentcomments -->
<!-- START BLOCK : comment -->
<em>{COMMENT}</em><br>
written by <a href="{FILEROOT}/user.php/{UID}">{USER}</a> on {DATETIME}<br>
<br>
<!-- END BLOCK : comment -->
<!-- START BLOCK : morecommentslink -->
<a href="{FILEROOT}/comments.php/{AID}">more comments...</a>
<!-- END BLOCK : morecommentslink -->
			</div>
		</div>
		<br />
<!-- INCLUDE BLOCK : footer -->