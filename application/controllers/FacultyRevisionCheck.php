<?PHP

class FacultyRevisionCheck extends CI_Controller 
{
	function index()
		{			
		$data['myClass']=$this;
		$data['action']=0;
		$this->load->view('layoutfaculty',$data);
		}
	function load_php()
				{
				$this->load->model('project_model');
				session_start();
				$_SESSION['ProjectID'] = $_POST['ProjectSelected'];
				echo'
					<FORM METHOD=POST ACTION="#">
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							';
					if ($_POST['RequestType'] == 'Edit New Application')
						{
						header("Location: /rp/FacultyReviseApp");
						} 
					else if ($_POST['RequestType'] == 'Edit Extension') 
						{
						header("Location: /rp/FacultyRevExt");
						}
					else if ($_POST['RequestType'] == 'Edit Completion') 
						{
						//$this->project_model->projectCompletionChairmanResponse('Send For Revision',$ProjectID);
						//$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), "chairman_consult_extension");
						//header("Location: /rp/extension_chairman");
						}
					echo "\n\n";
					 echo '</TABLE>
					</FORM>';
                
				
				}
	
	}
?>