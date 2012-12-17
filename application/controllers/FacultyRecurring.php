<?PHP

class FacultyRecurring extends CI_Controller {
	
	function index()
		{
			
		$data['myClass']=$this;
		$data['action']=0;
		session_start();
		if($_SESSION['usertype']==4){
		$this->load->view('layoutFaculty',$data);
		} 
		else{
		header("location:login");
		}
}
	function load_php()
				{
				$ProjectID = $this->input->post('ProjectChoice');
				//echo $ProjectID;
				//Load the project model
				$this->load->model('project_model');
				$result= $this->project_model->projectRecurring($_SESSION['username']);
				//echo '<p> hello this is the Project Details Page </p>';
				// Display the results
				echo'
					<FORM METHOD=POST ACTION="http://localhost/rp/index.php/FacultyAddRecurring">
					<table class="table table-bordered">
					<tr<><td></td></tr>
					<TD><h4>ProjectId</h4></TD><TD><h4>RA ID</h4></TD><TD><h4>Recurring Amount</h4></TD><TD><h4>Number of Payments</h4></TD><TD><h4>Account Details</h4></TD><TD><h4>Payment Procedure</h4></TD><TD><h4>Day of payment</h4></TD><TD><h4>Total Payment</h1></TD>
					
					<tbody>';
					foreach($result->result() as $row)
						{
						echo '<TR><TD>';
						 print $row->ProjectId;
						 echo '</TD><TD>';
						 print $row->researcher_id;
						 echo '</TD><TD>';
						 print $row->recurring_amt;
						 echo '</TD><TD>';
						 print $row->No_payments;
						 echo '</TD><TD>';
						 print $row->Account_Details;
						 echo '</TD><TD>';
						 print $row->Payment_Procedure;
						 echo '</TD><TD>';
						 print $row->Day_payment;
						 echo '</TD><TD>';
						 print $row->total;
						 echo '</TD>';
						 //echo '<TD><INPUT TYPE="RADIO" NAME="ProjectChoice" VALUE="'.$row->ProjectId.'"></TD></TR>';
						}			 
					 echo '</tbody></TABLE>
					<INPUT TYPE=SUBMIT name ="Add" value="Add Recurring Expense">
					</FORM>';
                
				
				}
	
	}


?>