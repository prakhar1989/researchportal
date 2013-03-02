<?PHP

class Conf_app_chairman extends CI_Controller {
	
	function index()
		{
			
			$data['myClass']=$this;
			$data['action']=0;
		//	$this->load->view('layout',$data);
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
				//echo '<p> App_chairman page </p>';
				//Load the project model
				$this->load->model('conference_model');
				$stage='chairman';
				$Query= $this->conference_model->conference_stage($stage);
				
                echo "<h1>Chairman</h1>";
				echo '<TABLE class="table table-bordered">';
                echo '<TR><TD><h4>Conference Title</h4></TD><TD><h4>Conference Id</h4></TD><TD><h4>Description</h4></TD><TD><h4>Conference Category</TD><TD><h4>Conference Grant</TD><TD><h4>App_Date</TD><TD><h4>Researcher1</tr>';
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
