<?php
session_start();
	$ID=$_SESSION['user']['ID'];
	$upload_dir = "database/userContent/$ID/$ID";
	$upload_dir .='stash/';
	$img = $_POST['hidden_data'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = $upload_dir . mktime() . ".png";
	$success = file_put_contents($file, $data);
	print $success ? $file : 'Unable to save the file.';
?>
