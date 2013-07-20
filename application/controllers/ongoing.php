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
                echo '<tr><TD><h4>ProjectTitle</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</TD><TD><h4>Project Duration</TD><TD><h4>Extension (if any)</TD><TD><h4>Start Date</TD><TD><h4>End Date</TD><TD><h4>Work Order</h4></TD><TD><h4>Funding</h4></TD><TD><h4>Project Category</h4></TD><TD><h4>Reference Details (Category 2,3)</h4></TD><TD><h4>Budget</h4><TD><h4>Deliverables (Promised)</h4></TD><TD><h4>Select</h1></TD></tr>';
				/*echo '<TR><TD><h4>ProjectTitle</h4></TD>
					<TD><h4>Work Order Number</h4></TD>
                    
                    <TD><h4>Project Category</h4></TD>
                    <TD><h4>Project Grant</h4></TD>
                    <TD><h4>Start Date</h4></TD>
					<TD><h4>End Date</h4></TD>
                    <TD><h4>Researcher1</h4></TD>
                    <TD><h4>Researcher2</h4></TD>
                    <TD><h4>Researcher3</h4></TD>';
					//if($_SESSION['usertype']<>2)
					echo '<TD><h4>Select</h4></TD></tr></tbody>';*/
	 
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
						 
						/*$queryStr1='SELECT DATEDIFF(End_Date,Start_Date) AS diff FROM project WHERE ProjectId = "'.$row->ProjectId.'";';
						$query1= $this->db->query($queryStr1);
						foreach($query1->result() as $row1)
							{
							$diff = $row1->diff;
							}*/
						$queryStr1='SELECT * FROM projectextension WHERE ProjectId = "'.$row->ProjectId.'";';
						$query1= $this->db->query($queryStr1);
						$total_ext = 0;
						foreach($query1->result() as $row1)
							{
							$total_ext = $total_ext + $row1->Period;
							}
						//print intval($diff/31);
						print $row->ProjectDuration;
						 echo '</TD><TD>';
						 print $total_ext;
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
						 /*echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->WorkOrderId;
						 echo '</TD><TD>';
						 //print $row->Description;
						 //echo '</TD><TD>';
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
						 */
						 //if($_SESSION['usertype']<>2)
							echo '</TD><TD><INPUT TYPE="RADIO" NAME="ProjectSelected" VALUE="'.$row->ProjectId.'"></TD>';
							echo '</TD><TD><INPUT TYPE=SUBMIT value="Download Project Description" name="RequestType"></TD></TR>';
					 }
				echo '</TBODY></TABLE>';
				
				 //echo '<br><INPUT TYPE=SUBMIT value="Download Project Description" name="RequestType"><br><br>';
				
				//if($_SESSION['usertype']<>2)
				//echo '<INPUT TYPE=SUBMIT name="RequestType" value="Check Deliverables" onClick=checkDeliverables()>';
				//echo '<INPUT TYPE=SUBMIT name="RequestType" id="Check Deliverables" value="Show Details" onClick=checkDeliverables()>';
				echo '</FORM>';
				}
	
	}


?>
