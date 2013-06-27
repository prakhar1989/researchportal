<?PHP
//******** To show the projects lying for approval from committee ********************
class App_committee extends CI_Controller {
	
	function index()
		{
			
			$data['myClass']=$this;
			$data['action']=0;
			//$this->load->view('layout',$data);
			session_start();
			if($_SESSION['usertype']==1){
				$this->load->view('layout',$data);
			} 
			/*elseif ($_SESSION['usertype']==2){
				$this->load->view('layoutComm',$data);
			}*/ elseif($_SESSION['usertype']==3){
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
				$this->load->model('project_model');
					 
				echo '<h1>Committee </h1>';
				if($_SESSION['usertype']==3)
				{
					$data['query']= $this->project_model->getCommProjects();
				
					echo'
						
						<FORM METHOD=POST ACTION="ShowProject">
						<table class="table table-bordered">
						<TR><TD><h4>ProjectTitle</h4></TD><TD><h4>Work Order Number</h4></TD><TD><h4>ProjectCategory</h4></TD><TD><h4>ProjectGrant</h4></TD><TD><h4>App_Date</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</h4></TD><TD><h4>Researcher3</h4></td><TD><h4>Approved By</h4></TD><TD><h4>Select</h4></TD></tr>
						<tbody>';
						$flag=0;

					 foreach($data['query'] as $row)
					 {
						 echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->WorkOrderId;
						 echo '</TD><TD>';
						 print $row->ProjectCategory;
						 echo '</TD><TD>';
						 print $row->ProjectGrant;
						 echo '</TD><TD>';
						 print $row->App_Date;
						 echo '</TD><TD>';
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Researcher3;
						 echo '</TD><TD>';
						 
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
						 
						 echo '</td><TD><INPUT TYPE="RADIO" NAME="Choice1" VALUE="'.$row->ProjectId.'"></TD></TR>';
						 
						$flag++;
					}
					if($flag==0){
					echo '<h4>No applications pending with committee</h4> <br > </tbody> </TABLE>';
					}
					else
					{
					echo '</tbody>
					</TABLE>
					<INPUT TYPE=SUBMIT value="VIEW">
					</FORM>';
					}
				}
				else if($_SESSION['usertype']==1){
					$stage='comm';
					$data['query']= $this->project_model->getCommProjects();
					echo'
						<table class="table table-bordered">
						<TR><TD><h4>ProjectTitle</h4></TD><TD><h4>Work Order Number</h4></TD><TD><h4>ProjectCategory</h4></TD><TD><h4>ProjectGrant</h4></TD><TD><h4>App_Date</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</h4></TD><TD><h4>Researcher3</h4></td><TD><h4>Approved by </h4></td></tr>
						<tbody>';
						$flag=0;

					foreach($data['query'] as $row)
					{
						 echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->WorkOrderId;
						 echo '</TD><TD>';
						 print $row->ProjectCategory;
						 echo '</TD><TD>';
						 print $row->ProjectGrant;
						 echo '</TD><TD>';
						 print $row->App_Date;
						 echo '</TD><TD>';
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Researcher3;
						 echo '</TD><TD>';
						 
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
	
	}


?>
