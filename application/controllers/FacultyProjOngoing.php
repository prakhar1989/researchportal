<?PHP

class FacultyProjOngoing extends CI_Controller {
	
	function index()
		{
			
			$data['myClass']=$this;
					$data['action']=0;
					$this->load->view('layoutFaculty',$data);
		}
	function load_php()
				{
				$this->load->model('project_model');
				$result= $this->project_model->ongoingFacultyProjects('anurag');
				//Load the project model
                //Query for the ongoign projects (!= completed and rejected)
				//$this->load->database();
				//$queryStr='SELECT * FROM project';
				//$query = $this->db->query($queryStr);
				// Display the results
				echo'
					<FORM METHOD=POST ACTION="FacultyProjShowDetails">
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							
					<h1>Ongoing Projects</h1>
						<table class="table table-bordered">
					<TD><h4>ProjectTitle</h4></TD><TD><h4>ProjectId</h4></TD><TD><h4>Application Date</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</h1></TD><TD><h4>Select</h1></TD>
					
					<tbody>		';
					foreach($result->result() as $row)
						{
						echo '<tr><TD>';
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
						 echo '<TD><INPUT TYPE="RADIO" NAME="ProjectChoice" VALUE="'.$row->ProjectId.'"></TD></TR>';
						}
							 
					 echo '
					 </tbody>
					 </TABLE>
					<INPUT TYPE=SUBMIT value="Show Details">
					</FORM>';
                // For help: new_application.php
				
				}
	
	}


?>