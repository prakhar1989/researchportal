<?PHP

class Approved extends CI_Controller 
{
	
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
				//echo '<h1> Approved Applications </h1>';
				echo '<h1> Approved from Chairman </h1>';
				//Load the project model
                //Query for the ongoing projects (!= completed and rejected)
				// Display the results
                
				$this->load->model('project_model');
				$status='approved';
				$Query= $this->project_model->project_status($status);
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
				
				echo '<tr><TD><h4>ProjectTitle</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</TD><TD><h4>Project Duration</TD><TD><h4>Start Date</TD><TD><h4>End Date</TD><TD><h4>Work Order</h4></TD><TD><h4>Funding</h4></TD><TD><h4>Project Category</h4></TD><TD><h4>Reference Details (Category 2,3)</h4></TD><TD><h4>Budget</h4><TD><h4>Deliverables</h4></TD><TD><h4>Select</h1></TD></tr>';
                /*echo '<TR><TD><h4>ProjectTitle</h4></TD>
                    <TD><h4>Description</h4></TD>
                    <TD><h4>ProjectCategory</TD>
                    <TD><h4>ProjectGrant</TD>
                    <TD><h4>Start_Date</TD>
					<TD><h4>End_Date</TD>
                    <TD><h4>Researcher1</TD>
                    <TD><h4>Researcher2</TD>
                    <TD><h4>Researcher3</h1></TD>
					<TD><h4>Select</h4></TD>';*/
					 foreach($Query->result() as $row)
					 {
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
						 print $row->Reference;
						 echo '</TD><TD>';
						 print $row->ProjectGrant;
						 echo '</TD><TD>';
						 $deliverablesCount = $row->cases + $row->journals + $row->chapters + $row->conference + $row->paper + $row->books;
						 echo $deliverablesCount;
						 
						 
						 echo '</TD><TD><INPUT TYPE="RADIO" NAME="Choice1" VALUE="'.$row->ProjectId.'"></TD></TR>';
						 $Id=$row->ProjectId;
					 }
					 echo '</tbody></TABLE>';
					 if ($_SESSION['usertype']==1)
					{
					 //$size = filesize('upload/54_description.pdf');
					 //echo $size;
					 echo'<br><INPUT TYPE=SUBMIT value="Print" name="Check"><br><br>';
					 //echo '<p>Please enter comments for appoving/rejecting (mandatory)*</p><p><textarea name="comment"></textarea></p>';
					}
					 echo '<br><INPUT TYPE=SUBMIT value="Download Project Description" name="Check"><br><br>
					 <h3>Enter WorkOrder Number</h3> <input type="text" class="large" name="WorkId"></input> <br><br>
					 <INPUT TYPE=SUBMIT value="Add WorkOrderId" name="Check">
					</FORM>';
	
					}
	}
	function AddWorkOrder()
	{
		session_start();
		if($_POST['Check']=='Add WorkOrderId')
		{
			$Project = $this->input->post('Choice1');
			$workId=$_POST['WorkId'];
			$timezone = new DateTimeZone("Asia/Kolkata" );
			$date = new DateTime();
			$date->setTimezone($timezone );
			$this->load->model('project_model');
			$this->project_model->insertWorkOrder($Project,$workId);
			$this->project_model->insertDate($Project,$date);
			$msg='The Project has been asssigned the Work Order Number';
			require('showMsg.php');
			$showMsg=new showMsg();
			$showMsg->index($msg,'admin');
		}
		elseif($_POST['Check']=='Download Project Desciption')
		{
		$Project = $this->input->post('Choice1');
		header("location:/rp/downloadfile?file=upload/".$Project."_description");
		}
		elseif ($_POST['Check']=='Print')
		{
		$Project = $this->input->post('Choice1');
		header("location:/rp/printfile?file=".$Project);
		}
	}
}
?>