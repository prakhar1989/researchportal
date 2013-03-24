<?PHP

class ExtensionCheckAdminRequest extends CI_Controller 
{
	function index()
		{			
		$data['myClass']=$this;
		$data['action']=0;
		$this->load->view('layout',$data);
		}
	function load_php()
				{
				$ProjectID = $_POST['ProjectSelected'];
				$this->load->model('project_model');
				session_start();
				echo'
					<FORM METHOD=POST ACTION="#">
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							';
					if ($_POST['RequestType'] == 'Approve and Forward To Chairman')
						{
						$this->project_model->projectExtensionAdminResponse('Approve',$ProjectID);
						$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), "admin_approve_extension");
						header("Location: /rp/extension");
						}
					else if ($_POST['RequestType'] == 'Check Deliverables') 
						{
						$this->load->database();
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
						//echo '<br><br><INPUT TYPE=SUBMIT name ="RequestType" value="Back" onclick="myFunction();return false">';
						}
					else if ($_POST['RequestType'] == 'Send For Revision') 
						{
						$this->project_model->projectExtensionAdminResponse('Send For Revision',$ProjectID);
						$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), "admin_reject_extension");
						header("Location: /rp/extension");
						}
					echo "\n\n";
					//echo $msg;
					 echo '</TABLE>
					</FORM>';
                
				
				}
	
	}
?>

<script language=”javascript” type=”text/javascript”>
function myFunction()
{
alert(”back”);
window.history.back(-1);
}
</script>