<?PHP


// 1.Show the details of the selected project  
// 2. Approve or reject a project

class ShowConference extends CI_Controller {

	
    
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
					 //echo 'load project called    ';
					 $Conference = $this->input->post('Choice1');
					 echo $Conference;
					 $this->load->model('conference_model');
					  //pass the projectId of the selected project
					 
					 echo '<FORM name="approveConference" method= POST action="ShowConference/approveConference">';
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
					 echo '<input type= submit value= "Approve" name="approve"><input type= submit value= "Reject" name="approve"><input type="hidden" name=conferenceID value="'.$Conference.' " >'; //Hidden to pass the projectId without showing it to the user
					 echo '</FORM>';
				}
	
	//fucntion to approve or reject project based on the user's selection
	function approveConference(){
		$data['myClass']=$this;
		$data['action']=2;
		
		$this->load->model('conference_model');
		
		//echo 'project value:'.$_POST['projectID'];
		if($_POST['approve']=='Approve')
		{
			$Query= $this->conference_model->changeStatus('app_comm',$_POST['conferenceID']);
			//$this->load->view('layout',$data);
			$data['msg']='Approved';
		}
		else
		{
		    $Query= $this->conference_model->changeStatus('rejected',$_POST['conferenceID']);
			$data['msg']='Rejected';
		}
		
		$this->load->view('layout',$data);
	}
	
	function approveMsg($status){
		if($status=='Approved')
			{
			echo 'Conference has been Approved!!!!!';
			}
		else
			{
			echo 'Conference has been Rejected';
			}
	}
}
?>