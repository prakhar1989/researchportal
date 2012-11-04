<?PHP

class Conf_StudentCompleted extends CI_Controller {
	
	function index()
		{
			
			$data['myClass']=$this;
			$data['action']=0;
			$this->load->view('layoutStudent',$data);
		}
	function load_php()
				{
				$this->load->model('conference_model');
				$result= $this->conference_model-> conferenceCompleteStudent('anurag');
				// Display the results
				echo'
					
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
						 echo '</TD></TR>';
						}			 
					 echo '</TABLE>';
				
				}
	
	}


?>