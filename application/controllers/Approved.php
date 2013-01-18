<?PHP

class Approved extends CI_Controller {
	
	function index()
		{
		    	
			$data['myClass']=$this;
			$data['action']=0;
			session_start();
			if($_SESSION['usertype']==1){
				$this->load->view('layout',$data);
			} 
			else{
			header("location:login");
			}
		}
	function load_php()
				{
				echo '<h1> Approved Applications </h1>';
				//Load the project model
                //Query for the ongoing projects (!= completed and rejected)
				// Display the results
                
				$this->load->model('project_model');
				$status='approved';
				$Query= $this->project_model->project_status("kkk");
				if($Query->num_rows()==0){
					 echo '<h3>&nbsp;&nbsp;No Approved Applications As Of Now </h3><br > </tbody> </TABLE>';
				} 
				else
				{
				
				echo '
				<FORM METHOD=POST ACTION="Approved/AddWorkOrder">
				<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
					 <table class="table table-bordered">
				<tbody>';
                echo '<TR><TD><h4>ProjectTitle</h4></TD>
                    <TD><h4>ProjectId</h4></TD>
                    <TD><h4>Description</h4></TD>
                    <TD><h4>ProjectCategory</TD>
                    <TD><h4>ProjectGrant</TD>
                    <TD><h4>Start_Date</TD>
					<TD><h4>End_Date</TD>
                    <TD><h4>Researcher1</TD>
                    <TD><h4>Researcher2</TD>
                    <TD><h4>Researcher3</h1></TD>
					<TD><h4>Select</h4></TD>
					</tbody>';
					 foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->ProjectId;
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
						 echo '<TD><INPUT TYPE="RADIO" NAME="Choice1" VALUE="'.$row->ProjectId.'"></TD></TR>';
					 }
					 echo '</tbody>
					 </TABLE>
					 <h3>Enter WorkOrder Number</h3> <input type="text" class="large" name="WorkId"></input> <br><br>
					 <INPUT TYPE=SUBMIT value="Add WorkOrderId">
					</FORM>';
	
					}
	}
	function AddWorkOrder()
	{
		$projectId=$_POST['Choice1'];
		$workId=$_POST['WorkId'];
		//echo 'the project Id and WorkorderId : '.$projectId.$workId;
		$this->load->model('project_model');
		$this->project_model->insertWorkOrder($projectId,$workId);
		$msg='The Project has been asssigned the Work Order Number';
		require('showMsg.php');
		$showMsg=new showMsg();
		$showMsg->index($msg,'admin');
	}
}
?>