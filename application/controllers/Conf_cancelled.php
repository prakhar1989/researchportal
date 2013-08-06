<?PHP

class Conf_cancelled extends CI_Controller {
	
	function index()
		{
			
			$data['myClass']=$this;
			$data['action']=0;
			//$this->load->view('layout',$data);
			//vridhi
			session_start();
			if($_SESSION['usertype']==1){
				$this->load->view('layout',$data);
			} elseif ($_SESSION['usertype']==2 || $_SESSION['usertype']==6 || $_SESSION['usertype']==7){
				$this->load->view('layoutComm',$data);
			} elseif($_SESSION['usertype']==3){
				$this->load->view('layoutChairman',$data);
			}
			else{
			
			header("location:/rp/login");
			}
		}
	function load_php()
				{
				echo '<h1> Archived </h1>';
				//Load the project model
                //Query for the ongoign projects (PStatus==completed)
				// Display the results
                // For help: new_application.php
				$this->load->model('conference_model');
				$status='completed';
				$Query= $this->conference_model->conference_status($status);
				
                    echo '<TABLE class="table table-bordered"> <thead>
							<tr>
							</tr>
					</thead>
					<tbody>';
					echo '<TR><TD><h4>Block</h4></TD><TD><h4>Faculty Name</h4></TD><TD><h4>Conference Title</h4></TD><TD><h4>App_Date</h4></TD><TD><h4>Date of Conference</h4></TD><TD><h4>Paper Title</h4></TD><TD><h4>Co Researcher</h4></TD><TD><h4>Source of Funding</h4></TD></TR>';
					 foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						 echo 'Apr '.(2010+3*($row->Block_number)).' to Mar '.(2013+3*($row->Block_number));
						 echo '</TD><TD>';
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
					 }
				echo '</TABLE>';
				}
				
				
	
	}


?>
