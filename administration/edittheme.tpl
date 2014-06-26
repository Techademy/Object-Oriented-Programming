<!-- INCLUDE BLOCK : header -->

<h1>Edit a Theme</h1>
<table>
<tr>
<td valign="top">
<form method="post" action="themeeditted.php">
<input type="hidden" name="id" value="{ID}">
<table>
<tr>
<td valign="top">
<strong>Name</strong>
</td>
<td valign="top">
<input type="text" name="name" value="{NAME}">
</td>
</tr>
<tr>
<td valign="top">
<strong>Description</strong>
</td>
<td valign="top">
<textarea name="description" rows="4" cols="40">{DESCRIPTION}</textarea>
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
</td>
</tr>
</table>
<!-- INCLUDE BLOCK : footer -->
