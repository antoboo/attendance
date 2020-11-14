


<?php
    require 'vendor/autoload.php';    

    class SendEmail{
        public static function SendMail($to, $subject, $content){
            $key = '';
            $url = 'https://api.elasticemail.com/v2/email/send';

            try {

                $email = array('from' => 'arobertsgraham@gmail.com',
                'fromName' => 'Admin',
                'apikey' => $key,
                'subject' => $subject,
                'to' => $to,
                'bodyHtml' => $content,
                'bodyText' => $content,
                'isTransactional' => false);
                
                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $email,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER => false,
                    CURLOPT_SSL_VERIFYPEER => false
                ));
                
                $result=curl_exec ($ch);
                curl_close ($ch);
                
                //echo $result;

            } catch (Exception $e) {
                echo 'Email exception Caught : ' . $e->getMessage() . "\n";
                return false;
            }
        }
    }
?>




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



?> 