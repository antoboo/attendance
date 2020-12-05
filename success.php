<?php    
        $title = 'Success';
        require_once 'includes/header.php';  
        require_once 'db/conn.php';
        require_once 'sendemail.php';
        
       
        if(isset($_POST['submit'])) {
            //extract values from the $_POST array
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $laddress = $_POST['laddress'];
            //$gender = $_POST['gender'];
            $contact = $_POST['phone'];
            $doctors = $_POST['doctors'];
          
            $orig_file = $_FILES["avatar"]["tmp_name"];
            $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
            $target_dir = 'uploads/';
            $destination = "$target_dir$contact.$ext";
            move_uploaded_file($orig_file, $destination);}
            
           
            
            $isSuccess = $crud->insertClients($fname, $lname, $dob, $email,$laddress, $contact,$doctors, $destination); 
            $doctorsName=$crud->getDoctorsById($doctors);

            if($isSuccess){
                SendEmail::Sendmail($email,"Welcome to IT Conference 2020", "You have successfully registerted for this year\'s IT Conference");
                
                
                include 'includes/successmessage.php';

            }else {
                include 'includes/errormessage.php';


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
            
        }



    

?>





<!-- This prints out values that were passed to the action page using methods = "get" -->

<!--     <div class="card" style="width: 20rem;">
        <div class="card-body">
            <h5 class="card-title"> <?php // echo $_GET['firstname'].' '. $_GET['lastname'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">doctors
            <?php //echo $_GET['doctors'] ?>
            </h6>
            <p class="card-text"> Date of Birth:  <?php // echo $_GET['dob'];  ?> </p>
            <p class="card-text"> Email Add: <?php // echo $_GET['email'];  ?> </p>
            <p class="card-text"> Telephone Number: <?php //echo $_GET['phone'];  ?> </p>
            
        </div>
    </div>

-->
<img src = "<?php echo $destination;?> " class ="rounded-circle" style = "width: 20%; height:20%"/>

<div class="card" style="width: 20rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_POST['firstname'].' '. $_POST['lastname']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">doctors
            <?php echo $doctorsName['name']; ?>
            </h6>
            <p class="card-text"> Date of Birth:  <?php echo $_POST['dob'];  ?> </p>
            <p class="card-text"> Email Add: <?php echo $_POST['email'];  ?> </p>
            <p class="card-text"> Telephone Number: <?php echo $_POST['phone'];  ?> </p>
            
        </div>
    </div>





   












<?php echo '<br/> <br/> <hr/>'; ?>
<?php require_once 'includes/footer.php'  ?>