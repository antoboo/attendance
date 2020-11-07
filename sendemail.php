<?php
    require 'vendor/autoload.php';    

    class SendEmail{
        public static function SendMail($to, $subject, $content){
        
            $key = '93DF41D594099193F5BA5FC0272A4E191323A223D1D9F33CF27C00C36239AD478E3726A645359148B1FB947551C6F4CA';
            $url = 'https://api.elasticemail.com/v2/email/send';

            try {
        
                $email = array('from'=> "annntoboo@gmail.com",
                'fromName' => 'Antoinette',
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
                
                echo $result;

            } catch (Exception $e) {
                echo 'Email exception Caught : ' . $e->getMessage() . "\n";
                return false;
            }
        }
    }
?>


<!-- <?php 

//require 'vendor/autoload.php';

//class SendEmail{
 //   public static function Sendmail($to,$subject,$content){

      //  $key = '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';

      //  $email = new \SendGrid\Mail\Mail();
        // $email->setFrom("antoinette.roberts85@yahoo.com","Antoinette Roberts-Graham");
        // $email->setSubject($subject);
        // $email->addTo($to);
        // $email->addContent("text/plain",$content);

        // $sendgrid = new \SendGrid($key);

        // try{
        //     $response = $sendgrid->send($email);
        //     return $response;
        // }catch(Exception $e){
        //     echo 'Email exception Caught:'.$e->getMessage()."\n";
        //     return false;
        // }

   // }
//}



//?> -->