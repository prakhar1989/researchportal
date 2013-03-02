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
						}
						} 
					else if ($_POST['RequestType'] == 'Request For Project Closure') 
						{
						//echo 'Project Completed Page';
						$msg = $this->project_model->projectCompletion($ProjectID);
							$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), 'faculty_completed');
						}
					/*foreach($result->result() as $row)
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
					echo "\n\n";
					echo $msg;
					 echo '</TABLE>
					</FORM>';
                
				
				}
	
	}


?>