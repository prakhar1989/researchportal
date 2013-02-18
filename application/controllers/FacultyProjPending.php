<?PHP

class FacultyProjPending extends CI_Controller {
	
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
				$this->load->model('project_model');
				$result= $this->project_model-> projectPendingFaculty($_SESSION['username']);
				// Display the results
				echo'
					<FORM METHOD=POST ACTION="FacultyProjRequest">
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							<h1>Pending Projects</h1>
						<table class="table table-bordered">
					<TD><h4>ProjectTitle</h4></TD><TD><h4>Application Date</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</h4></td><td><h4>Pending At</h1></TD>
					
					<tbody>';
					echo 'New Applications';
					foreach($result->result() as $row)
						{
						echo '<tr>
						<td>';
						 print $row->ProjectTitle;
						 echo '</td><TD>';
						 print $row->Start_Date;
						 echo '</TD><TD>';
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Researcher3;
						 echo '</td><td>';
						 if (substr($row->PStatus,0,4)=='app_') {
							$temp = substr($row->PStatus,4);
							$status = preg_replace("/[^a-zA-Z]+/", "", $temp);
						 }
						 print $status;
						echo '</tr>';
						}			 
					 echo '</tbody>
					</table>
					
					
					</FORM>';
                
				
				}
	
	}


?>