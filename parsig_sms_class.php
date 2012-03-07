<?php

     class SMS_Handler{
          private $config = array();
          private $SMS = null;
     
          public function __construct($config){
               include 'nus/nusoap.php';
               $this->SMS = new nusoap_client('http://sbox.ir/webservice/?wsdl', 'wsdl');
               $this->config = $config;
          }

          function OneSend($number = null, $msg = null){
               $config = $this->config;
               $config['to'] = $number;
               $config['message'] = $msg;
               return $this->SMS->call('send', $config);
               
          }
          
          function MultiSend($number = array(), $msg = array()){
               $config = $this->config;
               $config['to'] = $number;
               $config['message'] = $msg;
               return $this->SMS->call('multiSend', $config);
               
          }
          
          function AccountInfo(){
               $config = $this->config;
               unset($config['from']);
               return $this->SMS->call('accountInfo', $config);
               
          }
          
          
          function FetchMessages($time  = null, $new = true){
               $config = $this->config;
               
               unset($config['from']);
               if(!empty($time)) $config['time'] = $time;
               $config['new'] = $new;
               
               return $this->SMS->call('getMessages', $config);
               
          }
}


