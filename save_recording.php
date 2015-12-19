<?php
/**
* A simple call recorder for iphone based on twilio
*/
require __DIR__ . '/vendor/autoload.php';

//location to save recording. Must be web server writable
define("SAVE_DIR", __DIR__ . '/media/');

if (isset($_REQUEST['RecordingUrl'])){
	$recording = file_get_contents($_REQUEST['RecordingUrl'] . '.mp3'); //return the recording in mp3
	$file_name = SAVE_DIR . 'rec_' . date('Y-M-d_h-i-s') . "_duration_" . $_REQUEST['RecordingDuration'] . '.mp3';
	file_put_contents($file_name, $recording);
}

//hangup the call
$response = new Services_Twilio_Twiml();
$response->hangup();
print $response;