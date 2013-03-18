<?php

class AddAccount extends CI_Controller {

				function index()
				{
					$data['myClass']=$this;
					$data['action']=0;
					session_start();
					//$this->load->view('layout',$data);
					if($_SESSION['usertype']==1){
						$this->load->view('layout',$data);
					} elseif ($_SESSION['usertype']==2){
						$this->load->view('layoutComm',$data);
					} elseif($_SESSION['usertype']==3){
						$this->load->view('layoutChairman',$data);
					}
					else{
			echo 'hello';
			header("location:login");
			}
				}

				function load_php()
				{
					 
					 $this->load->model('project_model');
					 $Project=$_POST['projectID'];
					 $account= $this->project_model->getAccStatus($Project);
					 //echo "Alotted Budget".$account['grant'];
					 $account['left']=$account['grant']-$account['spent'];	
					echo'<table class="table table-bordered">
					<thead>
						<tr>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Amount Granted</td><td>'.$account['grant'].'</td><td>Amount Spent</td><td>'.$account['spent'].'<td>Amount Left</td><td>'.$account['left'].'</td>
					</table>';
							
					 
					 if($account['left']>0)
					 {
						 echo '
						 <h1>Work Order Number '. $Project.'</h1>';
						 
						 echo '
					<p>Please enter the amounts in the Expense heads below</p>
					<form method=POST action="AddAccount/insert" ><table class="table table-bordered">
					<thead>
						<tr>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Investigators</td>
							<td><input type="text" class="large" name="Investigators"></input></td>
						</tr>
						<tr>
							<td>TravelAcco</td>
							<td><input type="text" class="large" name="TravelAcco"></input></td>
						</tr>
						<tr>
							<td>Communication</td>
							<td><input type="text" class="large" name="Communication"></input></td>
						</tr>
						<tr>
							<td>ITCosts</td>
							<td><input type="text" class="large" name="ITCosts"></input></td>
						<tr>
							<td>Domestic Travel</td>
							<td><input type="text" class="large" name="Domestic"></input></td>
						</tr>
						<tr>
							<td>Local Conveyance</td>
							<td><input type="text" class="large" name="Conveyance"></input></td>
						</tr>
						<tr>
							<td>Accomodation</td>
							<td><input type="text" class="large" name="Accomodation"></input></td>
						</tr>
						<tr>
							<td>Contingency</td>
							<td><input type="text" class="large" name="Contingency"></input></td>
						</tr>
						<tr>
							<td>Software</td>
							<td><input type="text" class="large" name="Software"></input></td>
						</tr>
						<tr>
							<td>Research Dessimination</td>
							<td><input type="text" class="large" name="Dessimination"></input></td>
						</tr>
					</tbody>
					</table>

					<input type="submit" value"Submit" class="btn btn-large btn-primary"></input><input type="hidden" name=projectID value="'.$Project.'"></form>';
									
					}
				    else 
					 {
						echo '<h3>You cant apply any more projects as of now</h3>';
					 }
				 
				 
				 
				}
			//function to insert the data into project table
			
			function insert()
			{
			 //echo 'The value of Project category is: '.$_POST['category'];
			 $data['projectid']=$_POST['projectID'];
			 $data['RCE']=$_POST['RCE'];
			 $data['Investigators']=$_POST['Investigators'];
			 $data['TravelAcco']=$_POST['TravelAcco'];
			 $data['Communication']=$_POST['Communication'];
			 $data['ITCosts']=$_POST['ITCosts'];
			 $data['Dissemination']=$_POST['Dissemination'];
			 $data['Contingency']=$_POST['Contingency'];
			 //$data['']=$_POST[''];
			 $this->load->model('project_model');
			 $msg=$this->project_model->insertAccount($data);
			 require('showMsg.php');
			 $showMsg=new showMsg();
			 $showMsg->index($msg,'admin');
			}			

}