<?php

function getStatusMessage($statusCode=0){
	$status = [
		'0' => '',
		'1' => 'Duplicate Email Address',
		'2' => 'Username or Password Empty',
		'3' => 'User Created Successfully',
		'4' => 'Username and password did not match',
		'5' => 'Username does not exist',
	];
	return $status[$statusCode];
}
