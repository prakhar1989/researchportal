<?PHP

class Ongoing extends CI_Controller {
	
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
				echo '<h1> Ongoing Projects </h1>';
				//Load the project model
                //Query for the ongoing projects (!= completed and rejected)
				// Display the results
                
				$this->load->model('project_model');
				$status='ongoing';
				$Query= $this->project_model->project_status($status);
				
				echo '<FORM METHOD=POST ACTION="CompletionCheckAdminRequest">';
				echo '<TABLE class="table table-bordered"><tbody>';
                echo '<TR><TD><h4>ProjectTitle</h4></TD>
					<TD><h4>Work Order Number</h4></TD>
                    <TD><h4>Description</h4></TD>
                    <TD><h4>Project Category</TD>
                    <TD><h4>Project Grant</TD>
                    <TD><h4>Start Date</TD>
					<TD><h4>End Date</TD>
                    <TD><h4>Researcher1</TD>
                    <TD><h4>Researcher2</TD>
                    <TD><h4>Researcher3</h1></TD></tbody>';
	 
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
						 echo '</TD><TD>';
						 echo '<TD><INPUT TYPE="RADIO" NAME="ProjectSelected" VALUE="'.$row->ProjectId.'"></TD></TR>';
					 }
				echo '</TABLE>';
				
				echo '<INPUT TYPE=SUBMIT name="RequestType" value="Check Deliverables" onClick=checkDeliverables()>';
				echo '</FORM>';
				}
	
	}


?>
