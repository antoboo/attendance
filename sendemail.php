<?php 

require 'vendor/autoload.php';

class SendEmail{
    public static function Sendmail($to,$subject,$content){

        $key = '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';

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("antoinette.roberts@yahoo.com","Antoinette Roberts-Graham");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain",$content);

        $sendgrid = new \SendGrid($key);

        try{
            $response = $sendgrid->send($email);
            return $response;
        }catch(Exception $e){
            echo 'Email exception Caught:'.$e->getMessage()."\n";
            return false;
        }

    }
}



?>