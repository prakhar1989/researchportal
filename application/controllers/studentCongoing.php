<?PHP

class StudentCOngoing extends CI_Controller {
	
	function index()
		{
			
			$data['myClass']=$this;
					$data['action']=0;
					$this->load->view('layoutStudent',$data);
		}
	function load_php()
				{
				$this->load->model('conference_model');
				$result= $this->conference_model->ongoingStudentConferences('anurag');
				echo '<p> hello this is the OngoignPage </p>';
				//Load the project model
                //Query for the ongoign projects (!= completed and rejected)
				//$this->load->database();
				//$queryStr='SELECT * FROM project';
				//$query = $this->db->query($queryStr);
				// Display the results
				echo'
					<FORM METHOD=POST ACTION="http://localhost/ci/index.php/StudentConfShowDetails">
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							';
					foreach($result->result() as $row)
						{
						echo '<TR><TD>';
						 print $row->ConferenceTitle;
						 echo '</TD><TD>';
						 print $row->ConferenceId;
						 echo '</TD><TD>';
						 print $row->App_Date;
						 echo '</TD><TD>';
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 echo '<TD><INPUT TYPE="RADIO" NAME="ConferenceChoice" VALUE="'.$row->ConferenceId.'"></TD></TR>';
						}
							 
					 echo '</TABLE>
					<INPUT TYPE=SUBMIT value="Show Details">
					</FORM>';
                // For help: new_application.php
				
				}
	
	}


?>