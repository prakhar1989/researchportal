<?PHP

class FacultyProjRequest extends CI_Controller {
	
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
				//echo $ProjectID;
				//Load the project model
				$this->load->model('project_model');
				$result= $this->project_model->projectSearchByID($ProjectID);
				//echo '<p> hello this is the Project Details Page </p>';
				// Display the results
				echo'
					<FORM METHOD=POST ACTION="#">
					<p><br><br></p>
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							';
					if ($_POST['RequestType'] == 'Request For Extension')
						{
						$ExtensionPeriod = $_POST['hidden1'];
						//echo $ExtensionPeriod;
						if(strlen(trim($_POST['comment']))!=0)
						{
							$msg = $this->project_model->projectExtension($ProjectID,$ExtensionPeriod);
							$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), 'faculty_extension');
						echo "\n\n";
						echo $msg;
						}
						
						} 
					else if ($_POST['RequestType'] == 'Request For Project Closure') 
						{
							//echo 'Project Completed Page';
							/*$this->load->database();
							$this->load->model('project_model');
							$Path = "upload/".$ProjectID."_";
							$Files = glob($Path."*.*");
							$countuploaded = 0;
							foreach ($Files as $File)
								{
								$countuploaded++;			
								echo'<a href="download?file='.$File.'">'.$File.'</a>';
								echo '<br>';
								}
							echo 'Number of Deliverables uploaded: '.$countuploaded;
							$queryStr='Select * from project where ProjectId = "'.$ProjectID.'";';
							$query = $this->db->query($queryStr);
							$countpromised = 0;
							foreach($query->result() as $row)
								{
								$countpromised = $countpromised + $row->Deliverables;
								$countpromised = $countpromised + $row->cases;
								$countpromised = $countpromised + $row->journals;
								$countpromised = $countpromised + $row->chapters;
								$countpromised = $countpromised + $row->conference;
								$countpromised = $countpromised + $row->paper;
								$countpromised = $countpromised + $row->books;
								}
							echo '<br>Number of Deliverables promised: '.$countpromised;*/
							$Check = $_POST['hidden2'];
							echo '<br><br>';
							
							If ($Check)
							{
							If ($countpromised > $countuploaded)
								{
								for ($i=1; $i <= ($countpromised - $countuploaded); $i++)
									{
									echo '<br><input type="file" name="file_desc_'.$i.'" id="file_desc_'.$i.'" />';
									}
								echo'<input type="hidden" name="i" value="'.$i.'" />
								<br><input type="SUBMIT" value="Apply" class="btn btn-large btn-primary "></input>';
								}
								 
							}
							
							echo "\n\n";
								
							$msg = $this->project_model->projectCompletion($ProjectID);
							$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), 'faculty_completed');
							echo "\n\n";
							echo $msg;
						}
					else if($_POST['RequestType'] == 'View Detailed Budget')
						{
												 $data['query']= $this->project_model->getAccount($ProjectID);

							echo '<h1>Account Details</h1>
							<table class="table table-bordered">
						<tr><TD><h4>Date</h4></TD><TD><h4>Research Assistance</h4></TD><TD><h4>Research Collaboration Expense</h4></TD><TD><h4>Payment to Investigators</h4></TD><TD><h4>Travel & Accommodation</h4></TD><TD><h4>Communication Cost</TD><TD><h4>Hardware/Software/Data Costs</h1></TD><TD><h4>Research Dissemination</h1></TD><TD><h4>Contingency</h1></TD></tr>
						
						<tbody>';
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
	
	}


?>