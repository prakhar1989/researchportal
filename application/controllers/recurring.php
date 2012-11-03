<?php
class recurring extends CI_Controller {

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
		// $name = $_SESSION['name'];
		// echo "WELCOME $name!!! Please select the options from Menu form Left ";
		
		// *** Table for the Pending recurring amounts  Display
		 $this->load->model('project_model');
		 $Query= $this->project_model->getRecurring(); //*** Gets recurring projectId, amount pending and  total withdrawn
		 
		 echo '
		 <h1>Recurring Expenses </h1>
		 <FORM METHOD=POST ACTION="EditRecurring">
		 <TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
		 <table class="table table-bordered">
		<tr><TD><h4>ProjectId</h4></TD><TD><h4>Recurring Amount</h4></TD><TD><h4>Total Withdrawn</TD><TD><h4>Select</h4></TD></tr>
		
		<tbody>';
		 $flag=0;
		 foreach($Query as $row)
		 {
			 $flag++;
			 echo '</TD><TD>';
			 print $row->ProjectId;
			  echo '</TD><TD>';
			 print $row->recurring_amt;
			 echo '</TD><TD>';
			 print $row->total;
			 echo '<TD><INPUT TYPE="RADIO" NAME="Choice" VALUE="'.$row->ProjectId.'"></TD></TR>';
		 }
		 if($flag==0){
		 echo '<h4>No Recurring Accounts for Projects added yet</h4> <br > </tbody> </TABLE>';
		 }
		 else
		 {
		 echo '</tbody>
		 </TABLE>
		 <input type= submit value= "Edit Amount" name="Action"><input type= submit value= "Add Project" name="Action">
		</FORM>';
		 }
	}
}

?>
