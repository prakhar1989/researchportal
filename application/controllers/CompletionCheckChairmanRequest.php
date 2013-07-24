<?PHP

class CompletionCheckChairmanRequest extends CI_Controller 
{
	function index()
		{			
		$data['myClass']=$this;
		$data['action']=0;
		session_start();
			if($_SESSION['usertype']==1){
				$this->load->view('layout',$data);
			} elseif ($_SESSION['usertype']==2){
				$this->load->view('layoutComm',$data);
			} elseif($_SESSION['usertype']==3){
				$this->load->view('layoutChairman',$data);
			}
			else{
			
			header("location:login");
			}
			}
	function load_php()
				{
				$ProjectID = $_POST['ProjectSelected'];
				$this->load->model('project_model');
				//session_start();
				echo'
					<FORM METHOD=POST ACTION="#">
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							';
					if ($_POST['RequestType'] == 'Approve')
						{
						$this->project_model->projectCompletionChairmanResponse('Approve',$ProjectID);
						$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), "chairman_approve_completion");
						header("Location: /rp/Completion_chairman");
						} 
					else if ($_POST['RequestType'] == 'Reject') 
						{
						$this->project_model->projectCompletionChairmanResponse('Reject',$ProjectID);
						$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), "chairman_reject_completion");
						header("Location: /rp/Completion_chairman");
						}
					else if ($_POST['RequestType'] == 'Send For Revision') 
						{
						$to = "nikhil.labh@gmail.com";
						$subject = "Project Application Sent for Revision";
						$message = "Hello,
						Chairman has sent your project application for Revision.";
						$from = "fpoffice@iimcal.ac.in";
						$headers = "From:" . $from;
						$stat = mail($to,$subject,$message,$headers);
						$this->project_model->projectCompletionChairmanResponse('Send For Revision',$ProjectID);
						$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), "chairman_consult_extension");
						header("Location: /rp/Completion_chairman");
						}
					else if ($_POST['RequestType'] == 'Check Deliverables') 
						{
						echo '<br><h1>Deliverables Uploaded</h1> <TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
					 <table class="table table-bordered">
					<tr><TD><h4>Download File</h4></TD><TD><h4>Citations (If Any)</h4></TD></TR>';
						$Path = "upload/".$ProjectID."_";
						//$Path = "upload/".$ProjectID."_";
						$Files = glob($Path."*.*");
						$countuploaded = 0;
						foreach ($Files as $File)
							{
							//echo $File;
							//$Files=(explode('.', $File));
							$countuploaded++;			
							echo'<tr><td><a href="download?file='.$File.'">'.$File.'</a><br></td><td>';
							$tempFile=explode('/',$File);
							$res = $this->project_model->getCitationByFile($tempFile[1],$ProjectID);
							foreach($res->result() as $row)
							{
								echo '<p>';
								print $row->citation_text;
								echo '</p>';
							}
							echo '</td></tr>';
							}
							echo '</table>';
						echo 'Number of Deliverables uploaded: '.$countuploaded;
						$query = $this->project_model->projectSearchById($ProjectID);
						$countpromised = 0;
						foreach($query->result() as $row)
							{
							$countpromised = $countpromised + $row->Deliverables;
							$countpromised = $countpromised + $row->cases;
							$countpromised = $countpromised + $row->journals;
							$countpromised = $countpromised + $row->chapters;
							$countpromised = $countpromised + $row->conference;
							$countpromised = $countpromised + $row->paper;
							}
						echo '<br>Number of Deliverables promised: '.$countpromised;
						}
					echo "\n\n";
					 echo '</TABLE>
					</FORM>';
                
				
				}
	
	}
?>