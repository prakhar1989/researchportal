<?PHP

class FacultyProjRequest extends CI_Controller 
	{
	
	function index()
		{
		
		$data['myClass']=$this;
		$data['action']=0;
		session_start();
		if($_SESSION['usertype']==4){
		$this->load->view('layoutFaculty',$data);
		} 
		else{
		header("location:login");
		}}
	function load_php()
				{
				$ProjectID = $_POST['ProjectSelected'];
				$_SESSION['ProjectID'] = $_POST['ProjectSelected'];
				//echo $ProjectID;
				//Load the project model
				$this->load->model('project_model');
				$result= $this->project_model->projectSearchByID($ProjectID);
				//echo '<p> hello this is the Project Details Page </p>';
				// Display the results
				echo'
					<FORM method=POST action="FacultyProjRequest/insert"  enctype="multipart/form-data">
					<p><br><br></p>
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							';
					if ($_POST['RequestType'] == "Request For Extension")
						{
						
						$ExtensionPeriod = $_POST['hidden1'];
						echo $ExtensionPeriod;
						if($ExtensionPeriod!=0){
						//header("location:/rp/FacultyProjShowDetails?ProjectSelected=".$ProjectID);
						//echo $ExtensionPeriod;
						//if(strlen(trim($_POST['comment']))!=0)
						//{
						$msg = $this->project_model->projectExtension($ProjectID,$ExtensionPeriod);
							$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), 'faculty_extension');
						echo "\n\n";
						//echo "Extension";
						echo $msg;
						//}
						}
						else
						{
						//Redirect to FacultyProjShowDetails with projectID
						}
						} 
					else if ($_POST['RequestType'] == 'Request For Project Closure') 
						{
							$Check = $_POST['hidden2'];
							$countpromised = $_POST['countpromised'];
							$countuploaded = $_POST['countuploaded'];
							echo '<br><br>';
							
							If ($Check == 'true')
							{
							If ($countpromised > $countuploaded)
								{
								
								for ($i=1; $i <= ($countpromised - $countuploaded); $i++)
									{
									$filename = $countuploaded + $i;
									echo '<input type="file" name="file_desc_'.$filename.'" id="file_desc_'.$filename.'" />';
									echo'<input type="hidden" name="fileDesc_'.$filename.'" value="file_desc_'.$filename.'" />';
									echo '<input type="text" name="citation'.$filename.'" placeholder="Citation" >';
									echo '<br>';
									
									}
								 	
								echo'<input type="hidden" name="i" value="'.$i.'" />
								<input type="hidden" name="countuploaded" value="'.$countuploaded.'" />
								<br>
								<tr><input type="SUBMIT" value="Apply" class="btn btn-large btn-primary "></input></tr>';
								}
							}
							else if ($Check == 'false')
							{
							$msg = $this->project_model->projectCompletion($ProjectID);
							$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), 'faculty_completed');
							echo "\n\n";
							echo $msg;	
							}
							
							echo "\n\n";
						}
					else if ($_POST['RequestType'] == 'Check Deliverables') 
						{
							//echo '<br><hr size=10 noshade color="#333333"><h3>Files Uploaded</h3>';
							$queryStr='Select * from project where ((ProjectId =\''.$ProjectID.'\') AND PStatus = "completed")';
							$query = $this->db->query($queryStr);
							If ($query->num_rows() == 0)
							{//echo 'No deliverables for this project are Complete as of today.';
							}
							Else
							{
								foreach ($query->result() as $row)
								{
								echo 'Project Title: '.$row->ProjectTitle;
								echo '<br>';
								$Path = "upload/".$row->ProjectId."_";
								$Files = glob($Path."*.pdf");
								foreach ($Files as $File)
									{	
									echo'<a href="download?file='.$File.'">'.$File.'</a><br><br>';
									echo '<br>';
									}
							echo '<br><br>';
								}
							}
						}	
					else if($_POST['RequestType'] == 'View Detailed Budget')
						{
						
						$data['query']= $this->project_model->getAccountBudget($ProjectID);
						 
						 echo '<h1>Budget Details</h1>
						<table class="table table-bordered">
						<tr><TD><h4>Research Assistance</h4></TD><TD><h4>Research Collaboration Expense</h4></TD><TD><h4>Payment to Investigators</h4></TD><TD><h4>Travel & Accommodation</h4></TD><TD><h4>Communication Cost</h4></TD><TD><h4>Hardware/Software/Data Costs</h4></TD><TD><h4>Research Dissemination</h4></TD><TD><h4>Contingency</h4></TD><TD><h4>Overhead Charges</h4></tr>						 
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
							 print $row->OverheadChargesBudget;
							 echo '</TD></TR>';
							 
						 }
						 echo'
						 </tbody>
						 </table>
						 ';
						 
						echo '<hr size=10 noshade color="#333333">'; 
			echo '<h1>Account Details</h1>
							<table class="table table-bordered">
						<tr><TD><h4>Date</h4></TD><TD><h4>Research Assistance</h4></TD><TD><h4>Research Collaboration Expense</h4></TD><TD><h4>Payment to Investigators</h4></TD><TD><h4>Travel & Accommodation</h4></TD><TD><h4>Communication Cost</TD><TD><h4>Hardware/Software/Data Costs</h1></TD><TD><h4>Research Dissemination</h1></TD><TD><h4>Contingency</h1></TD><TD><h4>Overhead Charges</h4></TD></tr>
						
						<tbody>';
			$ResearchAssistanceTotal=$this->project_model->getAccountHead($ProjectID,'ResearchAssistance');
						$RCETotal=$this->project_model->getAccountHead($ProjectID,'RCE');
						$InvestigatorsTotal=$this->project_model->getAccountHead($ProjectID,'Investigators');
						$TravelAccoTotal=$this->project_model->getAccountHead($ProjectID,'TravelAcco');
						$CommunicationTotal=$this->project_model->getAccountHead($ProjectID,'Communication');
						$ITCostsTotal=$this->project_model->getAccountHead($ProjectID,'ITCosts');
						$DisseminationTotal=$this->project_model->getAccountHead($ProjectID,'Dissemination');
						$ContingencyTotal=$this->project_model->getAccountHead($ProjectID,'Contingency');
						$OverheadChargesTotal=$this->project_model->getAccountHead($ProjectID,'OverheadCharges');

						echo '<tr><td><h4>Total Consumed</h4></td><td>'.$ResearchAssistanceTotal.'</td>';
						echo '<td>'.$RCETotal.'</td>';
						echo '<td>'.$InvestigatorsTotal.'</td>';
						echo '<td>'.$TravelAccoTotal.'</td>';
						echo '<td>'.$CommunicationTotal.'</td>';
						echo '<td>'.$ITCostsTotal.'</td>';
						echo '<td>'.$DisseminationTotal.'</td>';
						echo '<td>'.$ContingencyTotal.'</td>';
						echo '<td>'.$OverheadChargesTotal.'</td>';
						echo '</tr>';
						
						echo '<tr><td><h4>Total Left</h4></td><td>'.($row->ResearchAssistanceBudget-$ResearchAssistanceTotal).'</td>';
						echo '<td>'.($row->RCEBudget-$RCETotal).'</td>';
						echo '<td>'.($row->InvestigatorsBudget-$InvestigatorsTotal).'</td>';
						echo '<td>'.($row->TravelAccoBudget-$TravelAccoTotal).'</td>';
						echo '<td>'.($row->CommunicationBudget-$CommunicationTotal).'</td>';
						echo '<td>'.($row->ITCostsBudget-$ITCostsTotal).'</td>';
						echo '<td>'.($row->DisseminationBudget-$DisseminationTotal).'</td>';
						echo '<td>'.($row->ContingencyBudget-$ContingencyTotal).'</td>';
						echo '<td>'.($row->OverheadChargesBudget-$OverheadChargesTotal).'</td>';
						echo '</tr>';
						
						$data['query']= $this->project_model->getAccount($ProjectID);
						
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
							 echo '</TD><TD>';
							 print $row->OverheadCharges;
							 echo '</TD></TR>';
							 
						 }
										 
						 echo '</tbody>
						 </TABLE>';
						}
					/* foreach($result->result() as $row)
						{
						echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->App_Date;
						 echo '</TD><TD>';
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Researcher3;
						 echo '</TD><TD>';
						 echo '<TD><INPUT TYPE="RADIO" NAME="ProjectChoice" VALUE="'.$row->ProjectId.'"></TD></TR>';
						}			*/ 
					//echo "\n\n";
					//echo $msg;
					 echo '</TABLE>
					</FORM>';
                
				
				}
	
		
		
		function insert()
		{
		session_start();
		
			$ProjectId = $_SESSION['ProjectID'];
			$i = $_POST['i'];
			$countuploaded = $_POST['countuploaded'];
			//move_uploaded_file($_FILES["element_5"]["tmp_name"],"upload/".$ProjectId.'.'.$ext);
			$data['projectID'] = $ProjectId;
			//$data['count'] = $i;
			for ($j=($countuploaded + 1); $j < ($i + $countuploaded); $j++)
				{
				$ext=end(explode('/', $_FILES['file_desc_'.$j]['type']));
				move_uploaded_file($_FILES['file_desc_'.$j]["tmp_name"],"upload/" . $ProjectId.'_'.$j.'.'.$ext);		           
				$data['filename'.$j] = ''.$ProjectId.'_'.$j.'.'.$ext;
				$data['citation'.$j] = $_POST['citation'.$j];
				$data['fileDesc_'.$j] = $_POST['fileDesc_'.$j];
			}
			$data['count'] = $i;
			$data['countuploaded'] = $countuploaded;
			$this->load->database();
			$this->load->model('project_model');
			$msg1 = $this->project_model->addCitation($data);
			$msg = $this->project_model->projectCompletion($ProjectId);
			//$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectId, addslashes(trim($_POST['comment'])), 'faculty_completed');
			echo "\n\n";


			//echo $msg;
			require('showMsg.php');
			$showMsg=new showMsg();
			$showMsg->index($msg,'faculty');
			//echo $msg;
			//header("Location: /rp/FacultyProjOngoing");


		}
	}

?>