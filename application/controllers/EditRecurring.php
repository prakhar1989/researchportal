<?php
class EditRecurring extends CI_Controller {

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
	if($_POST['Action']=='Edit Amount')
		{
			//echo 'Going to edit amount for '.$_POST['Choice'];
		//	echo $_POST['Choice'];
			list($project,$rname)=explode(';',$_POST['Choice']);
			
			echo'
						 <h1>Edit Recurring Amount</h1>
					<p>Please Enter the new Recurring Amount below</p>
					<form method=POST action="EditRecurring/EditAmount" ><table class="table table-bordered">
					
					<tbody>
						<tr>
							<td>New Recurring Amount</td>
							<td><input type="text" class="large" name="amount"></input></td>
						</tr>
         			</tbody>
					</table>

					<input type="submit" value"Submit" class="btn btn-large btn-primary"></input><input type="hidden" name=projectId value="'.$project.'"></input><input type="hidden" name=rname value="'.$rname.'"></input></form>';
			
		}
	else if ($_POST['Action']=='Add Project')
		{

			echo'<table class="table table-bordered">
					
					<tbody>
						  
						
					<p>Please enter the amounts in the Recurring Expense below</p>
					<form name="recurring" method=POST action="EditRecurring/insert"  enctype="multipart/form-data"><table class="table table-bordered">
					<thead>
						<tr>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Work Order Number</td>
							<td><input type="text" class="large" name="WorkOrderId"></input></td>
						</tr>
						<tr>
							<td>Faculty User ID</td>
							<td><input type="text" class="large" name="facultyname"></input></td>
						</tr>
						<tr>
							<td>Research Assistant Name</td>
							<td><input type="text" class="large" name="RA_id"></input></td>
						</tr>
						<tr>
							<td>Research Assistant Date of Birth</td>
							<td><input type="text" class="large" name="DOB"></input></td>
						</tr>
						<tr>
							<td>Recurring Amount</td>
							<td><input type="text" class="large" name="recurring_amt"></input></td>
						</tr>
						<tr>
							<td>Start payment from month (1 - Jan, 2 Feb etc.)</td>
							<td><input type="text" class="large" name="Start_payment"></input></td>
						</tr>
						<tr>
							<td>Number of months</td>
							<td><input type="text" class="large" name="No_payments"></input></td>
						</tr>
						<tr>
							<td>Day when payment is to be made (1-31)</td>
							<td><input type="text" class="large" name="Day_payment"></input></td>
						</tr>
						<tr>
							<td>Account Details (Enter Account number, Bank name, Bank branch, Name of Account Holder)</td>
							<td><input type="text" class="large" name="Account_details"></input></td>
						<tr>
							<td>Payment Method</td>
							<td><input type="text" class="large" name="Payment_Procedure"></input></td>
						</tr>
						<tr>
							<td>In case of cheque transfer: the cheque would be in the name of</td>
							<td><input type="text" class="large" name="Cheque_name"></input></td>
						</tr>
						<tr>
							<td>PAN number</td>
							<td><input type="text" class="large" name="PAN"></input></td>
						</tr>
						<tr>
							<td>Upload CV</td>
							<td><input type="file" name="cv" id="cv" ></td>
						</tr>
						<tr>
							<td>Upload Appointment Letter</td>
							<td><input type="file" name="apt_ltr" id="apt_ltr" ></td>
						</tr>
							
					</tbody>
					</table>

					<input type="submit" value"Submit" class="btn btn-large btn-primary"></input></form>';
									
					
		}
	else if($_POST['Action']=='View Details')
		{
			list($project,$rname)=explode(';',$_POST['Choice']);
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
    
	//*** this will change the recurring amount for the selected project
	function EditAmount(){
	$data['myClass']=$this;
	$data['action']=2;
	
	$this->load->model('project_model');
	$Msg=$this->project_model->editAmount($_POST['projectId'],$_POST['amount'],$_POST['rname']);
	$data['msg']=$Msg;
	$this->load->view('layout',$data);
	}
	
	//*** this will add a new project for the recurring consideration
	// function AddProject(){
	// $data['myClass']=$this;
	// $data['action']=2;
	// $this->load->model('project_model');
	// $Msg=$this->project_model->addProject($_POST['WorkOrderNumber'],$_POST['amount'],$_POST['total']);
	// $data['msg']=$Msg;
	// $this->load->view('layout',$data);
	// }
	
	//*** for displaying the appropriate message
	function approveMsg($status){
		if($status=='Edited')
			{
			echo 'The recurring Amount has been Edited';
			}
		else
			{
			echo 'The Project has been added for Recurring Payments';
			}
	}
	//function to insert the data into recurring table
			
	function insert()
	{
		session_start();
		 //echo 'The value of Project category is: '.$_POST['category'];
		 $data['WorkOrderId']=$_POST['WorkOrderId'];
		 $data['recurring_amt']=$_POST['recurring_amt'];
		 $data['Userid']=$_POST['facultyname'];
		 $data['Account_Details']=$_POST['Account_details'];
		 $data['Payment_Procedure']=$_POST['Payment_Procedure'];
		 $data['No_Payments']=$_POST['No_payments'];
		 $data['researcher_id']=$_POST['RA_id'];
		 $data['Day_payment']=$_POST['Day_payment'];
		 $data['DOB']=$_POST['DOB'];
		 $data['PAN']=$_POST['PAN'];
		 $data['Cheque_name']=$_POST['Cheque_name'];
		 $data['Month_payment']=$_POST['Start_Payment'];
		 $this->load->model('project_model');
		 $msg=$this->project_model->insertRecurring($data);
		 //Uploading the file code... Can be modified to check the file extension if required
		 $ext=end(explode('/', $_FILES['cv']['type']));
		 move_uploaded_file($_FILES['cv']["tmp_name"],"upload/" . $_POST['WorkOrderId'].'_cv_'.$_POST['RA_id'].'.'.$ext);
		 $ext=end(explode('/', $_FILES['apt_ltr']['type']));
		 move_uploaded_file($_FILES['apt_ltr']['tmp_name'],"upload/" . $_POST['WorkOrderId'].'_apt_ltr_'.str_replace(" ","_",$_POST['RA_id']).'.'.$ext);
		 
		// echo "Stored in: " . "upload/" . $_FILES["cv"]["name"];
		 require('showMsg.php');
		 $showMsg=new showMsg();
		 $showMsg->index($msg,'admin');
	}	

	function view() 
	{
		//$this->project_model->get
	}

}	
?>
