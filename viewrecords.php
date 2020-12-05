<?php     
$title = 'View Records';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

//Made changes to the getClients function
    $results = $crud->getClients();
?>

    <table class = 'table'>
        <tr>
            <th> # </th>
            <th> First Name </th>
            <th> Last Name </th>
            <th> Address </th>
            <th> Doctors</th>
            <th> Actions </th>
        </tr>
        <?php while($r = $results -> fetch(PDO::FETCH_ASSOC)) { ?>

            <tr> 
                <td> <?php echo $r['clients_id'] ?> </td>
                <td> <?php echo $r['firstname'] ?> </td>
                <td> <?php echo $r['lastname'] ?> </td>
                <td> <?php echo $r['laddress'] ?> </td>
                <td> <?php echo $r['name'] ?> </td>
                <td> 
                    <a href = "view.php?id=<?php echo $r['clients_id'] ?>" class="btn btn-primary btn-sm"> View </a> 
                    <a href = "edit.php?id=<?php echo $r['clients_id'] ?>" class="btn btn-warning btn-sm"> Edit </a> 
                    <a onclick="return confirm ('Are you are sure you want to delete this record?');" href = "delete.php?id=<?php echo $r['clients_id'] ?>" class="btn btn-danger btn-sm"> Delete </a> 

                </td>
            </tr>
           

        <?php } ?>

        
    </table>

    <br/> <br/> <br/>
    <a onclick="return confirm ('Are you are sure you want to delete All of the record/s?');" href = "delete.php?id=<?php echo $r['clients_id'] ?>" class="btn btn-danger float-right fix-bottom"> Delete All Records</a> 
    <a href = "appoint.php?id=<?php echo $r['clients_id'] ?> " class="btn btn-success float-right fix-bottom"> Add New Record</a> 







<?php echo '<br/> <br/> <hr/>'; ?>
<?php require_once 'includes/footer.php'  ?>