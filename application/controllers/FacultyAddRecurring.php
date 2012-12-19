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
							<td>Project ID</td>
							<td><input type="text" class="large" name="ProjectId"></input></td>
						</tr>
						<tr>
							<td>Research Assistant ID</td>
							<td><input type="text" class="large" name="RA_id"></input></td>
						</tr>
						<tr>
							<td>Recurring Amount</td>
							<td><input type="text" class="large" name="recurring_amt"></input></td>
						</tr>
						<tr>
							<td>Number of payments</td>
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
							<td>Day of recurring payment (Enter values 1-31)</td>
							<td><input type="text" class="large" name="Day_payment"></input></td>
						</tr>
						<tr>
							<td>Upload CV</td>
							<td><input type="file" name="cv" id="cv" ></td>
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
			 $data['ProjectId']=$_POST['ProjectId'];
			 $data['recurring_amt']=$_POST['recurring_amt'];
			 $data['Userid']=$_SESSION['username'];
			 $data['Account_Details']=$_POST['Account_details'];
			 $data['Payment_Procedure']=$_POST['Payment_Procedure'];
			 $data['No_Payments']=$_POST['No_payments'];
			 $data['researcher_id']=$_POST['RA_id'];
			 $data['Day_payment']=$_POST['Day_payment'];
			 $this->load->model('project_model');
			 $msg=$this->project_model->insertRecurring($data);
			 //Uploading the file code... Can be modified to check the file extension if required
			 $ext=end(explode('/', $_FILES['cv']['type']));
			 move_uploaded_file($_FILES['cv']["tmp_name"],"upload/" . $_POST['ProjectId'].'_cv_'.$_POST['RA_id'].'.'.$ext);
			// echo "Stored in: " . "upload/" . $_FILES["cv"]["name"];
			 require('showMsg.php');
			 $showMsg=new showMsg();
			 $showMsg->index($msg,'faculty');
			}			

}