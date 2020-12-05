<?php 
    
        $title = 'Edit Record';
        require_once 'includes/header.php';
        require_once 'includes/auth_check.php';
        require_once 'db/conn.php';

        $results = $crud -> getDoctors();

        if(!isset ($_GET['id']))
        {
            //echo 'error'
            include 'includes/errormessage.php';
            header("Location: viewrecords.php");
        }
        else {

            $id = $_GET['id'];
            $clients = $crud -> getClientsDetails($id);
           
          

    ?>




    <h1 class ="text-center"> Edit Attendee Record </h1>

    <form method="post" action ="editpost.php">

            <input type ="hidden" name = "id" value="<?php echo $clients['clients_id'] ?>" />
        
        <div class="form-group">

            <label for="firstname">First Name</label>
            <input type="text" class="form-control" value="<?php echo $clients['firstname'] ?>" id="firstname" name = "firstname">
            
        </div>

        <div class="form-group">

            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $clients['lastname'] ?>" id="lastname" name ="lastname">
            
        </div>

        <div class="form-group">

            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $clients['dateofbirth'] ?>" id="dob"  name ="dob">
            
        </div>

        <div class="form-group">

            <label for="clients">Area of Expertise</label>
                <select class="form-control" id="clients" name="clients" >
                    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                        <option value = "<?php echo $r['clients_id']?>"
                            <?php if($r['clients_id'] == $clients['clients_id']) echo 'selected'?> >
                            <?php echo $r['name']; ?> 
                        </option>
                    <?php } ?>
                </select>

        </div>

            
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" value="<?php echo $clients['emailaddress'] ?>" id="email" name="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.</small>
        </div>


        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $clients['contactnumber'] ?>" id="phone" name ="phone" aria-describedby="phoneHelp">
            <small id="phoneHelp" class="form-text text-white">We'll never share your phone number with anyone else.</small>
        </div>

        <button type="submit"  name = "submit" id ="submit" class="btn btn-success">Save Changes</button>
        <a href = viewrecords.php  class="btn btn-primary float-right"> Back to List </a>   

    </form>

<?php } ?>


    <?php echo '<br/> <br/> <hr/>'; ?>
    <?php require_once 'includes/footer.php'  ?>


