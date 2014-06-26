<!-- INCLUDE BLOCK : header -->

<h1>Approve an Author</h1>
<table>
<tr>
<td valign="top">
<form method="post" action="approveauthor2.php">
<input type="hidden" name="id" value="{ID}">
<table>
<tr>
<td valign="top">
<strong>First Name</strong>
</td>
<td valign="top">
<input type="text" name="firstname" value="{FIRSTNAME}">
</td>
</tr>
<tr>
<td valign="top">
<strong>Last Name</strong>
</td>
<td valign="top">
<input type="text" name="name" value="{NAME}">
</td>
</tr>
<tr>
<td valign="top">
<strong>Bio</strong>
</td>
<td valign="top">
<textarea name="bio" rows="4" cols="40">{BIO}</textarea>
</td>
</tr>
<tr>
<td valign="top">
&nbsp;
</td>
<td valign="top">
<input type="submit" name="step1complete" value="Complete >>" class="knop">
</td>
</tr>
</table>
</form>
</td>
<td valign="top">
<strong>General Information</strong><br>
<br>
Submitting User: <a href="{FILEROOT}/user.php/{UID}" target="_blank">{UNAME}</a><br>
System will notify user: {NOTIFY}<br>
</td>
</tr>
</table>
<!-- INCLUDE BLOCK : footer -->
