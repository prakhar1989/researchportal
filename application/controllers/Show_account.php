<?php

class Show_account extends CI_Controller {

				function index()
				{
					session_start();
					$data['myClass']=$this;
					$data['action']=0;
					$this->load->view('layout',$data);
					
				}

				function load_php()
				{
					 
					 
					 $this->load->model('project_model');
					 //1.get the account details of the project
					 $Project = $this->input->post('Choice1');
					 if($_POST['Action']=='View Account Details')
					 {
						 $data['query']= $this->project_model->getAccount($Project);
						 //added date below--vridhi
						 
						 echo '
						 <FORM METHOD=POST ACTION="AddAccount">
						 <TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
						 <h1>Account Details</h1>
							<table class="table table-bordered">
						<tr><TD><h4>Date</h4></TD><TD><h4>ProjectId</h4></TD><TD><h4>Dataset</h4></TD><TD><h4>Communication</h4></TD><TD><h4>Field</h4></TD><TD><h4>Photocopying</h4></TD><TD><h4>Stationery</TD><TD><h4>Domestictravel</h1></TD><TD><h4>Localconveyance</h1></TD><TD><h4>Accomodation</h1></TD><TD><h4>Contingency</h1></TD><TD><h4>Software</h1></TD><TD><h4>Research Dessimination</h1></TD><TD><h4>Recurring</h1></TD></tr>
						
						<tbody>';
						
						 foreach($data['query'] as $row)
						 {
							 
							 echo '<TR><TD>';
							 print $row->Date;//vridhi
							 echo '</TD><TD>';
							  print $row->ProjectId;
							 echo '</TD><TD>';
							 print $row->dataset;
							 echo '</TD><TD>';
							 print $row->communication;
							 echo '</TD><TD>';
							 print $row->field;
							 echo '</TD><TD>';
							 print $row->photocopying;
							 echo '</TD><TD>';
							 print $row->stationery;
							 echo '</TD><TD>';
							 print $row->domestictravel;
							 echo '</TD><TD>';
							 print $row->localconveyance;
							 echo '</TD><TD>';
							 print $row->accomodation;
							 echo '</TD><TD>';
							 print $row->contingency;
							 echo '</TD><TD>';
							 print $row->software;
							 echo '</TD><TD>';
							 print $row->dessimination;
							 echo '</TD><TD>';
							 print $row->recurring;
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