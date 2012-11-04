<?PHP

class Conf_app_admin extends CI_Controller {
	
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
				$stage='admin';
				$Query= $this->conference_model->conference_stage($stage);
				
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