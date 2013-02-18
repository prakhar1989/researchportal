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
					<TD><h4>Project Title</h4></TD><TD><h4>Work Order Number</h4></TD><TD><h4>Start Date</h4></TD><TD><h4>End Date</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</h4></TD><TD><h4>Project Grant</h4></TD><TD><h4>Project Category</h1></TD>
					
					<tbody>';
					foreach($result->result() as $row)
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
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Researcher3;
						 echo '</TD><TD>';
						 print $row->ProjectGrant;
						 echo '</TD><TD>';
						 print $row->ProjectCategory;
						 echo '</tr>';
						}			 
					 echo '</tbody>
					</table>';
					
					echo '<br><br><hr size=10 noshade color="#333333"><h3>Files Uploaded</h3>';
					$queryStr='Select * from project where ((Researcher1 =\''.$user.'\' OR Researcher2 = \''.$user.'\' OR Researcher3 = \''.$user.'\') AND PStatus = "completed")';
					$query = $this->db->query($queryStr);
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
					echo '</FORM>';
                
				
				}
	
	}


?>