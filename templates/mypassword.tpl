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
		</div>
      </td>
      <td valign="top" width="25">
      &nbsp;
      </td>
      <td valign="top">
     <div class="main">
			<div class="bigblockheader">
				change password
			</div>
			<div class="maincontent">
<!-- START BLOCK : feedback -->
<strong>{FEEDBACK}</strong><br>
<br>
<!-- END BLOCK : feedback -->
<!-- START BLOCK : passform -->
<form method="post" action="mypassword.php">
<table>
<tr>
<td valign="top">
Old Password:
</td>
<td valign="top">
<input type="password" name="oldpass">
</td>
</tr>
<tr>
<td valign="top">
New Password:
</td>
<td valign="top">
<input type="password" name="newpass1">
</td>
</tr>
<tr>
<td valign="top">
Repeat New Password:
</td>
<td valign="top">
<input type="password" name="newpass2">
</td>
</tr>
<tr>
<td valign="top">
&nbsp;
</td>
<td valign="top">
<input type="submit" name="changepass" value="Change Password" class="knop">
</td>
</tr>

</table>
</form>
<!-- END BLOCK : passform -->


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
				With your my.fantasylibrary account, you can manage your collection and wantlist and check on the status of the items you have submitted to the site.
			</div>
		</div>
		<br />
<!-- INCLUDE BLOCK : footer -->