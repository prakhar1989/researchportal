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
				echo '<h1>Completion Requests</h1>';
				echo '<p> This is the Completion page. The Requests for project extenions to be showed here</p>';
				$this->load->model('project_model');
				$Query= $this->project_model->project_completion_admin();
				//$count= $this->project_model->getDirectoryList(55);
				//echo $count;
				echo '<FORM METHOD=POST ACTION="CompletionCheckAdminRequest">
				<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
					 <table class="table table-bordered">
					<tr><TD><h4>ProjectTitle</h4></TD><TD><h4>ProjectId</h4></TD><TD><h4>WorkOrderId</h4></TD><TD><h4>Description</h4></TD><TD><h4>ProjectCategory</h4></TD><TD><h4>ProjectGrant</h4><TD><h4>Start_Date</h4></TD><TD><h4>End_Date</h4></TD><TD><h4>Period</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</TD><TD><h4>Comments</h4></TD><TD><h4>Select</h1></TD></tr>
					
					<tbody>';
					 foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->ProjectId;
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
						 }
						 echo '<TD><INPUT TYPE="RADIO" NAME="ProjectSelected" VALUE="'.$row->ProjectId.'"></TD></TR>';
					 }
				echo '</tbody></TABLE> 
				<p>Please enter comments (mandatory)*</p>
				<p><textarea name="comment" ></textarea></p>
				<INPUT TYPE=SUBMIT name ="RequestType" value="Approve and Forward To Chairman">
				<INPUT TYPE=SUBMIT name="RequestType" value="Check Deliverables">
				<INPUT TYPE=SUBMIT name ="RequestType" value="Send For Revision">
				</FORM>';
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
