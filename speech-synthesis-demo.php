<?php
  
  // iSpeech PHP Script (2013-04-09), version 0.6 (beta)
  // Requires the cURL PHP extension
  // Designed for cloud-based speech synthesis and speech recognition
  // For more information, visit: http://www.ispeech.org/api
  
  require_once('ispeech.php');

  $SpeechSynthesizer = new SpeechSynthesizer();
  $SpeechSynthesizer->setParameter('server', 'http://api.ispeech.org/api/rest');
  $SpeechSynthesizer->setParameter('apikey', 'developerdemokeydeveloperdemokey');
  $SpeechSynthesizer->setParameter('text', 'yes');
  $SpeechSynthesizer->setParameter('format', 'wav');
  $SpeechSynthesizer->setParameter('voice', 'usenglishfemale');
  $SpeechSynthesizer->setParameter('output', 'rest');
  $result = $SpeechSynthesizer->makeRequest();
  
  if (is_array($result)) //error occurred 
    echo '<pre>'.htmlentities(print_r($result, true), null, 'UTF-8');
  else
    echo file_put_contents('testing.wav', $result) . ' bytes saved';
  
?>
