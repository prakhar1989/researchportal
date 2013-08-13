<?PHP

class Conf_facultypending extends CI_Controller {
	
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
				$result= $this->conference_model-> conferencePendingFaculty($_SESSION['username']);
				// Display the results
				echo'
					<FORM METHOD=POST ACTION="FacultyConfShowDetails">
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
						
						<h1>Pending for approval</h1>
						<table class="table table-bordered">
						<tr><TD><h4>Conference Title</h4></TD><TD><h4>App_Date</h4></TD><TD><h4>Date of Conference</h4></TD><TD><h4>Paper Title</h4></TD><TD><h4>Co Researcher</h4></TD><TD><h4>Source of Funding</h4></TD><TD><h4>Title</h4></TD><TD><h4>Fees</h4></TD><TD><h4>Budget</h4></TD><TD><h4>Acceptance</h4></TD></tr>';

					foreach($result->result() as $row)
						{
						echo '<TR><TD>';
						 print $row->ConferenceTitle;
						 echo '</TD><TD>';
						 print $row->App_Date;
						 echo '</TD><TD>';
						 print $row->Start_Date;
						 echo '</TD><TD>';
						 print $row->PaperTitle;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Funding;
						 //echo '<TD><INPUT TYPE="RADIO" NAME="ConferenceChoice" VALUE="'.$row->ConferenceId.'"></TD></TR>';
						 $Conf=$row->ConferenceId;
						 if(file_exists('upload_conf/'.$Conf.'_title'))
							echo'</TD><TD><p><a href="downloadfile?file=upload_conf/'.$Conf.'_title">Download Conference Paper</a><br><br></p></TD>';
						 else 
							echo '</TD><TD><p>Download Conference Paper<br><br></p></TD>';
						 if(file_exists('upload_conf/'.$Conf.'_fees'))
							echo'<TD><a href="downloadfile?file=upload_conf/'.$Conf.'_fees">Download Conference Registration Fees Details</a><br><br></TD>';
						 else 
							echo '</TD><TD><p>Download Registration Fees Details<br><br></p></TD>';
						if(file_exists('upload_conf/'.$Conf.'_budget'))	
						    echo'<TD><a href="downloadfile?file=upload_conf/'.$Conf.'_budget">Download Conference Budget Details</a><br><br></TD>';
						else
							echo '</TD><TD><p>Download Conference Bdget Details<br><br></p></TD>';
						if(file_exists('upload_conf/'.$Conf.'_acceptance'))	
							echo'<TD><a href="downloadfile?file=upload_conf/'.$Conf.'_acceptance">Download Acceptance Letter</a><br><br></TD>';
						else
							echo '</TD><TD><p>Download Acceptance Letter<br><br></p></TD>';
						
						}
							 
					 echo '</TABLE>
					</FORM>';
				
				}
	
	}


?>