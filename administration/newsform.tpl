<!-- INCLUDE BLOCK : header -->
<br>
<br>
<form method="post" action="newssubmit.php">
<table>
<tr>
<td valign="top">
<strong>Title</strong>
</td>
<td valign="top">
<input type="text" name="title" value="{TITLE}">
</td>
</tr>
<tr>
<td valign="top">
<strong>Message:</strong>
</td>
<td valign="top">
<textarea name="message" rows="15" cols="65">{MESSAGE}</textarea><br />

</td>
</tr>
<!-- START BLOCK : resetdate -->
<tr>
<td valign="top">
<strong>Reset date to now:</strong>
</td>
<td valign="top">
<input type="checkbox" name="reset" value="yes">
</td>
</tr>
<input type="hidden" name="id" value="{ID}">
<!-- END BLOCK : resetdate -->
<tr>
<td valign="top">
&nbsp;
</td>
<td valign="top">
<input type="submit" name="submitnews" value="Complete >>" class="knop">
</td>
</tr>
</table>

<!-- INCLUDE BLOCK : footer -->
