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
			</div>
			<div class="blockheader">
				search
			</div>
			<div class="block">
				<form method="post" action="search.php"><input type="text" name="searchquery" size="10" /><br /><br /><input type="submit" class="submit" value="Search" name="search"></form>
			</div>
		</div>
      </td>
      <td valign="top" width="25">
      &nbsp;
      </td>
      <td valign="top">
     <div class="main">
			<div class="bigblockheader">
				sign up
			</div>
			<div class="maincontent">
<!-- START BLOCK : feedback -->
{FEEDBACK}
<!-- END BLOCK : feedback -->

<!-- START BLOCK : joinform -->
Sign up for an account at Fantasylibrary.net! Please read the privacy statement to the right. Fields marked with * are required fields.<br>
<br>
<form method="post" action="signup.php">
Your preferred username*:<br>
<input type="text" name="signup_username" maxlength="25" value="{SIGNUP_USERNAME}"><br>
<br>
Your password*:<br>
<input type="password" name="signup_password_1"><br>
<br>
Re-type your password*:<br>
<input type="password" name="signup_password_2"><br>
<br>
Your real name*:<br>
<input type="text" name="signup_name" maxlength="255" value="{SIGNUP_NAME}"><br>
<br>
Your emailaddress*:<br>
<input type="text" name="signup_email" maxlength="255" value="{SIGNUP_EMAIL}"><br>
<br>
Your website:<br>
http:// <input type="text" name="signup_website" maxlength="255" value="{SIGNUP_WEBSITE}"><br>
<br>
Your country:<br>
<input type="text" name="signup_country" maxlength="255" value="{SIGNUP_COUNTRY}"><br>
<br>
<input type="submit" name="signup_submit" value="Sign Up!" class="knop"> <input type="reset" name="signup_reset" value="Empty Fields" class="knop">
</form>
<!-- END BLOCK : joinform -->


			</div>
		</div>
      </td>
      <td valign="top" width="10">
      &nbsp;
      </td>
      <td valign="top">
		<div class="right">
			<div class="blockheader">
				privacy statement
			</div>
			<div class="rightblock">
The following is important information concerning your account here at Fantasylibrary.net: By joining you agree to the following.<br>
<br>
<li> Fantasylibrary.net will NEVER EVER sell the information you submit here to third-parties, nor will it be used by ourselves to send unsolicited commercial e-mail (also known as spam) to you. It may, however, occur that something important has happened that we would like or need to share with the members of our site. If this happens, we reserve the right to send you an e-mail.</li><br>
<li> Fantasylibrary.net will not be held liable for damage caused by incorrect or offensive information entered by users of the site. However, please refrain from entering incorrect or possibly offensive information. If you encounter incorrect or offensive information on the site, please <a href="contact.php">contact us</a>, and we will alter or remove the information. Users that submit incorrect information will receive notification of this. Users that submit offensive information will receive a penalty, which can range from temporary bans to full bans!</li><br>
<li> Fantasylibrary.net is a voluntary effort of two people who love fantasy. Therefore, no guarantee can be given that submitted information is approved immediately, or e-mails are responded to immediately. Please understand this.</li><br>
<li> Though we are in no way a commercial organisation, we would appreciate it if you would use our links to amazon.com to buy your books. We (have) spen(d)(t) a lot of our free time on this website so any small thing in return is highly appreciated. It is of course not required for any member or visitor of the site to use these links ;-)</li><br>
			</div>
		</div>
		<br />
<!-- INCLUDE BLOCK : footer -->