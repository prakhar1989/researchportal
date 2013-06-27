<?PHP

class FacultyProjOngoing extends CI_Controller {
	
	function index()
		{
					
					session_start();
					$data['myClass']=$this;
					$data['action']=0;
					if($_SESSION['usertype']==4){
						$this->load->view('layoutFaculty',$data);
					} 
					else{
			echo 'hello';
			header("location:login");
			}
		}
	function load_php()
				{
				$this->load->model('project_model');
				$result= $this->project_model->ongoingFacultyProjects($_SESSION['username']);
				//Load the project model
                //Query for the ongoign projects (!= completed and rejected)
				//$this->load->database();
				//$queryStr='SELECT * FROM project';
				//$query = $this->db->query($queryStr);
				// Display the results
				echo'
					<FORM METHOD=POST ACTION="FacultyProjShowDetails">
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							
					<h1>Ongoing Projects</h1>
						<table class="table table-bordered">
						<tr><TD><h4>ProjectTitle</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</TD><TD><h4>Project Duration</TD><TD><h4>Extension (if any)</TD><TD><h4>Start Date</TD><TD><h4>End Date</TD><TD><h4>Work Order</h4></TD><TD><h4>Funding</h4></TD><TD><h4>Project Category</h4></TD><TD><h4>Budget</h4><TD><h4>Deliverables (Promised)</h4></TD><TD><h4>Select</h1></TD></tr>';
					//<TD><h4>Project Title</h4></TD><TD><h4>Work Order Number</h4></TD><TD><h4>Start Date</h4></TD><TD><h4>End Date</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</h1></TD><TD><h4>Select</h1></TD>
					
					echo '<tbody>';
					foreach($result->result() as $row)
						{
						/*echo '<tr><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
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
						 echo '<TD><INPUT TYPE="RADIO" NAME="ProjectChoice" VALUE="'.$row->ProjectId.'"></TD></TR>';
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
						 print $row->ProjectGrant;
						 echo '</TD><TD>';
						 $deliverablesCount = $row->cases + $row->journals + $row->chapters + $row->conference + $row->paper + $row->books;
						 echo $deliverablesCount;
						 echo '</TD><TD><INPUT TYPE="RADIO" NAME="ProjectSelected" VALUE="'.$row->ProjectId.'"></TD>';
						 echo '</TD><TD><INPUT TYPE=SUBMIT value="Show Details"></TD></TR>';
						}
							 
					 echo '
					 </tbody>
					 </TABLE>';
					//<INPUT TYPE=SUBMIT value="Show Details">
					echo '</FORM>';
                // For help: new_application.php
				
				}
	
	}


?>