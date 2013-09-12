<?PHP

class Conf_cancelled extends CI_Controller {
	
	function index()
		{
			
			$data['myClass']=$this;
			$data['action']=0;
			//$this->load->view('layout',$data);
			//vridhi
			session_start();
			if($_SESSION['usertype']==1){
				$this->load->view('layout',$data);
			} elseif ($_SESSION['usertype']==2 || $_SESSION['usertype']==6 || $_SESSION['usertype']==7){
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
				echo '<h1> Cancelled </h1>';
				//Load the project model
                //Query for the ongoign projects (PStatus==completed)
				// Display the results
                // For help: new_application.php
				$this->load->model('conference_model');
				$block = $_GET['block'];
				echo '<h3>Current Selected block year: Apr '.(2007+3*$block).' to Mar '.(2010+3*($block)).'</h3>';
				$status='cancelled';
				$Query= $this->conference_model->conference_blockwiseconference($status,$block);
				//$Query= $this->conference_model->conference_status($status);
				$Queryblock= $this->conference_model->conference_blocks($status);
				
				echo '<FORM name="cancelled"  method= "POST" action="Conf_cancelled/check">';
				
                    echo '<TABLE class="table table-bordered"> <thead>
							<tr>
							</tr>
					</thead>
					<tbody>';
					
					echo '<TR><TD>Please select the block year:</TD><TD colspan = 7>
						<select name=\'selectblock\'>'; 
						//echo '<option size =30 selected>Select</option>';
						//$blockindex = -1;
						if ($Queryblock->num_rows() <> 0)
						foreach($Queryblock->result() as $row1)
						{
						echo '<option size =30 >Apr '.(2007+3*($row1->Block_number)).' to Mar '.(2010+3*($row1->Block_number)).'</option>';
						//echo '<input type="hidden" name="blockselected" value='.$row1->Block_number.'>';
						}						
						else 
						{
						echo "<option>No Names Present</option>";  
						}
					echo '<INPUT TYPE=SUBMIT name="check" value="VIEW BLOCK" align=right></TD></TD></TR>';
					echo '</SELECT>';
					
					echo '<TR><TD><h4>Faculty Name</h4></TD><TD><h4>Conference Title</h4></TD><TD><h4>App_Date</h4></TD><TD><h4>Date of Conference</h4></TD><TD><h4>Paper Title</h4></TD><TD><h4>Co Researcher</h4></TD><TD><h4>Source of Funding</h4></TD><TD><h4>Comments</h4></TD><TD><h4>Title</h4></TD><TD><h4>Fees</h4></TD><TD><h4>Budget</h4></TD><TD><h4>Acceptance</h4></TD><TD><h4>Group Recommendation</h4></TD></TR>';
					 foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						// echo 'Apr '.(2007+3*($row->Block_number)).' to Mar '.(2010+3*($row->Block_number));
						// echo '</TD><TD>';
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
						 $Conf=$row->ConferenceId;
						 $Res=$this->conference_model->getcomment($Conf, $_SESSION['usertype']);
						 foreach($Res as $row1)
						 {
							 echo '<p>'.$row1->Date.' ; '.$row1->User.': '.$row1->Comment.'</p>';
						 }
						 echo'</TD><TD><p><a href="downloadfile?file=upload/'.$Conf.'_title">Download Conference Paper</a><br><br></p></TD>';
						 echo'<TD><a href="downloadfile?file=upload/'.$Conf.'_fees">Download Conference Registration Fees Details</a><br><br></TD>';
						 echo'<TD><a href="downloadfile?file=upload/'.$Conf.'_budget">Download Conference Budget Details</a><br><br></TD>';
						 echo'<TD><a href="downloadfile?file=upload/'.$Conf.'_acceptance">Download Acceptance Letter</a><br><br></TD>';
						 echo'<TD><a href="downloadfile?file=upload/'.$Conf.'_grouprecommendation">Download Group Recommendation</a><br><br></TD>';

						 echo '</TR>';
					 }
				echo '</TABLE></FORM>';
				}
				
		function check ()
		{
		session_start();
		
		$blockstring = $_POST['selectblock'];
		$this->load->model('conference_model');
		$status='cancelled';
		$Queryblock= $this->conference_model->conference_blocks($status);
		if ($Queryblock->num_rows() <> 0)
		{
			foreach($Queryblock->result() as $row1)
			{
			$str = 'Apr '.(2010+3*($row1->Block_number)).' to Mar '.(2013+3*($row1->Block_number));
			If ( $str == $blockstring)
				$block = $row1->Block_number;
			}
			header("Location: /rp/Conf_cancelled?block=".$block);
		}
		
		}
	
	}


?>
