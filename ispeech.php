<?php
  
  // iSpeech PHP Script (2013-04-09), version 0.6 (beta)
  // Requires the cURL PHP extension
  // Designed for cloud-based speech synthesis and speech recognition
  // For more information, visit: http://www.ispeech.org/api
  
   class iSpeechBase{
        var $server;
        var $parameters = array('device-type'=>'php-SDK-0.6');
       
       function setParameter($parameter, $value){
            if ($parameter == 'server')
                $this->server = $value;
            else
                $this->parameters[$parameter] = $value;
        }
       
        function makeRequest(){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->server . '?' . http_build_query($this->parameters));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            $http_body = curl_exec($ch);
            
            
            if (curl_getinfo($ch, CURLINFO_HTTP_CODE) != 200 && $this->parameters['action'] == 'convert'){
                $errorMessage = array();
                $curlError = curl_error($ch);
                parse_str($http_body, $apiError);
                
                
                $errorMessage['http code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if (count($apiError) > 0)
                    $errorMessage['api error'] = $apiError;
                
                if ($curlError != null)
                    $errorMessage['curl error'] = $curlError;
                    
                return $errorMessage;
            }
            
            return $http_body;
        }
   }
  
   class SpeechSynthesizer extends iSpeechBase{
       function __construct() {
            parent::setParameter('action', 'convert');
       }
   }
      
   class SpeechRecognizer extends iSpeechBase{
        function __construct() {
            parent::setParameter('action', 'recognize');    
       }
   }