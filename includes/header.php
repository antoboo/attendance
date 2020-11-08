<?php

//this includes the session file. This file contains code that start / resumes a seesion 
//By having it in the header file. It will included on every page, allowing session capability to be used on every page across the website. 
include_once 'includes/session.php'

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href ="css/site.css">

    <title> Attendance - <?php echo $title ?> </title>

  </head>

    
     <div class ="container">

      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">        
          <a class="navbar-brand" href="index.php">IT Conference</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

          <div class="collapse navbar-collapse" id="navbarNav">
              <div class="navbar-nav  active mr-auto">
                  <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                  <a class="nav-item nav-link" href="viewrecords.php">View Attendance</a>
          </div>
            <div class="navbar-nav active ml-auto">

          <?php if(!isset($_SESSION['userid'])){
            ?> 
                    <a class="nav-item nav-link" href="login.php"> Login <span class="sr-only">(current)</span> </a>
                              
          <?php } else{ ?>

              <a class="nav-item nav-link" href="#"><span> Hello <?php echo $_SESSION['username'] ?>!!!!</span> <span class="sr-only">(current)</span> </a>
              <a class="nav-item nav-link" href="logout.php"> Logout <span class="sr-only">(current)</span> </a>
          
          <?php } ?>
          
          </div>

       </nav>

       <br/>