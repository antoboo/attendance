<?php
function sendElasticEmail($to, $subject, $body_text, $body_html, $from, $fromName)
{
 $res = "";

 $data = "username=".urlencode("YOUR ACCOUNT EMAIL ADDRESS");
 $data .= "&api_key=".urlencode("YOUR API KEY");
 $data .= "&from=".urlencode($from);
 $data .= "&from_name=".urlencode($fromName);
 $data .= "&to=".urlencode($to);
 $data .= "&subject=".urlencode($subject);
 if($body_html)
 $data .= "&body_html=".urlencode($body_html);
 if($body_text)
 $data .= "&body_text=".urlencode($body_text);

 $header = "POST /mailer/send HTTP/1.0\r\n";
 $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
 $header .= "Content-Length: " . strlen($data) . "\r\n\r\n";
 $fp = fsockopen('ssl://api.elasticemail.com', 443, $errno, $errstr, 30);

?>

































<!-- <?php
    // require 'vendor/autoload.php';    

    // class SendEmail{
    //     public static function SendMail($to, $subject, $content){
    //         $key = 'EC9DE9ADB8B7A2637B8F6626E3F5BC5F0D7C0C132B88EA3C1363F0FC60F2D3FE0CCF6B8F73D40336C7EAE0C243821EBD';
    //         $url = 'https://api.elasticemail.com/v2/email/send';

    //         try {

    //             $email = array('from' => 'arobertsgraham@gmail.com',
    //             'fromName' => 'Message sent by client',
    //             'apikey' => $key,
    //             'subject' => $subject,
    //             'to' => 'arobertsgraham@gmail.com',
    //             'bodyHtml' => $content,
    //             'bodyText' => $content,
    //             'isTransactional' => false);
                
    //             $ch = curl_init();
    //             curl_setopt_array($ch, array(
    //                 CURLOPT_URL => $url,
    //                 CURLOPT_POST => true,
    //                 CURLOPT_POSTFIELDS => $email,
    //                 CURLOPT_RETURNTRANSFER => true,
    //                 CURLOPT_HEADER => false,
    //                 CURLOPT_SSL_VERIFYPEER => false
    //             ));
                
    //             $result=curl_exec ($ch);
    //             curl_close ($ch);
                
    //             echo $result;
    //             echo $to;
    //         } catch (Exception $e) {
    //             echo 'Email exception Caught : ' . $e->getMessage() . "\n";
    //             return false;
    //         }
    //     }
    // }
?> -->



<!-- 
 <?php  

// require 'vendor/autoload.php';

// class SendEmail{
//    public static function Sendmail($to,$subject,$content){

//        $key = '';

//        $email = new \SendGrid\Mail\Mail();
//         $email->setFrom("annntoboo@gmail.com","Ann");
//         $email->setSubject($subject);
//         $email->addTo($to);
//         $email->addContent("text/plain",$content);

//         $sendgrid = new \SendGrid($key);

//         try{
//             $response = $sendgrid->send($email);
//             return $response;
//         }catch(Exception $e){
//             echo 'Email exception Caught:'.$e->getMessage()."\n";
//             return false;
//         }

//    }
// } 



// ?> 

