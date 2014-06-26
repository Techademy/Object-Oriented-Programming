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
				account settings
			</div>
			<div class="maincontent">
<!-- START BLOCK : feedback -->
<strong>{FEEDBACK}</strong><br>
<br>
<!-- END BLOCK : feedback -->
<!-- START BLOCK : myform -->
<form method="post" action="myaccount.php">
<table>
<tr>
<td valign="top">
Your Name:
</td>
<td valign="top">
<input type="text" name="name" value="{NAME}">
</td>
</tr>
<tr>
<td valign="top">
Your Website:
</td>
<td valign="top">
http:// <input type="text" name="url" value="{URL}">
</td>
</tr>
<tr>
<td valign="top">
Country:
</td>
<td valign="top">
<input type="text" name="country" value="{COUNTRY}">
</td>
</tr>
<tr>
<td valign="top">
Allow Email:
</td>
<td valign="top">
<select name="allowemail">
<option value="0" {NOSELECTED}>No</option>
<option value="1" {YESSELECTED}>Yes</option>
</select>
</td>
</tr>
<tr>
<td valign="top">
&nbsp;
</td>
<td valign="top">
<input type="submit" name="submitchanges" value="Submit Changes" class="knop">
</td>
</tr>
</table>
</form>
<!-- END BLOCK : myform -->


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