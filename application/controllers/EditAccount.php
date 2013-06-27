<?php

class EditAccount extends CI_Controller {

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
					$Project = $_POST['projectID'];
					if($_POST['editBudget']=='Edit Budget')
					 {
						 $data['query']= $this->project_model->getAccountBudget($Project);
					}
					
					echo '
					<h1>Edit Budget</h1>
					 
					<form name="application" id="commentForm" method=POST action="EditAccount/insert"  enctype="multipart/form-data">
					<table class="table table-bordered">
					<tbody>';
						foreach($data['query'] as $row)
						 {
						echo '<TR><TD>Research Assistance Budget</TD><TD><input type="text" class="large" value="'.$row->ResearchAssistanceBudget.'" name="ResearchAssistanceBudget"  /></td></TR>
							<TR><TD>RCE Budget</TD><TD><input type="text" class="large" value="'.$row->RCEBudget.'" name="RCEBudget"  /></td></TR>
							<TR><TD>Investigators Budget</TD><TD><input type="text" class="large" value="'.$row->InvestigatorsBudget.'" name="InvestigatorsBudget"  /></td></TR>						
							<TR><TD>Travel Acco Budget</TD><TD><input type="text" class="large" value="'.$row->TravelAccoBudget.'" name="TravelAccoBudget"  /></td></TR>
							<TR><TD>Communication Budget</TD><TD><input type="text" class="large" value="'.$row->CommunicationBudget.'" name="CommunicationBudget"  /></td></TR>
							<TR><TD>IT Costs Budget</TD><TD><input type="text" class="large" value="'.$row->ITCostsBudget.'" name="ITCostsBudget"  /></td></TR>
							<TR><TD>Dissemination Budget</TD><TD><input type="text" class="large" value="'.$row->DisseminationBudget.'" name="DisseminationBudget"  /></td></TR>
							<TR><TD>Contingency Budget</TD><TD><input type="text" class="large" value="'.$row->ContingencyBudget.'" name="ContingencyBudget"  /></td></TR>
						
							<TR><TD>Overhead Charges Budget</TD><TD><input type="text" class="large" value="'.$row->OverheadChargesBudget.'" name="OverheadChargesBudget"  /></td></TR>
';
						}	 
						
						  
						
						echo '
							
					</tbody>
					</table>

					<input type="submit" value="Submit" class="btn btn-large btn-primary"></input><input type="hidden" name=projectID value="'.$Project.'"></form>
				
					
					
					';	
					
					
				 
				 
				 
				}
			//function to insert the data into project table
			
			function insert()
			{
			 session_start();
			 $data['projectid']=$_POST['projectID'];
			 $data['RA']=$_POST['ResearchAssistanceBudget'];
			 $data['RCE']=$_POST['RCEBudget'];
			 $data['Investigators']=$_POST['InvestigatorsBudget'];
			 $data['TravelAcco']=$_POST['TravelAccoBudget'];
			 $data['Communication']=$_POST['CommunicationBudget'];
			 $data['ITCosts']=$_POST['ITCostsBudget'];
			 $data['Dissemination']=$_POST['DisseminationBudget'];
			 $data['Contingency']=$_POST['ContingencyBudget'];
			 $data['OverheadCharges']=$_POST['OverheadChargesBudget'];
			 
			 //$data['title']=$_POST['title'];
			 //$data['desc']=$_POST['desc'];
			 
			$this->load->model('project_model');
			$this->project_model->editBudget($data);
			 
			
			
			 $msg='Budget has been updated';
			 require('showMsg.php');
			 $showMsg=new showMsg();
			 $showMsg->index($msg,'admin');
			}			

}


?>