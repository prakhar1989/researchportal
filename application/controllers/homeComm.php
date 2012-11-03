<?php

class Homecomm extends CI_Controller {

function index()
{
$data['myClass']=$this; // passing the object for callback
$data['action']=0;      // what spl action to do for this layout
session_start();
$_SESSION['usertype']=2;

$this->load->view('layoutComm',$data);


}

function load_php()
{
 include ("homeAdmin.php");
 echo 'WELCOME!!! Mr XYZ Please select the options from Menu form Left';  // TODO: Extract First Name from DB and display
 echo 'usertype is :'.$_SESSION['usertype'];
}
}

?>