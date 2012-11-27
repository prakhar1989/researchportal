<?PHP

class FacultyProjShowDetails extends CI_Controller {
	
	function index()
		{
			
		$data['myClass']=$this;
		$data['action']=0;
		$this->load->view('layoutFaculty',$data);
		}
	function load_php()
				{
				$ProjectID = $this->input->post('ProjectChoice');
				//echo $ProjectID;
				//Load the project model
				$this->load->model('project_model');
				$result= $this->project_model->projectSearchByID($ProjectID);
				//echo '<p> hello this is the Project Details Page </p>';
				// Display the results
				echo'
					<FORM METHOD=POST ACTION="http://localhost/rp/index.php/FacultyProjRequest">
					<table class="table table-bordered">
					<tr<><td></td></tr>
					<TD><h4>ProjectTitle</h4></TD><TD><h4>ProjectId</h4></TD><TD><h4>Application Date</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</h1></TD>
					
					<tbody>	
					<INPUT TYPE="HIDDEN" NAME="ProjectSelected" VALUE="'.$ProjectID.'">					
					';
					foreach($result->result() as $row)
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
						 echo '</TD>';
						 //echo '<TD><INPUT TYPE="RADIO" NAME="ProjectChoice" VALUE="'.$row->ProjectId.'"></TD></TR>';
						}			 
					 echo '</tbody></TABLE>
					<INPUT TYPE=SUBMIT name ="RequestType" value="Request For Extension">
					<INPUT TYPE=SUBMIT name="RequestType" value="Project Completed">
					</FORM>';
                
				
				}
	
	}


?>