<?php

class homeStudent extends CI_Controller {

function index()
{
$data['myClass']=$this; // passing the object for callback
$data['action']=0;      // what spl action to do for this layout
$this->load->view('layoutStudent',$data);
}

function load_php()
{
 include ("homeAdmin.php");
 echo 'WELCOME!!! Mr XYZ Please select the options from Menu form Left';  // TODO: Extract First Name from DB and display
 
}
}

?>