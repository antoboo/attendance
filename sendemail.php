<?php
    require 'vendor/autoload.php';    

    class SendEmail{
        public static function SendMail($to, $subject, $content){
            $key = "6B9037BE4997DCD3112515C6180075D13CF7BFBF3EC6356B4B69776116F622063558D7513ECD08E8B61280E8D4BDF88C";
            //$key = '086E76797EC570A5A10EC20A7762C67EC89581EF2BBDFBA16E833C6D84C9F78F4819424550AEECFE8600A83B68881FF6';
            $url = 'https://api.elasticemail.com/v2/email/send';

            try {

                $email = array('from' => 'antoinette.roberts85@yahoo.com',
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
        // $email->setFrom("antoinette.roberts@yahoo.com","Antoinette Roberts-Graham");
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