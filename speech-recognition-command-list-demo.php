<?php
  
  // iSpeech PHP Script (2013-04-09), version 0.6 (beta)
  // Requires the cURL PHP extension
  // Designed for cloud-based speech synthesis and speech recognition
  // For more information, visit: http://www.ispeech.org/api
  
  require_once('ispeech.php'); 
  
  $SpeechRecognizer = new SpeechRecognizer();
  $SpeechRecognizer->setParameter('server', 'http://api.ispeech.org/api/rest');
  $SpeechRecognizer->setParameter('apikey', 'developerdemokeydeveloperdemokey');
  $SpeechRecognizer->setParameter('freeform', '0');
  $SpeechRecognizer->setParameter('content-type', 'wav');
  $SpeechRecognizer->setParameter('locale', 'en-US');
  $SpeechRecognizer->setParameter('output', 'json');

  //The recognizer will return yes, no, or nothing
  $SpeechRecognizer->setParameter('alias', 'command1|YESNO');
  $SpeechRecognizer->setParameter('YESNO', 'yes|no');
  $SpeechRecognizer->setParameter('command1', '%YESNO%');
  
  $filename = 'testing.wav';
  $SpeechRecognizer->setParameter('audio', base64_encode(file_get_contents($filename)));
  $result = $SpeechRecognizer->makeRequest();

  echo htmlentities(print_r($result, true), null, 'UTF-8');
  
?>