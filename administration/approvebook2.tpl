<!-- INCLUDE BLOCK : header -->

<h1>Approve a book</h1>
<table>
<tr>
<td valign="top">
<form method="post" action="approvebook3.php">
<input type="hidden" name="id" value="{ID}">
Images need to be uploaded through ftp into the images/books directory.<br>
<br>
<table>
<tr>
<td valign="top">
<strong>Image</strong>
</td>
<td valign="top">
<select name="image">
<option value="">No Image</option>
<!-- START BLOCK : image -->
<option value="{IMAGE}">{IMAGE}</option>
<!-- END BLOCK : image -->
</select>
</td>
</tr>
<tr>
<td valign="top">
&nbsp;
</td>
<td valign="top">
<input type="submit" name="step2complete" value="Next Step >>" class="knop">
</td>
</tr>
</table>
</form>
</td>
<td valign="top">
<a href="http://www.amazon.com/exec/obidos/ASIN/{ASIN}/electronicmus-20" target="_blank">check on amazon.com</a><br>
<a href="http://my.linkbaton.com/isbn/" target="_blank">check on linkbaton</a> (<strong>{ASIN}</strong>)<br>
<br>
<strong>General Information</strong><br>
<br>
Submitting User: <a href="{FILEROOT}/user.php/{UID}" target="_blank">{UNAME}</a><br>
Date & Time of Addition: {ADDED}<br>
System will notify user: {NOTIFY}<br>
</td>
</tr>
</table>
<!-- INCLUDE BLOCK : footer -->
