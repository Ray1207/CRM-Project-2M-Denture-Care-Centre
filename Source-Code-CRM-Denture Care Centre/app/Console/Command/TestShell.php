<?php
class TestShell extends AppShell {
    public function main() {

     
     $username = 'Enamel19'; 
    $password = '55320704'; 
    $destination = '61432500925'; 
    $source = 'Denture Care Centre'; 
    $text = 'Your Appointment is on this coming Friday. See you then.'; 
         
    $content =  'action=sendsms'. 
                '&user='.rawurlencode($username). 
                '&password='.rawurlencode($password). 
                '&to='.rawurlencode($destination). 
                '&from='.rawurlencode($source). 
                '&text='.rawurlencode($text); 
     
    $smsglobal_response = file_get_contents('http://www.smsglobal.com.au/http-api.php?'.$content); 
     
    //Sample Response 
    //OK: 0; Sent queued message ID: 04b4a8d4a5a02176 SMSGlobalMsgID:6613115713715266  
     
    $explode_response = explode('SMSGlobalMsgID:', $smsglobal_response); 
     
    if(count($explode_response) == 2) { //Message Success 
        $smsglobal_message_id = $explode_response[1]; 
         
        //SMSGlobal Message ID 
        echo $smsglobal_message_id; 
    } else { //Message Failed 
        echo 'Message Failed'.'<br />'; 
         
        //SMSGlobal Response 
        echo $smsglobal_response;     
    } 
    
    }
}

