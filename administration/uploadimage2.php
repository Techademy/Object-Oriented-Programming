<?php
include("../config.php");

$fl = new TemplatePower("./uploadimage.tpl");

require("./header.php");

if($do_upload)
	{
	while(file_exists("$docroot/$type/$image_name"))
		{
		$image_name=time().$image_name;
		}
	if(copy($image, "../images/$type/$image_name"))
		{
		$fl->assign("_ROOT.FEEDBACK", "Image has been uploaded succesfully. Filename is $image_name");
		unlink($image);
		}
	else
		{
		$fl->assign("_ROOT.FEEDBACK", "Something went wrong while uploading the image.");
		}
	}

$fl->printToScreen();
?>