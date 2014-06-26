<!-- INCLUDE BLOCK : header -->

<h1>Edit a User: {NAME}</h1>
<table>
<tr>
<td valign="top">
<form method="post" action="usereditted.php">
<input type="hidden" name="id" value="{ID}">
<table>
<tr>
<td valign="top">
<strong>Userlevel</strong>
</td>
<td valign="top">
<select name="level">
<option value="1" {1SELECTED}>Regular User</a>
<option value="3" {3SELECTED}>Administrator</a>
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
