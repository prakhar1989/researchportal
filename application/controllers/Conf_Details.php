<?PHP

class Conf_Details extends CI_Controller {

	
    
	//calls the view to create the background etc.
	function index()
			{
				$data['myClass']=$this;
				$data['action']=0;
				session_start();
				if($_SESSION['usertype']==1){
					$this->load->view('layout',$data);
				} elseif ($_SESSION['usertype']==2){
					$this->load->view('layoutComm',$data);
				} elseif($_SESSION['usertype']==3){
					$this->load->view('layoutChairman',$data);
				}
			else{
			
			header("location:login");
			}
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
					 echo '<table class="table table-bordered"> 
					
					 <thead>
							<tr>
							</tr>
					</thead>
					<tbody>';
					 
					$tableHeader= '<TR><TD><h4>Faculty Name</h4></TD><TD><h4>Conference Title</h4></TD><TD><h4>App_Date</h4></TD><TD><h4>Date of Conference</h4></TD><TD><h4>Paper Title</h4></TD><TD><h4>Co Researcher</h4></TD><TD><h4>Source of Funding</h4></TD>';
					/*if ($_SESSION['usertype']==3)
					{$tableHeader= $tableHeader.'<TD><h4>Committee consulted</h4>';
					}*/
					
					$tableHeader= $tableHeader.'</TR>';
					 
					 echo $tableHeader;
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
						 echo '</TD></tr>';
						 /*if ($_SESSION['usertype']=='3' && $row->PStatus=='app_chairman_2')
						 {
							echo 'YES';
						 }
						 else if ($_SESSION['usertype']=='3' && $row->PStatus!='app_chairman_2')
						 {
							echo 'NO';
						 }*/
						 
						 }
					
					 
					 echo '</tbody> </TABLE>';

				}
}	
?>