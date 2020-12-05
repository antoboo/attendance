<?php 
    
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud -> getDoctors();

?>

<!-- 
    -First Name
    -Last Name
    - Date of Birth (Use DatePicker)
    -Specialty (Database Admin, Software Developer, Web Administration, Other)
    -Email Address
    -Contact Number 
-->



<h2 class ="text-center "> <span>Book Your Appointments</span> </h2>

<form action ="/attendanceMerge/success.php" method="post"  enctype="multipart/form-data">
<div class="container">
    
        <div class="form-group">

            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" id="firstname" name = "firstname">
            
        </div>

            <div class="form-group">

                <label for="lastname">Last Name</label>
                <input required type="text" class="form-control" id="lastname" name ="lastname">
                
            </div>

                <div class="form-group">

                    <label for="dob">Date of Birth</label>
                    <input required type="text" class="form-control" id="dob"  name ="dob">
                    
                </div>

                    <div class="form-group">

                        <label for="doctors">Attending Doctors</label>
                        <select class="form-control" id="doctors" name="doctors" >
                            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                                <option value = "<?php echo $r['doctors_id']?>"> <?php echo $r['name']; ?> </option>
                            <?php } ?>
                        </select>

                    </div>

        
                        <div class="form-group">
                            <label for="email">Email address</label>
                                <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                            <medium id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.</medium>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                                <input required type="laddress" class="form-control" id="laddress" name="laddress" aria-describedby="laddressHelp">
                            <medium id="laddressHelp" class="form-text text-white">We'll never share your email with anyone else.</medium>
                        </div>


                            <div class="form-group">
                                <label for="phone">Contact Number</label>
                                    <input required type="text" class="form-control" id="phone" name ="phone" aria-describedby="phoneHelp">
                                <small id="phoneHelp" class="form-text text-white">We'll never share your phone number with anyone else.</small>
                            </div>

                                    

                <div class="custom-file">
                    <input type="file" class="custom-file-input form-group" id="avatar" name="avatar" accept="image/*">
                    <label class="custom-file-label" for="avatar">Choose File</label>
                    <small id="avatarHelp" class="form-text text-success bg-light"> Upload is Optional</small>
                </div>

   

    <button type="submit" id="submit"  name = "submit" class="btn btn-success btn-block" disable> Register</button>
    
    <input type="submit" id="submit" name = "submit" value="Register Now"> 
</form>
    </div>
        


<?php echo '<br/> <br/> <hr/>'; ?>
<?php require_once 'includes/footer.php'  ?>



















