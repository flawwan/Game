<?php

$connection = @fsockopen("10.163.172.171", 80, $errno, $errstr, 2);

if (is_resource($connection)) {
	echo "Up";
	fclose($connection);
} else {
	echo "down";
}