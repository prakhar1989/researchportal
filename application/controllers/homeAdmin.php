<?php
class homeAdmin extends CI_Controller {

	function index()
	{
		session_start();
		$data['myClass']=$this; // passing the object for callback
		$data['action']=0;      // what spl action to do for this layout
		
		if($_SESSION['usertype']==1){
						$this->load->view('layout',$data);
					} 
					else
					{
					header("location:login");
					}

	}

	function load_php()
	{
		 $name = $_SESSION['username'];
         echo "<h1>Welcome, $name</h1>";
         echo "To begin, use the nav bar on the top to navigate within research projects or conferences saved in the system";
         
	}
}

?>
