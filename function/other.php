<?php
function escape($str)
{
	global $link;
	$string = mysqli_real_escape_string($link, $str);
	return $string;
}

function redirect($loc)
{
	return header("Location: $loc");
}

function alert($text, $location){
	echo "
	<script type='text/javascript'>
		alert('$text');
		window.location='$location';
	</script>";
}
?>