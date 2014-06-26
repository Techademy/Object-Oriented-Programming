<!-- INCLUDE BLOCK : header -->
<br>
<br>
<h1>Deny Theme {NAME}</h1>

<form method="post" action="themedenied.php">
<input type="hidden" name="id" value="{ID}">
<!-- START BLOCK : denymail -->
Text for e-mail to user:<br>
<textarea name="denytext" cols="40" rows="5"></textarea><br><br>
<!-- END BLOCK : denymail -->
Are you sure you want to deny this theme?<br>
<br>
<input type="submit" name="deny" value="Deny" class="knop"><br>
</form>
<!-- INCLUDE BLOCK : footer -->
