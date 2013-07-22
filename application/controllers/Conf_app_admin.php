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
			else{
			echo 'hello';
			header("location:login");
			}
		}
	function load_php()
				{
				//echo '<p> App_chairman page </p>';
				//Load the project model
				$this->load->model('conference_model');
				$stage='admin';
				$Query= $this->conference_model->conference_stage($stage);
			
				echo '<h1>Admin</h1>
				<table class="table table-bordered"> 
					
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
						
						 echo '</TR>';

						 /*if ($_SESSION['usertype']=='3' && $row->PStatus=='app_chairman_2')
						 {
							echo 'YES';
						 }
						 else if ($_SESSION['usertype']=='3' && $row->PStatus!='app_chairman_2')
						 {
							echo 'NO';
						 }*/
						 
						 }
				echo '</TABLE>';
                }
	
	}


?>