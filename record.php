<?php
/**
* A simple call recorder for iphone based on twilio
*/
require __DIR__ . '/vendor/autoload.php';

$response = new Services_Twilio_Twiml();
$response->say("This call is being recorded"); //notify both parties
//when  both parties hang up, twill will post the recording to the action URL
$response->record(array('action' => 'save_recording.php', 'method' => 'POST', 'playBeep' => true )); 
$response->hangup();
print $response;