<!-- INCLUDE BLOCK : header -->

<h1>Edit a Publisher</h1>
<table>
<tr>
<td valign="top">
<form method="post" action="publishereditted.php">
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
<strong>Address</strong>
</td>
<td valign="top">
<textarea name="address" rows="4" cols="40">{ADDRESS}</textarea>
</td>
</tr>
<tr>
<td valign="top">
<strong>Country</strong>
</td>
<td valign="top">
<input type="text" name="country" value="{COUNTRY}">
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
<strong>Logo</strong><br>
Logos need to be uploaded into the images/publishers directory
</td>
<td valign="top">
<select name="logo">
<option value="">No Image</option>
<!-- START BLOCK : image -->
<option value="{IMAGE}" {IMAGESELECTED}>{IMAGE}</option>
<!-- END BLOCK : image -->
</select>
</td>
</tr>
<tr>
<td valign="top">
<strong>URL</strong>
</td>
<td valign="top">
http:// <input type="text" name="url" value="{URL}">
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
