<?php

class Conf_Add_Account extends CI_Controller {

				function index()
				{
					$data['myClass']=$this;
					$data['action']=0;
					$this->load->view('layout',$data);
				}

				function load_php()
				{
					 
					 $this->load->model('conference_model');
					 $Conference=$_POST['conferenceID'];
					 //$account= $this->conference_model->getC_AccStatus($Conference); //*** Uncomment when you have budget alloted to conferences
					 //echo "Alotted Budget".$account['grant'];
					 //$account['left']=$account['grant']-$account['spent'];	
					/* echo'<table class="table table-bordered">
					<thead>
						<tr>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Amount Granted</td><td>'.$account['grant'].'</td><td>Amount Spent</td><td>'.$account['spent'].'<td>Amount Left</td><td>'.$account['left'].'</td>
					</table>';*/
							
					 
					 //if($account['left']>0)
					 {
						 echo '
						 <h1>Conference ID '. $Conference.'</h1>';
						 
						 echo '
					<p>Please enter the amounts in the Expense heads below</p>
					<form method=POST action="AddC_Account/insert" ><table class="table table-bordered">
					<thead>
						<tr>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Registration Charges</td>
							<td><input type="text" class="large" name="registrationCharges"></input></td>
						</tr>
						<tr>
							<td>Travel</td>
							<td><input type="text" class="large" name="travel"></input></td>
						</tr>
						<tr>
							<td>Accomodation</td>
							<td><input type="text" class="large" name="stay"></input></td>
						</tr>
						<tr>
							<td>Per Diem</td>
							<td><input type="text" class="large" name="perDiem"></input></td>
						</tr>
						
					</tbody>
					</table>

					<input type="submit" value"Submit" class="btn btn-large btn-primary"></input><input type="hidden" name=conferenceID value="'.$Conference.'"></form>';
									
					}
				   /* else 
					 {
						echo '<h3>You cant apply any more conference as of now</h3>';
					 }
				 */
				 
				 
				}
			//function to insert the data into project table
			
			function insert()
			{
			 //echo 'The value of Project category is: '.$_POST['category'];
			 $data['conferenceid']=$_POST['conferenceID'];
			 $data['registrationCharges']=$_POST['registrationCharges'];
			 $data['travel']=$_POST['travel'];
			 $data['stay']=$_POST['stay'];
			 $data['perDiem']=$_POST['perDiem'];
			//$data['']=$_POST[''];
			 $this->load->model('conference_model');
			 $msg=$this->conference_model->insertC_Account($data);
			 require('showMsg.php');
			 $showMsg=new showMsg();
			 $showMsg->index($msg,'admin');
			}			

}