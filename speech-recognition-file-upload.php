<?php

// iSpeech PHP Script (2013-04-09), version 0.6 (beta)
// Requires the cURL PHP extension
// Designed for cloud-based speech synthesis and speech recognition
// For more information, visit: http://www.ispeech.org/api

if (isset($_FILES['audiofile']['name'])){
    $start = microtime(true);
    require_once('ispeech.php'); 
    
    $SpeechRecognizer = new SpeechRecognizer();
    $SpeechRecognizer->setParameter('server', 'http://api.ispeech.org/api/rest');
    $SpeechRecognizer->setParameter('apikey', 'developerdemokeydeveloperdemokey');
    $SpeechRecognizer->setParameter('freeform', '3');
    $SpeechRecognizer->setParameter('content-type', 'wav');
    $SpeechRecognizer->setParameter('locale', 'en-US');
    $SpeechRecognizer->setParameter('output', 'rest');
    
    $SpeechRecognizer->setParameter('audio', base64_encode(file_get_contents($_FILES['audiofile']['tmp_name'])));
    $result = $SpeechRecognizer->makeRequest();

    echo '<h3>Speech recognizer result</h3>';
    echo '<pre>'.htmlentities(print_r($result, true), null, 'UTF-8').'</pre>';
    echo '<p>Recognition took: '.number_format(microtime(true)-$start,2).' seconds</p>';
    
    echo '<h3>$_FILES array input</h3>';
    echo '<pre>'.print_r($_FILES, true).'</pre>';
}

echo '<form method="post" action="speech-recognition-file-upload.php" enctype="multipart/form-data">
<label>Select a wav audio file:<input type="file" name="audiofile" id="file"></label><input type="submit" name="submit" value="Submit">
</form>';
?>