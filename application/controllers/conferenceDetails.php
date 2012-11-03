<?PHP

class ConferenceDetails extends CI_Controller {

	
    
	//calls the view to create the background etc.
	function index()
			{

				//echo '<p>Value received is '. $this->input->post('Choice1'). '</p>';
				$data['myClass']=$this;
				$data['action']=0;
				$this->load->view('layout',$data);
			}
    // Displays the details of the project
	function load_php()
			{
					 //echo 'show project details called    ';
					 $Conference = $this->input->post('Choice1');
					 //echo $Project;
					 $this->load->model('conference_model');
					  //pass the projectId of the selected project
					 
					 //echo '<FORM name="approveProject" method= POST action="ShowProject/approveProject">';
					 $Query= $this->conference_model->conferenceInfo($Conference);
					 echo '<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
					 ';
					 foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						 print $row->ConferenceTitle;
						 echo '</TD><TD>';
						 print $row->ConferenceId;
						 echo '</TD><TD>';
						 print $row->Description;
						 echo '</TD><TD>';
						 print $row->ConferenceCategory;
						 echo '</TD><TD>';
						 print $row->ConferenceGrant;
						 echo '</TD><TD>';
						 print $row->App_Date;
						 echo '</TD><TD>';
						 print $row->Researcher1;
					 }
					 echo '</TABLE>';
				}
}	
?>