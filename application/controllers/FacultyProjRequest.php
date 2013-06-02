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
									echo '<br><input type="file" name="file_desc_'.$i.'" id="file_desc_'.$i.'" />';
									}
								echo'<input type="hidden" name="i" value="'.$i.'" />
								<br><input type="SUBMIT" value="Apply" class="btn btn-large btn-primary "></input>';
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
							$queryStr='Select * from project where ((ProjectId =\''.$_POST['ProjectChoice'].'\') AND PStatus = "completed")';
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
	
	
		function insert()
		{
		session_start();
		
			$ProjectId = $_SESSION['ProjectID'];
			$i = $_POST['i'];
			//move_uploaded_file($_FILES["element_5"]["tmp_name"],"upload/".$ProjectId.'.'.$ext);
		
			for ($j=1; $j < $i ; $j++)
				{
				$ext=end(explode('/', $_FILES['file_desc_'.$j]['type']));
				move_uploaded_file($_FILES['file_desc_'.$j]["tmp_name"],"upload/" . $ProjectId.'_'.$j.'.'.$ext);		           
				}
			$this->load->database();
			$this->load->model('project_model');
			
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