<?PHP

class FacultyProjCompleted extends CI_Controller {
	
	function index()
		{
			
		$data['myClass']=$this;
		$data['action']=0;
		session_start();
		if($_SESSION['usertype']==4){
		$this->load->view('layoutFaculty',$data);
		} 
		else{
		header("location:login");
		}
		}
	function load_php()
				{
				$user = $_SESSION['username'];
				$this->load->database();
				$this->load->model('project_model');
				$result= $this->project_model-> projectCompleteFaculty($user);
				// Display the results
				echo'
					<FORM METHOD=POST ACTION="FacultyProjRequest">
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							<h1>Completed Projects</h1>
						<table class="table table-bordered">
					<tr><TD><h4>ProjectTitle</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</TD><TD><h4>Project Duration</TD><TD><h4>Extension (if any)</TD><TD><h4>Start Date</TD><TD><h4>End Date</TD><TD><h4>Work Order</h4></TD><TD><h4>Funding</h4></TD><TD><h4>Project Category</h4></TD><TD><h4>Budget</h4><TD><h4>Deliverables</h4></TD><TD><h4>Select</h1></TD></tr>';
					
					//<TD><h4>Project Title</h4></TD><TD><h4>Work Order Number</h4></TD><TD><h4>Start Date</h4></TD><TD><h4>End Date</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</h4></TD><TD><h4>Project Grant</h4></TD><TD><h4>Project Category</h1></TD>
					
					//<tbody>';
					echo '<tbody>';
					
					foreach($result->result() as $row)
						{
						/*echo '<tr>
						<td>';
						 print $row->ProjectTitle;
						 echo '</td><TD>';
						 print $row->WorkOrderId;
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
						 print $row->ProjectGrant;
						 echo '</TD><TD>';
						 print $row->ProjectCategory;
						 echo '<TD><INPUT TYPE="RADIO" NAME="ProjectSelected" VALUE="'.$row->ProjectId.'"></TD></TR>';
						 */
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
						
						//print intval($diff/31);
						$queryStr1='SELECT * FROM projectextension WHERE ProjectId = "'.$row->ProjectId.'";';
						$query1= $this->db->query($queryStr1);
						$total_ext = 0;
						foreach($query1->result() as $row1)
							{
							$total_ext = $total_ext + $row1->Period;
							}

						print $row->ProjectDuration;
						 echo '</TD><TD>';
						print $row->$total_ext;
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
						 echo '</TD><TD><INPUT TYPE="RADIO" NAME="ProjectSelected" VALUE="'.$row->ProjectId.'"></TD>';
						 echo '</TD><TD><INPUT TYPE=SUBMIT name="RequestType" value="Check Deliverables"></TD></TR>';
						}			 
					 echo '</tbody>
					</table>';
					//<INPUT TYPE=SUBMIT name="RequestType" value="Check Deliverables">
					/*echo '<br><hr size=10 noshade color="#333333"><h3>Files Uploaded</h3>';
					$queryStr='Select * from project where ((Researcher1 =\''.$user.'\' OR Researcher2 = \''.$user.'\' OR Researcher3 = \''.$user.'\') AND PStatus = "completed")';
					$query = $this->db->query($queryStr);
					If ($query->num_rows() == 0)
						echo 'No projects are Complete as of today.';
					Else
					{
						foreach ($query->result() as $row)
						{
						echo 'Project Title: '.$row->ProjectTitle;
						echo '<br>';
						$Path = "upload/".$row->ProjectId."_";
						$Files = glob($Path."*.pdf");
						foreach ($Files as $File)
							{	
							echo'<a href="download?file='.$File.'">'.$File.'</a><br><br>';
							echo '<br>';
							}
						echo '<br><br>';
						}
					}*/
					echo '</FORM>';
                
				
				}
	
	}


?>