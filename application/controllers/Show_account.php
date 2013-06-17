<?php

class Show_account extends CI_Controller {

				function index()
				{
					session_start();
					$data['myClass']=$this;
					$data['action']=0;
					//session_start();
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
					 //1.get the account details of the project
					 $Project = $this->input->post('Choice1');
					 if($_POST['Action']=='View Account Details')
					 {
						 
						 $data['query']= $this->project_model->getAccountBudget($Project);
						 
						 echo '
						 <FORM METHOD=POST ACTION="EditAccount">
						 <TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
						 <h1>Budget Details</h1>
						<table class="table table-bordered">
						
						<tr><TD><h4>Research Assistance</h4></TD><TD><h4>Research Collaboration Expense</h4></TD><TD><h4>Payment to Investigators</h4></TD><TD><h4>Travel & Accommodation</h4></TD><TD><h4>Communication Cost</TD><TD><h4>Hardware/Software/Data Costs</h1></TD><TD><h4>Research Dissemination</h1></TD><TD><h4>Contingency</h1></TD><td><h4>Total Grant</h4></td></tr>						 
						 <tbody>';
						 foreach($data['query'] as $row)
						 {
							 
							 echo '<TR><TD>';
							 print $row->ResearchAssistanceBudget;
							 echo '</TD><TD>';
							 print $row->RCEBudget;
							 echo '</TD><TD>';
							 print $row->InvestigatorsBudget;
							 echo '</TD><TD>';
							 print $row->TravelAccoBudget;
							 echo '</TD><TD>';
							 print $row->CommunicationBudget;
							 echo '</TD><TD>';
							 print $row->ITCostsBudget;
							 echo '</TD><TD>';
							 print $row->DisseminationBudget;
							 echo '</TD><TD>';
							 print $row->ContingencyBudget;
							 echo '</TD><TD>';
							 print $row->ProjectGrant;
							 echo '</TD></TR>';
							 
						 }
						 echo'
						 </tbody>
						 </table>
						 <input type= submit value= "Edit Budget" name="editBudget"><input type="hidden" name=projectID value="'.$Project.' " >
						 </form>
						 <form method =post action="AddAccount">
						 <h1>Account Details</h1>
							<table class="table table-bordered">
						<tr><TD><h4>Date</h4></TD><TD><h4>Research Assistance</h4></TD><TD><h4>Research Collaboration Expense</h4></TD><TD><h4>Payment to Investigators</h4></TD><TD><h4>Travel & Accommodation</h4></TD><TD><h4>Communication Cost</TD><TD><h4>Hardware/Software/Data Costs</h1></TD><TD><h4>Research Dissemination</h1></TD><TD><h4>Contingency</h1></TD></tr>
						
						<tbody>';
						$ResearchAssistanceTotal=$this->project_model->getAccountHead($Project,'ResearchAssistance');
						$RCETotal=$this->project_model->getAccountHead($Project,'RCE');
						$InvestigatorsTotal=$this->project_model->getAccountHead($Project,'Investigators');
						$TravelAccoTotal=$this->project_model->getAccountHead($Project,'TravelAcco');
						$CommunicationTotal=$this->project_model->getAccountHead($Project,'Communication');
						$ITCostsTotal=$this->project_model->getAccountHead($Project,'ITCosts');
						$DisseminationTotal=$this->project_model->getAccountHead($Project,'Dissemination');
						$ContingencyTotal=$this->project_model->getAccountHead($Project,'Contingency');

						echo '<tr><td><h4>Total Consumed</h4></td><td>'.$ResearchAssistanceTotal.'</td>';
						echo '<td>'.$RCETotal.'</td>';
						echo '<td>'.$InvestigatorsTotal.'</td>';
						echo '<td>'.$TravelAccoTotal.'</td>';
						echo '<td>'.$CommunicationTotal.'</td>';
						echo '<td>'.$ITCostsTotal.'</td>';
						echo '<td>'.$DisseminationTotal.'</td>';
						echo '<td>'.$ContingencyTotal.'</td>';
						echo '</tr>';
						
						echo '<tr><td><h4>Total Left</h4></td><td>'.($row->ResearchAssistanceBudget-$ResearchAssistanceTotal).'</td>';
						echo '<td>'.($row->RCEBudget-$RCETotal).'</td>';
						echo '<td>'.($row->InvestigatorsBudget-$InvestigatorsTotal).'</td>';
						echo '<td>'.($row->TravelAccoBudget-$TravelAccoTotal).'</td>';
						echo '<td>'.($row->CommunicationBudget-$CommunicationTotal).'</td>';
						echo '<td>'.($row->ITCostsBudget-$ITCostsTotal).'</td>';
						echo '<td>'.($row->DisseminationBudget-$DisseminationTotal).'</td>';
						echo '<td>'.($row->ContingencyBudget-$ContingencyTotal).'</td>';
						echo '</tr>';
						$data['query']= $this->project_model->getAccount($Project);
						
						 foreach($data['query'] as $row)
						 {
							 
							 echo '<TR><TD>';
							 print $row->Date;//vridhi
							 echo '</TD><TD>';
							 print $row->ResearchAssistance;
							 echo '</TD><TD>';
							 print $row->RCE;
							 echo '</TD><TD>';
							 print $row->Investigators;
							 echo '</TD><TD>';
							 print $row->TravelAcco;
							 echo '</TD><TD>';
							 print $row->Communication;
							 echo '</TD><TD>';
							 print $row->ITCosts;
							 echo '</TD><TD>';
							 print $row->Dissemination;
							 echo '</TD><TD>';
							 print $row->Contingency;
							 echo '</TD></TR>';
							 
						 }
										 
						 echo '</tbody>
						 </TABLE>
						 <input type= submit value= "ADD" name="add"><input type="hidden" name=projectID value="'.$Project.' " >
						</FORM>';
					}
					else{
						$Result= $this->project_model->addRecurring($Project);
						echo'<h4>The Recurring amount added for the project</h4>';
					}
				
				 
				 
				 
				}

}


?>