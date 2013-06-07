<?PHP

class Completion_admin extends CI_Controller 
	{
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
			echo 'hello';
			header("location:login");
			}
		}
	function load_php()
				{
				echo '<h1>Closure Requests</h1>';
				echo '<p> This is the Closure page. The Requests for project extenions to be showed here</p>';
				$this->load->model('project_model');
				$Query= $this->project_model->project_completion_admin();
				//$count= $this->project_model->getDirectoryList(55);
				//echo $count;
				echo '<hr size=10 noshade color="#333333"><h3>New Requests</h3>';
				echo '<FORM METHOD=POST ACTION="CompletionCheckAdminRequest">
				<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
					 <table class="table table-bordered">
					<tr><TD><h4>ProjectTitle</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</TD><TD><h4>Project Duration</TD><TD><h4>Start Date</TD><TD><h4>End Date</TD><TD><h4>Work Order</h4></TD><TD><h4>Funding</h4></TD><TD><h4>Project Category</h4></TD><TD><h4>Budget</h4><TD><h4>Deliverables</h4></TD><TD><h4>Select</h1></TD></tr>';
					//echo '<tr><TD><h4>Project Title</h4></TD><TD><h4>Work Order Number</h4></TD><TD><h4>Description</h4></TD><TD><h4>Project Category</h4></TD><TD><h4>Project Grant</h4><TD><h4>Start Date</h4></TD><TD><h4>End Date</h4></TD><TD><h4>Period</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</TD><TD><h4>Comments</h4></TD><TD><h4>Select</h1></TD></tr>';
					
					echo '<tbody>';
					 foreach($Query->result() as $row)
					 {
						 /*echo '<TR><TD>';
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
						 print $row->Period;
						 echo '</TD><TD>';
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Researcher3;
						 //vridhi--display comments
						 echo '</TD><TD>';
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
						print intval($diff/31);
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

				<INPUT TYPE=SUBMIT name ="RequestType" value="Checked and Forward To Chairman">
				<INPUT TYPE=SUBMIT name="RequestType" value="Check Deliverables" onClick=checkDeliverables()>
				<INPUT TYPE=SUBMIT name ="RequestType" value="Send For Revision">
				</FORM>';
				
				$result1= $this->project_model->projectCompletionApproved();
				echo '<FORM METHOD=POST ACTION="printfilecomp">
				<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
				
						<table class="table table-bordered">
					<TD><h4>Project Title</h4></TD><TD><h4>Work Order Number</h4></TD><TD><h4>Start Date</h4></TD><TD><h4>End Date</h4></TD><TD><h4>Period</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</h1></TD><TD><h4>Comments</h1></TD><TD><h4>Select</h1></TD>
					
					<tbody>';
					echo '<p></br></p>';
					echo '<hr size=10 noshade color="#333333"><h3>Projects Approved for Closure</h3>';
					foreach($result1->result() as $row)
						{
						echo '<tr>
						<td>';
						 print $row->ProjectTitle;
						 echo '</td><TD>';
						 print $row->WorkOrderId;
						 echo '</TD><TD>';
						 print $row->Start_Date;
						 echo '</TD><TD>';
						 print $row->End_Date;
						 echo '</TD><TD>';
						 print $row->Period;
						 echo '</TD><TD>';
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Researcher3;
						echo '</td><td>';
						$Result=$this->project_model->getComment($row->ProjectId, $_SESSION['usertype']);
						 foreach($Result as $row1)
						 {
							 echo '<p>'.$row1->Date.' ; '.$row1->User.': '.$row1->Comment.'</p>';
						 }
						 echo '</TD><TD><INPUT TYPE="RADIO" NAME="ProjectSelected" VALUE="'.$row->ProjectId.'"></TD></TR>';
						}			 
					 echo '</tbody>
					</table>
				<INPUT TYPE=SUBMIT name ="RequestType" value="Print">
				</Form>';
				}
	}
?>

	<script>
//function checkDeliverables()
{
//var count = getDirectoryList (55);
//var period = prompt(count,"0");
//document.form1.hidden1.value = period;
}
</script>
