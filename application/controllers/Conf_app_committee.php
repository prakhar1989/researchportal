<?PHP

class Conf_app_committee extends CI_Controller {
	
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
			
			header("location:login");
			}
		}
	function load_php()
				{
				//echo '<p> App_chairman page </p>';
				//Load the project model
				$this->load->model('conference_model');
			
				
				if($_SESSION['usertype']==3)
				{
					$data['query']= $this->conference_model->getCommConf();
				
					echo'
						<h1>Committee Projects</h1>
						<FORM METHOD=POST ACTION="ShowProject">
						<table class="table table-bordered">
						<TR><TD><h4>Faculty Name</h4></TD><TD><h4>Conference Title</h4></TD><TD><h4>App_Date</h4></TD><TD><h4>Date of Conference</h4></TD><TD><h4>Paper Title</h4></TD><TD><h4>Co Researcher</h4></TD><TD><h4>Source of Funding</h4></TD></TR>
						<tbody>';
						$flag=0;

					 foreach($data['query'] as $row)
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
				echo '</tbody></TABLE>';
				}
				else if($_SESSION['usertype']==1){
					$stage='comm';
					$data['query']= $this->conference_model->getCommConf();
					echo'
						<table class="table table-bordered">
						<TR><TD><h4>Faculty Name</h4></TD><TD><h4>Conference Title</h4></TD><TD><h4>App_Date</h4></TD><TD><h4>Date of Conference</h4></TD><TD><h4>Paper Title</h4></TD><TD><h4>Co Researcher</h4></TD><TD><h4>Source of Funding</h4></TD></TR>
						<tbody>';
						$flag=0;

					 foreach($data['query'] as $row)
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
						 echo '</TD><TD>';
						 /*if ($_SESSION['usertype']=='3' && $row->PStatus=='app_chairman_2')
						 {
							echo 'YES';
						 }
						 else if ($_SESSION['usertype']=='3' && $row->PStatus!='app_chairman_2')
						 {
							echo 'NO';
						 }*/
						 
						 }
						 
						 $commStr= '';
							if($row->comm_approval == 0){
							$commStr = $commStr."No Committee Member ";
							}
							
							if($row->comm_approval == 2 || $row->comm_approval == 5 || $row->comm_approval == 6 || $row->comm_approval == 9){
							$commStr = $commStr."Committee1 ";
							}
							if($row->comm_approval == 3 || $row->comm_approval == 5 || $row->comm_approval == 7 || $row->comm_approval == 9){
							$commStr = $commStr."Committee2 ";
							}
							if($row->comm_approval == 4 || $row->comm_approval == 6 || $row->comm_approval == 7 || $row->comm_approval == 9){
							$commStr = $commStr."Committee3";
							}
						 print $commStr;
						 echo '</TD></TR>';
						 $flag++;
					 }
					if($flag==0){
					echo '<h4>No applications pending with committee</h4> <br > </tbody> </TABLE>';
					}
					else
					{
					echo '</tbody>
					</TABLE>';
					}
	
	}
	}


?>
