<?php 
//This includes the session_start() to resume the sessionon this page. It identifies the session that needs to be destroyed.
include_once 'includes/session.php'?>

<?php 
// session_destroyed() destroys the session. Then the header()function redirects to the home page
session_destroy();
header('Location:index.php');

?>