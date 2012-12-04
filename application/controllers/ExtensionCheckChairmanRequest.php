<?PHP

class ExtensionCheckChairmanRequest extends CI_Controller 
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
					if ($_POST['RequestType'] == 'Approve')
						{
						$this->project_model->projectExtensionChairmanResponse('Approve',$ProjectID);
						$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), "chairman_approve_extension");
						header("Location: /rp/extension_chairman");
						} 
					else if ($_POST['RequestType'] == 'Reject') 
						{
						$this->project_model->projectExtensionChairmanResponse('Reject',$ProjectID);
						$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), "chairman_reject_extension");
						header("Location: /rp/extension_chairman");
						}
					else if ($_POST['RequestType'] == 'Consult Committee') 
						{
						$this->project_model->projectExtensionChairmanResponse('Consult Committee',$ProjectID);
						$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), "chairman_consult_extension");
						header("Location: /rp/extension_chairman");
						}
					echo "\n\n";
					 echo '</TABLE>
					</FORM>';
                
				
				}
	
	}
?>