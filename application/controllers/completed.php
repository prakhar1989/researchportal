<?PHP

class Completed extends CI_Controller {
	
	function index()
		{
			
			$data['myClass']=$this;
			$data['action']=0;
		
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
			
			header("location:/rp/login");
			}
		}
	function load_php()
				{
				echo '<h1> Completed Applications </h1>';
				//Load the project model
                //Query for the ongoign projects (PStatus==completed)
				// Display the results
                // For help: new_application.php
				$this->load->model('project_model');
				$status='completed';
				$Query= $this->project_model->project_status($status);
				
				echo '<TABLE class="table table-bordered">';
                 echo '<TR><TD><h4>Project Title</h4></TD><TD><h4>Work Order Number</h4></TD><TD><h4>Description</h4></TD><TD><h4>Project Category</TD><TD><h4>Project Grant</TD><TD><h4>Start Date</TD><TD><h4>End Date</TD><TD><h4>Researcher1</TD><TD><h4>Researcher2</TD><TD><h4>Researcher3 </h1>';
					 foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->WorkOrderId;
						 echo '</TD><TD>';
						 print $row->Description;
						 echo '</TD><TD>';
						 print $row->ProjectCategory;
						 echo '</TD><TD>';
						 print $row->ProjectGrant;
						 echo '</TD><TD>';
						 print $row->Start_Date;
						 echo '</TD><TD>';
						 print $row->End_Date;
						 echo '</TD><TD>';
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Researcher3;
					 }
				echo '</TABLE>';
				}
				
				
	
	}


?>
