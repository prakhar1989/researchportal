<?PHP

class COngoing extends CI_Controller {
	
	function index()
		{
			
			$data['myClass']=$this;
					$data['action']=0;
					//$this->load->view('layout',$data);
					//vridhi
					session_start();
					if($_SESSION['usertype']==1){
						$this->load->view('layout',$data);
					} elseif ($_SESSION['usertype']==2){
						$this->load->view('layoutComm',$data);
					} elseif($_SESSION['usertype']==3){
						$this->load->view('layoutChairman',$data);
					}
		}
	function load_php()
				{
				echo '<h1> Ongoing Applications </h1>';
				//Load the project model
                //Query for the ongoing projects (!= completed and rejected)
				// Display the results
                
				$this->load->model('conference_model');
				$status='approved';
				$Query= $this->conference_model->conference_status($status);
				
				echo '<TABLE class="table table-bordered">';
				echo '<TR><TD><h4>ConferenceTitle</h4></TD><TD><h4>ConferenceId</h4></TD><TD><h4>Description</h4></TD><TD><h4>ConferenceCategory</TD><TD><h4>ConferenceGrant</TD><TD><h4>App_Date</TD><TD><h4>Researcher1 </h1>';
	 
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
