<?php
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
if(!isset ($_GET['id']))
{
    echo 'Cant locate to Delete';
    header("Location: viewrecords.php");

}

else{
    //GET ID values
    $id = $_GET['id'];

    //Call Delete Function
    $result = $crud->deleteAttendee($id);
    
    //Redirect to list 
    if($result)
    {
        header("Location: viewrecords.php");
    }
    else {
        echo 'error';
    }

}









?>