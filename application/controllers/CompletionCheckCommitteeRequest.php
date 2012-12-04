<?PHP

class CompletionCheckCommitteeRequest extends CI_Controller 
{
	function index()
		{			
		$data['myClass']=$this;
		$data['action']=0;
		$this->load->view('layoutComm',$data);
		}
	function load_php()
				{
				$ProjectID = $_POST['ProjectSelected'];
				$this->load->model('project_model');
				echo'
					<FORM METHOD=POST ACTION="#">
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							';
					if ($_POST['RequestType'] == 'Send')
						{
						$this->project_model->projectCompletionCommitteeResponse('Send',$ProjectID);
						$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), "chairman");
						header("Location: /rp/completion_committee");
						} 
					echo "\n\n";
					 echo '</TABLE>
					</FORM>';
                
				
				}
	
	}
?>