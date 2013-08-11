<?PHP

class Conf_Completed extends CI_Controller {
	
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
				echo '<h1> Archived </h1>';
				//Load the project model
                //Query for the ongoign projects (PStatus==completed)
				// Display the results
                // For help: new_application.php
				$block = $_GET['block'];
				echo '<h3>Current Selected block year: Apr '.(2010+3*$block).' to Mar '.(2013+3*($block)).'</h3>';
				$this->load->model('conference_model');
				$status='completed';
				$Query= $this->conference_model->conference_blockwiseconference($status,$block);
				$Queryblock= $this->conference_model->conference_blocks($status);
				
				//echo "Total number of rows returned:".$Queryblock->num_rows();
				
					echo '<FORM name="archived" class = "cmxform" id="archivedForm" method= "POST" action="ShowArchiveConf">';
					/*echo '<div id="tabbar" class="usual"><div class="container"><div style="display: none">
					<ul>
                        <li><a href="/rp/Conf_new_application">11</a> </li>
                        <li><a href="/rp/Conf_ongoing">22</a> </li>
                        <li><a href="/rp/Conf_app_chairman">33</a> </li>
                        <li><a href="/rp/Conf_app_committee">44</a> </li>
						<li><a href="/rp/Conf_completed">55</a> </li>
                        <li><a href="/rp/Conf_cancelled">77</a> </li>
                        <li><a href="/rp/Conf_search">88</a> </li>
                        
                    </ul></div></div></div>';
					*/
					
                    echo '<TABLE class="table table-bordered"> <thead>

							<tr>
							</tr>
					</thead>
					<tbody>';
					echo '<TR><TD>Please select the block year:</TD><TD colspan = 8>
						<select name=\'selectblock\'>'; 
						//echo '<option size =30 selected>Select</option>';
						//$blockindex = -1;
						if ($Queryblock->num_rows() <> 0)
						foreach($Queryblock->result() as $row1)
						{
						echo '<option size =30 >Apr '.(2010+3*($row1->Block_number)).' to Mar '.(2013+3*($row1->Block_number)).'</option>';
						//echo '<input type="hidden" name="blockselected" value='.$row1->Block_number.'>';
						}						
						else 
						{
						echo "<option>No Names Present</option>";  
						}
					echo '<INPUT TYPE=SUBMIT name="check" value="VIEW BLOCK" align=right></TD></TD></TR>';
					echo '</SELECT>';
					echo '<TR><TD><h4>Block</h4></TD><TD><h4>Faculty Name</h4></TD><TD><h4>Conference Title</h4></TD><TD><h4>App_Date</h4></TD><TD><h4>Date of Conference</h4></TD><TD><h4>Paper Title</h4></TD><TD><h4>Co Researcher</h4></TD><TD><h4>Source of Funding</h4></TD><TD><h4>Select</h4></TD><TD></TD></TR>';
					 foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						 echo 'Apr '.(2010+3*($row->Block_number)).' to Mar '.(2013+3*($row->Block_number));
						 echo '</TD><TD>';
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
						 echo '</TD><TD><INPUT TYPE="RADIO" NAME="Choice1" VALUE="'.$row->ConferenceId;
						 echo '"></TD>';
						 echo '<TD><INPUT TYPE=SUBMIT value="VIEW" name="check"></TD></TR>';
					 }
				echo '</TABLE></FORM>';
				}
				
				
	
	}


?>
