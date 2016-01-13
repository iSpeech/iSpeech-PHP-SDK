<?php
  
  echo <<<html
  <h1>iSpeech PHP SDK</h1>
  <ul>
      <li>iSpeech PHP Script (2013-04-09), version 0.6</li>
      <li>Requires the cURL PHP extension</li>
      <li>Designed for cloud-based speech synthesis and speech recognition</li>
      <li>For more information, visit: <a href="http://www.ispeech.org/api">http://www.ispeech.org/api</a></li>
      <li>Please update the API key from, "developerdemokeydeveloperdemokey" to your API Key.  Keys available at <a href="http://www.ispeech.org/developers">http://www.ispeech.org/developers</a></li>
  </ul>
  <hr>
html;
  
  section("Speech Synthesis Demo", "speech-synthesis-demo.php", "This included PHP file will generate audio using speech synthesis.  Check your directory to find the audio file.");
  section("Speech Recognition HTML Upload Demo", "speech-recognition-file-upload.php", "The included PHP file will recognize audio using speech recognition from an uploaded audio file.");
  section("Speech Recognition Demo", "speech-recognition-demo.php", "The included PHP file will recognize audio using speech recognition.");
  section("Speech Recognition Command List Demo", "speech-recognition-command-list-demo.php", "The included PHP file will recognize audio using speech recognition from a list of commmands.");
  
  echo "Last Updated: April 9, 2013.";
  
  function section($title, $demo, $body){
      echo "<h3>$title</h3>"; 
      echo "<p>Filename: <a href='$demo'>$demo</a></p>";
      echo "<p>$body</p>";
      echo "<p>Result: ";
      require_once($demo);
      echo "</p>";
      echo "<hr>";  
  }
  
?>
