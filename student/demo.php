<?php
	$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));								
	$cur_time = $date->format('d-m-Y H:i:s a');

	$uid = '20150001';
    $i = sha1($uid.$cur_time);
    
    echo $i;
?>