<?php
class EditRecurring extends CI_Controller {

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
	$this->load->model('project_model');
	if($_POST['Action']=='Edit Amount')
		{
			echo 'Going to edit amount for '.$_POST['Choice'];
			echo '
						 <h1>Add Recurring Amount</h1>
					<p>Please Enter the new Recurring Amount below for the ProjectId '.$_POST['Choice'].'</p>
					<form method=POST action="EditRecurring/EditAmount" ><table class="table table-bordered">
					<thead>
						<tr>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>New Recurring Amount</td>
							<td><input type="text" class="large" name="amount"></input></td>
						</tr>
         			</tbody>
					</table>

					<input type="submit" value"Submit" class="btn btn-large btn-primary"></input><input type="hidden" name=projectId value="'.$_POST['Choice'].'"></input></form>';
			
		}
		else
		{
		    echo 'Going to add a new project into recurring';
			echo '
						 <h1>Add Project and Recurring Amount </h1>
					<form method=POST action="EditRecurring/AddProject" ><table class="table table-bordered">
					<thead>
						<tr>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>ProjectId</td>
							<td><input type="text" class="large" name="ProjectId"></input></td>
						</tr>
						<tr>
							<td>Recurring Amount</td>
							<td><input type="text" class="large" name="amount"></input></td>
						</tr>
						<tr>
							<td>Total Alloted so far</td>
							<td><input type="text" class="large" name="total"></input></td>
						</tr>
         			</tbody>
					</table>

					<input type="submit" value"Submit" class="btn btn-large btn-primary"></input></form>';
			
		}
	}
    
	//*** this will change the recurring amount for the selected project
	function EditAmount(){
	$data['myClass']=$this;
	$data['action']=2;
	
	$this->load->model('project_model');
	$Msg=$this->project_model->editAmount($_POST['projectId'],$_POST['amount']);
	$data['msg']=$Msg;
	$this->load->view('layout',$data);
	}
	
	//*** this will add a new project for the recurring consideration
	function AddProject(){
	$data['myClass']=$this;
	$data['action']=2;
	$this->load->model('project_model');
	$Msg=$this->project_model->addProject($_POST['ProjectId'],$_POST['amount'],$_POST['total']);
	$data['msg']=$Msg;
	$this->load->view('layout',$data);
	}
	
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
}	
?>
