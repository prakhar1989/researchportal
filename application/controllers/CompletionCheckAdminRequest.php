<?PHP

class CompletionCheckAdminRequest extends CI_Controller 
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
				$this->load->database();
				$this->load->model('project_model');
				$ProjectID = $_POST['ProjectSelected'];
				//session_start();
				echo'
					<FORM METHOD=POST ACTION="#">
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							';
					if ($_POST['RequestType'] == 'Approve and Forward To Chairman')
						{
						$this->project_model->projectCompletionAdminResponse('Approve',$ProjectID);
						$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), "admin_approve_completion");
						header("Location: /rp/Completion_admin");
						} 
					else if ($_POST['RequestType'] == 'Check Deliverables') 
						{
						echo '<br><h3>Deliverables Uploaded</h3>';
						$Path = "upload/".$ProjectID."_";
						//$Path = "upload/".$ProjectID."_";
						$Files = glob($Path."*.pdf");
						$countuploaded = 0;
						foreach ($Files as $File)
							{
							//echo $File;
							//$Files=(explode('.', $File));
							$countuploaded++;			
							echo'<a href="download?file='.$File.'">'.$File.'</a><br><br>';
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
							}
						echo '<br>Number of Deliverables promised: '.$countpromised;
						}
					else if ($_POST['RequestType'] == 'Send For Revision') 
						{
						$this->project_model->projectCompletionAdminResponse('Send For Revision',$ProjectID);
						$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), "admin_reject_extension");
						header("Location: /rp/Completion_admin");
						}
					echo "\n\n";
					//echo $msg;
					 echo '</TABLE>
					</FORM>';
                
				
				}
	
	}
?>