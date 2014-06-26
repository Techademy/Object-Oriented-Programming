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
				<form method="post" action="search.php"><input type="text" name="searchquery" size="10" /><br /><br /><input type="submit" class="submit" value="Search" name="search"></form>
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
				{NAME}
			</div>
			<div class="maincontent">
<!-- START BLOCK : feedback -->
{FEEDBACK}
<!-- END BLOCK : feedback -->

<!-- START BLOCK : userinfo -->
Website: <a href="http://{URL}" target="_blank">{URL}</a><br>
Country: {COUNTRY}<br>
<br>

<!-- END BLOCK : userinfo -->

<!-- START BLOCK : wantlist -->
<strong>Wantlist</strong>
<table border="0">
<!-- START BLOCK : wantbook -->
<tr>
<td valign="top"><a href="{FILEROOT}/book.php/{BID}">{TITLE}</a></td>
<td valign="top" width="25">&nbsp;</td>
<td valign="top">
<!-- START BLOCK : wantauthor -->
<a href="{FILEROOT}/author.php/{AID}">{AUTHOR}</a><br>
<!-- END BLOCK : wantauthor -->
</td>
</tr>
<!-- END BLOCK : wantbook -->
</table><br>
<br>
<!-- END BLOCK : wantlist -->

<!-- START BLOCK : collection -->
<strong>Collection</strong>
<table border="0">
<!-- START BLOCK : collbook -->
<tr>
<td valign="top"><a href="{FILEROOT}/book.php/{BID}">{TITLE}</a></td>
<td valign="top" width="25">&nbsp;</td>
<td valign="top">
<!-- START BLOCK : collauthor -->
<a href="{FILEROOT}/author.php/{AID}">{AUTHOR}</a><br>
<!-- END BLOCK : collauthor -->
</td>
</tr>
<!-- END BLOCK : collbook -->
</table><br>
<br>
<!-- END BLOCK : collection -->



			</div>
		</div>
      </td>
      <td valign="top" width="10">
      &nbsp;
      </td>
      <td valign="top">
		<div class="right">
			<div class="blockheader">
				e-mail
			</div>
			<div class="rightblock">
				<!-- START BLOCK : email -->
Send this user an e-mail:<br>
<br>
<form method="post" action="{FILEROOT}/email.php">
<input type="hidden" name="emailid" value="{UID}">
Subject:<br>
<Input type="text" name="subject" width="15" class="sidearea"><br>
<br>
E-mail:<br>
<textarea name="message" class="sidearea"></textarea><br>
<br>
<input type="submit" name="submitemail" value="Send E-mail" class="sidearea"><br>
<br>
</form>
<!-- END BLOCK : email -->
<!-- START BLOCK : noemail -->
{NOEMAILMESSAGE}<br>
<br>
<!-- END BLOCK : noemail -->
			</div>
		</div>
		<br />
<!-- INCLUDE BLOCK : footer -->