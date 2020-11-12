    
    <?php 
    
        $title = 'Index';
        require_once 'includes/header.php';
        require_once 'db/conn.php';

        $results = $crud -> getSpecialties();

    ?>

    <!-- 
        -First Name
        -Last Name
        - Date of Birth (Use DatePicker)
        -Specialty (Database Admin, Software Developer, Web Administration, Other)
        -Email Address
        -Contact Number 
    -->



    <h1 class ="text-center"> Registration for IT Conference </h1>

    <form method="post" action ="success.php" enctype="multipart/form-data">
        
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

            <label for="specialty">Area of Expertise</label>
            <select class="form-control" id="specialty" name="specialty" >
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                     <option value = "<?php echo $r['specialty_id']?>"> <?php echo $r['name']; ?> </option>
                <?php } ?>
            </select>

        </div>

            
        <div class="form-group">
            <label for="email">Email address</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <medium id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</medium>
        </div>


        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input required type="text" class="form-control" id="phone" name ="phone" aria-describedby="phoneHelp">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
        </div>

        <br/>

        <div class="custom-file">
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar" >
            <label class="custom-file-label" for="avatar">Choose File</label>
            <small class="form-text text-danger">Photo Upload is Optional</small>

        </div>

        <!-- <div>
            <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
            </form>
        </div> -->



        <button type="submit" id="submit" name = "submit" class="btn btn-primary btn-block" disable> <span class="spinner-grow spinner-grow-sm"></span>Register Now</button>

    </form>


    <?php echo '<br/> <br/> <hr/>'; ?>
    <?php require_once 'includes/footer.php'  ?>