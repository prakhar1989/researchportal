<?php
class HomeAdmin extends CI_Controller {

	function index()
	{
		$data['myClass']=$this; // passing the object for callback
		$data['action']=0;      // what spl action to do for this layout
		session_start();
		if($_SESSION['usertype']==1)
		{
		$this->load->view('layout',$data);
		}
		else{
		//redirect to login page with a msg
		}
	}

	function load_php()
	{
		 $name = $_SESSION['name'];
         echo "<h1>Welcome, $name</h1>";
         echo "To begin, use the nav bar on the top to navigate within research projects or conferences saved in the system";
         
	}
}

?>
