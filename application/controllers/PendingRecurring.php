<?php
class PendingRecurring extends CI_Controller {

	function index()
	{
					$data['myClass']=$this;
					$data['action']=0;
					session_start();
					if($_SESSION['usertype']==1){
				$this->load->view('layout',$data);
			} elseif ($_SESSION['usertype']==2){
				$this->load->view('layoutComm',$data);
			} elseif($_SESSION['usertype']==3){
				$this->load->view('layoutChairman',$data);
			}
		else{
		//redirect to login page with a msg
					header("location:login");

		}
	}

	function load_php()
	{
	$this->load->model('project_model');
	if($_POST['Action']=='Approve Payment')
		{
			$msg=$this->project_model->completeTransaction($_POST['Choice']);
			echo $msg;
		}
	else if($_POST['Action']=='View Details')
		{
			$res= $this->project_model->getSpecificRecurring($project,$rname);
			
			echo '<table class="table table-bordered">
						  
					<p></p>	
					<p>Details of Research Assistant</p>
					
					<tbody>
						<tr>
							<td>Work Order Number</td>
							<td>'.$res[0]->WorkOrderId.'</td>
						</tr>
						<tr>
							<td>Research Assistant Name</td>
							<td>'.$res[0]->researcher_id.'</td>
						</tr>
						<tr>
							<td>Research Assistant Date of Birth</td>
							<td>'.$res[0]->DOB.'</td>
						</tr>
						<tr>
							<td>Recurring Amount</td>
							<td>'.$res[0]->recurring_amt.'</td>
						</tr>
						<tr>
							<td>Start payment from month (1 - Jan, 2 Feb etc.)</td>
							<td>'.$res[0]->Month_payment.'</td>
						</tr>
						<tr>
							<td>Number of months</td>
							<td>'.$res[0]->No_payments.'</td>
						</tr>
						<tr>
							<td>Day when payment is to be made</td>
							<td>'.$res[0]->Day_payment.'</td>
						</tr>
						<tr>
							<td>Account Details (Enter Account number, Bank name, Bank branch, Name of Account Holder)</td>
							<td>'.$res[0]->Account_Details.'</td>
						<tr>
							<td>Payment Method</td>
							<td>'.$res[0]->Payment_Procedure.'</td>
						</tr>
						<tr>
							<td>In case of cheque transfer: the cheque would be in the name of</td>
							<td>'.$res[0]->Cheque_name.'</td>
						</tr>
						<tr>
							<td>PAN number</td>
							<td>'.$res[0]->PAN.'</td>
						</tr>
						<tr>
							<td>Download CV</td>
							<td></td>
						</tr>
						<tr>
							<td>Download Appointment Letter</td>
							<td></td>
						</tr>
							
					</tbody>
					</table>';
		}
	}
    

	
}	
?>
