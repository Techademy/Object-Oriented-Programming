<!-- INCLUDE BLOCK : header -->

<h1>Edit an Error</h1>
<table>
<tr>
<td valign="top">
<form method="post" action="erroreditted.php">
<input type="hidden" name="id" value="{ID}">
<table>
<tr>
<td valign="top">
<strong>Error</strong>
</td>
<td valign="top">
<textarea name="error" rows="3" cols="25">{ERROR}</textarea>
</td>
</tr>
<tr>
<td valign="top">
<strong>Source</strong>
</td>
<td valign="top">
<input type="text" name="source" value="{SOURCE}">
</td>
</tr>
<tr>
<td valign="top">
<strong>Type of Error</strong>
</td>
<td valign="top">
<select name="type">
<option value="404" {404SELECTED}>404 File not Found</option>
<option value="401" {401SELECTED}>401 Not Authorized</option>
</select>
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
&nbsp;
</td>
</tr>
</table>
<!-- INCLUDE BLOCK : footer -->
