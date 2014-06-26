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
				themes
			</div>
			<div class="maincontent">
<!-- START BLOCK : feedback -->
{FEEDBACK}
<!-- END BLOCK : feedback -->

<!-- START BLOCK : theme -->
<a href="{FILEROOT}/theme.php/{TID}">{THEME}</a><br>
<!-- END BLOCK : theme -->


			</div>
		</div>
      </td>
      <td valign="top" width="10">
      &nbsp;
      </td>
      <td valign="top">
		<div class="right">
			<div class="blockheader">
				your account
			</div>
			<div class="rightblock">
				<!-- START BLOCK : prevpage -->
<a href="{FILEROOT}/themes.php/{CAT}/{START}">previous page</a>
<!-- END BLOCK : prevpage -->
<!-- START BLOCK : nextpage -->
<a href="{FILEROOT}/themes.php/{CAT}/{START}">next page</a>
<!-- END BLOCK : nextpage -->
<br />
<br />
<!-- START BLOCK : addtheme -->
Can't find a specific theme in our library? <a href="{FILEROOT}/addtheme.php">Add a theme</a> yourself.
<!-- END BLOCK : addtheme -->
<!-- START BLOCK : nonmemberaddtheme -->
Can't find a specific theme in our library? <a href="{FILEROOT}/signup.php">Sign up for an account</a> and be able to add themes to the site.
<!-- END BLOCK : nonmemberaddtheme -->
			</div>
		</div>
		<br />
<!-- INCLUDE BLOCK : footer -->