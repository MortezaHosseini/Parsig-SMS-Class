<?php
     include 'parsig_sms_class.php';
     $config = array(
          'username' => 'test',
          'password' => '********',
          'from' => '3000xxxxxxx',
     );
     $server = new SMS_Handler($config);
     print_r($server->OneSend('09********', 'تست'));
     print_r($server->MultiSend(array('09*********'), array('تست')));
     print_r($server->AccountInfo());
     echo "<pre>";
     print_r($server->FetchMessages(0, false));
     echo "</pre>";
?>
