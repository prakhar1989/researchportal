<?PHP

class Conf_facultyrevision extends CI_Controller {
	
	function index()
		{
			
			ini_set( "display_errors", 0); 
			$data['myClass']=$this;
			$data['action']=0;
			session_start();
			if($_SESSION['usertype']==4){
			$this->load->view('layoutFaculty',$data);
			} 
			else{
			header("location:login");
			}
		}
	function load_php()
			{
				$this->load->model('conference_model');
				$Query= $this->conference_model->conferenceRevise($_SESSION['username']);
				echo '<FORM METHOD=POST ACTION="Conf_facultyrevisionCheck">
					<table class="table table-bordered">
					<tr>
					<TD><h4>Faculty Name</h4></TD><TD><h4>Conference Title</h4></TD><TD><h4>App_Date</h4></TD><TD><h4>Date of Conference</h4></TD><TD><h4>Paper Title</h4></TD><TD><h4>Co Researcher</h4></TD><TD><h4>Source of Funding</h4></TD><TD><h4>Select</h4></TD><TD></TD></TR>
					<tbody>	
					';
				
				foreach($Query->result() as $row)
				{
					echo '<TR><TD>';
					print $row->Researcher1;
					echo '</TD><TD>';
					print $row->ConferenceTitle;
					echo '</TD><TD>';
					print $row->App_Date;
					echo '</TD><TD>';
					print $row->Start_Date;
					echo ' to ';
					print $row->End_Date;
					echo '</TD><TD>';
					print $row->PaperTitle;
					echo '</TD><TD>';
					print $row->Researcher2;
					echo '</TD><TD>';
					print $row->Funding;
					echo '</TD>';
					echo '<TD><INPUT TYPE="RADIO" NAME="ConferenceSelected" VALUE="'.$row->ConferenceId.'"></TD>';
					echo '<TD><INPUT TYPE=SUBMIT name ="RequestType" value="Edit New Application"></TD></TR>';
						 
				}
				echo '</tbody></TABLE>';
			}
	
	}


?>