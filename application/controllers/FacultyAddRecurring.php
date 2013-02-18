<?php

class FacultyAddRecurring extends CI_Controller {

				function index()
				{
					$data['myClass']=$this;
					$data['action']=0;
					session_start();
					//$this->load->view('layout',$data);
					if($_SESSION['usertype']==4){
						$this->load->view('layoutFaculty',$data);
					}					
					else{
			//echo 'hello';
			header("location:login");
			}
				}

				function load_php()
				{
					 
					 $this->load->model('project_model');
					echo'<table class="table table-bordered">
					<thead>
						<tr>
						</tr>
					</thead>
					<tbody>
						  
						
					<p>Please enter the amounts in the Recurring Expense below</p>
					<form name="recurring" method=POST action="FacultyAddRecurring/insert"  enctype="multipart/form-data"><table class="table table-bordered">
					<thead>
						<tr>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Work Order Number</td>
							<td><input type="text" class="large" name="WorkOrderNumber"></input></td>
						</tr>
						<tr>
							<td>Research Assistant ID</td>
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
							<td>Number of months</td>
							<td><input type="text" class="large" name="No_payments"></input></td>
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
				    
				 
				 
				 
				
			//function to insert the data into project table
			
			function insert()
			{
			session_start();
			 //echo 'The value of Project category is: '.$_POST['category'];
			 $data['WorkOrderNumber']=$_POST['WorkOrderNumber'];
			 $data['recurring_amt']=$_POST['recurring_amt'];
			 $data['Userid']=$_SESSION['username'];
			 $data['Account_Details']=$_POST['Account_details'];
			 $data['Payment_Procedure']=$_POST['Payment_Procedure'];
			 $data['No_Payments']=$_POST['No_payments'];
			 $data['researcher_id']=$_POST['RA_id'];
			 $data['Day_payment']=$_POST['Day_payment'];
			 $data['DOB']=$_POST['DOB'];
			 $data['PAN']=$_POST['PAN'];
			 $data['Cheque_name']=$POST['Cheque_name'];
			 $this->load->model('project_model');
			 $msg=$this->project_model->insertRecurring($data);
			 //Uploading the file code... Can be modified to check the file extension if required
			 $ext=end(explode('/', $_FILES['cv']['type']));
			 move_uploaded_file($_FILES['cv']["tmp_name"],"upload/" . $_POST['WorkOrderNumber'].'_cv_'.$_POST['RA_id'].'.'.$ext);
			 $ext=end(explode('/', $_FILES['apt_ltr']['type']));
			 move_uploaded_file($_FILES['apt_ltr']['tmp_name'],"upload/" . $_POST['WorkOrderNumber'].'_apt_ltr_'.str_replace(" ","_",$_POST['RA_id']).'.'.$ext);
			 
			// echo "Stored in: " . "upload/" . $_FILES["cv"]["name"];
			 require('showMsg.php');
			 $showMsg=new showMsg();
			 $showMsg->index($msg,'faculty');
			}			

}