<?php

function getStatusMessage($statusCode=0){
	$status = [
		'0' => '',
		'1' => 'Duplicate Email Address',
		'2' => 'Username or Password Empty',
		'3' => 'User Created Successfully'
	];
	return $status[$statusCode];
}
