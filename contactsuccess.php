<?php    
        $title = 'Success';
        require_once 'includes/header.php';  
        require_once 'sendemail.php';
        
       
        if(isset($_POST['submit'])) {
            //extract values from the $_POST array
            $UName = $_POST['UName'];          
            $FromEmail = $_POST['FromEmail'];
            $Subject = $_POST['Subject'];           
            $msg = $_POST['msg'];
            
        }
                             
           $mailTo="antoboo@gmail.com";
           $headers = "From:".$FromMail;
           $txt = "You have recieved received an email from".$UName.".\n\n".$msg;

       mail($mailTo, $Subject, $txt, $headers);
       header("Location:contact.php?mailsend");
                
                


                // if (empty($_POST["gender"])) {
                //     $genderErr = "Gender is required";
                //   } else {
                //     $gender = test_input($_POST["gender"]);
                //   }

                  function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                  }
            
        



    

?>

<?php echo '<br/> <br/> <hr/>'; ?>
<?php require_once 'includes/footer.php'  ?>