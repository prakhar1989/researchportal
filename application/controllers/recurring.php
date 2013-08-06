<?php
class recurring extends CI_Controller {

	function index()
	{
		$data['myClass']=$this; // passing the object for callback
		$data['action']=0;      // what spl action to do for this layout
		session_start();
			if($_SESSION['usertype']==1){
				$this->load->view('layout',$data);
			} elseif ($_SESSION['usertype']==2){
				$this->load->view('layoutComm',$data);
			} elseif($_SESSION['usertype']==3){
				$this->load->view('layoutChairman',$data);
			}
			else{
			
			header("location:login");
			}
	}

	function load_php()
	{
		// $name = $_SESSION['name'];
		// echo "WELCOME $name!!! Please select the options from Menu form Left ";
		
		 $this->load->model('project_model');
		 //*** Table showing Pending Payments till today***
		 $pending = $this->project_model->allPending();
		 echo '
		 <h1>Pending Payments</h1>
		  <FORM METHOD=POST ACTION="PendingRecurring">
		 <TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
		 <table class="table table-bordered">
		<tr><TD><h4>Due Date</TD><TD><h4>Work Order Number</h4></TD><td><h4>RA Name</h4></td><TD><h4>Amount</h4></TD><TD><h4>Select</h4></TD></tr>
		<tbody>';
		foreach ($pending as $rec)
		{
			echo '</TD><TD>';
			print $rec->DueDate;
			echo '</TD><TD>';
			print $rec->WorkOrderId;
			echo '</TD><TD>';
			print $rec->RA_ID;
			echo '</TD><TD>';
			print $rec->Amount;
			echo '</TD><TD><INPUT TYPE="RADIO" NAME="Choice" VALUE='.$rec->Tno.'></input></TD></TR>';
		}
		echo '</tbody>
		 </TABLE>
		 <input type= submit value= "Approve Payment" name="Action">
		</FORM>';
		
		 
		 $Query= $this->project_model->getRecurring(); //*** Gets recurring projectId, amount pending and  total withdrawn
		// *** Table for the Recurring amounts  Display..one record for one RA*** 
		 echo '
		 <h1>Research Assistants </h1>
		 <FORM METHOD=POST ACTION="EditRecurring">
		 <TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
		 <table class="table table-bordered">
		<tr><TD><h4>Work Order Number</h4></TD><td><h4>RA Name</h4></td><TD><h4>Recurring Amount</h4></TD><TD><h4>Total Withdrawn</TD><TD><h4>Select</h4></TD></tr>
		
		<tbody>';
		 $flag=0;
		 foreach($Query as $row)
		 {
			 $flag++;
			 echo '</TD><TD>';
			 print $row->WorkOrderId;
			  echo '</TD><TD>';
			  $name=$row->researcher_id;
			  print $name;
			  echo '</TD><TD>';
			 print $row->recurring_amt;
			 echo '</TD><TD>';
			 print $row->total;
			 echo '</TD><TD><INPUT TYPE="RADIO" NAME="Choice" VALUE="'.$row->ProjectId.';'.$name.'"></input></TD></TR>';
		 }
		 if($flag==0){
		 echo '<h4>No Recurring Accounts for Projects added yet</h4> <br > </tbody> </TABLE>';
		 }
		 else
		 {
		 echo '</tbody>
		 </TABLE>
		 <input type= submit value= "Edit Amount" name="Action"><input type= submit value= "Add Project" name="Action"><input type= submit value= "View Details" name="Action">
		</FORM>';
		 }
	}
}

?>
