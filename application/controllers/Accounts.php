<?PHP

class Accounts extends CI_Controller {
	
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
	function load_php()
				{
				//Load the project model
                //Query for the ongoing projects (!= completed and rejected)
				// Display the results
                
				$this->load->model('project_model');
				//$status='approved';
				$Query= $this->project_model->allProjects();
				
				echo ' <h1>Account Details of Ongoing Projects</h1>';
				echo ' <p>Choose Project to view details</p>';
				echo '<FORM METHOD=POST ACTION="Show_account"> <table class="table table-bordered">
				<TR><TD><h4>ProjectTitle</h4></TD><TD><h4>Work Order Number</h4></TD><TD><h4>ProjectCategory</TD><TD><h4>ProjectGrant</TD><TD><h4>App_Date</TD><TD><h4>Researcher1</TD><TD><h4>Researcher2</TD><TD><h4>Researcher3 </h1><TD><h4>Select</h1></TD>
				<tbody>';
	 
					 foreach($Query->result() as $row)
					 {
						if ($row->PStatus == "ongoing" OR $row->PStatus == "approved")
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
							 echo '<TD><INPUT TYPE="RADIO" NAME="Choice1" VALUE="'.$row->ProjectId.'"></TD>';
							 echo '<TD><INPUT TYPE=SUBMIT value="View Account Details" name="Action"></TD></TR>';
						}
					 }
				echo '</tbody></TABLE>
				    
					</FORM>';
				
				
				echo ' <h1>Account Details of Completed Projects</h1>';
				echo ' <p>Choose Project to view details</p>';
				echo '<FORM METHOD=POST ACTION="Show_account"> <table class="table table-bordered">
				<TR><TD><h4>ProjectTitle</h4></TD><TD><h4>Work Order Number</h4></TD><TD><h4>ProjectCategory</TD><TD><h4>ProjectGrant</TD><TD><h4>App_Date</TD><TD><h4>Researcher1</TD><TD><h4>Researcher2</TD><TD><h4>Researcher3 </h1><TD><h4>Select</h1></TD>
				<tbody>';
	 
					 foreach($Query->result() as $row)
					 {
						if ($row->PStatus == "completed")
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
							 echo '<TD><INPUT TYPE="RADIO" NAME="Choice1" VALUE="'.$row->ProjectId.'"></TD>';
							 echo '<TD><INPUT TYPE=SUBMIT value="View Account Details" name="Action"></TD></TR>';
						}
					 }
				echo '</tbody></TABLE>
				    
					</FORM>';
				}
	}


?>
