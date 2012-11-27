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
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							';
					if ($_POST['RequestType'] == 'Request For Extension')
						{
						//echo $ProjectID;
						echo 'Request For Extension Page';
						$ExtensionPeriod = 20;
						$msg = $this->project_model->projectExtension($ProjectID,$ExtensionPeriod);
						} 
					else if ($_POST['RequestType'] == 'Project Completed') 
						{
						echo 'Project Completed Page';
						$msg = $this->project_model->projectCompletion($ProjectID);
						}
					/*foreach($result->result() as $row)
						{
						echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->ProjectId;
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