<?php
	echo 'hello!!';
	$link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);
    echo $page = end($link_array);
?>