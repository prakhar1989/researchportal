<?php
class logout extends CI_Controller {
function index()
		{
session_start(); //Start the current session
session_destroy(); //Destroy it! So we are logged out now
header('location:login'); // Move back to login.php with a logout message
		}
}
?>
