
<?php

if(isset($_POST['btn-send'])){

    $UserName = $_POST['UName'];
    $Email = $_POST['Email'];
    $Subject = $_POST['Subject'];
    $Msg = $_POST['msg'];
     
}

if(empty($UserName)||empty($Email)||empty($Subject)||empty($Msg))
{
   
   header('location:contact.php?error');
}
else{

    $to ="annntoboo@gmail.com";
    $body = "";
    $body .="From: ".$UserName."\r\n";
    $body .="Email:".$Email."\r\n";
    $body .="Mssage: ".$Msg."\r\n";

    if(mail($to,$Subject,$body)){

        header("location:contact.php?success");
    }
}
?>



