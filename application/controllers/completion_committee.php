<?PHP

class completion_committee extends CI_Controller 
	{
	function index()
		{
			session_start();
			$data['myClass']=$this;
			$data['action']=0;
			
					
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
				echo '<h1>Completion Request</h1>';
				echo '<p> This is the Completion page. The Requests for project completions to be showed here</p>';
				//session_start();
				$this->load->model('project_model');
				$Query= $this->project_model->project_completion_committee();
				
				echo '<FORM METHOD=POST ACTION="CompletionCheckCommitteeRequest">
				<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
					 <table class="table table-bordered">
					<tr><TD><h4>ProjectTitle</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</TD><TD><h4>Project Duration</TD><TD><h4>Start Date</TD><TD><h4>End Date</TD><TD><h4>Work Order</h4></TD><TD><h4>Funding</h4></TD><TD><h4>Project Category</h4></TD><TD><h4>Budget</h4><TD><h4>Deliverables</h4></TD><TD><h4>Select</h1></TD></tr>';
					//echo '<tr><TD><h4>ProjectTitle</h4></TD><TD><h4>Work Order Number</h4></TD><TD><h4>Description</h4></TD><TD><h4>ProjectCategory</h4></TD><TD><h4>ProjectGrant</h4><TD><h4>Start_Date</h4></TD><TD><h4>End_Date</h4></TD><TD><h4>Period</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</TD><TD><h4>Comments</h4></TD><TD><h4>Select</h1></TD></tr>';
					
					echo '<tbody>';
					 foreach($Query->result() as $row)
					 {
						 
						 /*echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->Description;
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
						  //vridhi--display comments below
						 $Result=$this->project_model->getComment($row->ProjectId, $_SESSION['usertype']);
						 foreach($Result as $row1)
						 {
							 echo '<p>'.$row1->Date.' ; '.$row1->User.': '.$row1->Comment.'</p>';
						 }*/
						 echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Researcher3;
						 echo '</TD><TD>';
						 
						$queryStr1='SELECT DATEDIFF(End_Date,Start_Date) AS diff FROM project WHERE ProjectId = "'.$row->ProjectId.'";';
						$query1= $this->db->query($queryStr1);
						foreach($query1->result() as $row1)
							{
							$diff = $row1->diff;
							}
						//print intval($diff/31);
						print $row->ProjectDuration;
						 echo '</TD><TD>';
						 print $row->Start_Date;
						 echo '</TD><TD>';
						 print $row->End_Date;
						 
						 echo '</TD><TD>';
						 print $row->WorkOrderId;
						 echo '</TD><TD>';
						 if ($row->ProjectCategory == 'Externally Funded Project')
							echo 'External';
						 else
							echo 'IIMC';
						 echo '</TD><TD>';
						 print $row->ProjectCategory;
						 echo '</TD><TD>';
						 print $row->ProjectGrant;
						 echo '</TD><TD>';
						 $deliverablesCount = $row->cases + $row->journals + $row->chapters + $row->conference + $row->paper + $row->books;
						 echo $deliverablesCount;
						 echo '</TD><TD><INPUT TYPE="RADIO" NAME="ProjectSelected" VALUE="'.$row->ProjectId.'"></TD></TR>';
					 }
				echo '</tbody></TABLE>
				<p>Please enter comments (mandatory)*</p>
				<p><textarea name="comment" ></textarea></p>
				
				<INPUT TYPE=SUBMIT name ="RequestType" value="Send">
				</FORM>';
				}
	}


?>
