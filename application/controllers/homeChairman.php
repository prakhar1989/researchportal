<?php
class HomeChairman extends CI_Controller {

function index()
{
$data['myClass']=$this; // passing the object for callback
$data['action']=0;      // what spl action to do for this layout
session_start();
$_SESSION['usertype']=3;
$this->load->view('layoutChairman',$data);
}

function load_php()
{
 echo 'WELCOME Chairman!!!  Please select the options from Menu form Left ';
 
}
}

?>