<?PHP

class FacultyProjRevision extends CI_Controller {
	
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
				$ProjectID = $this->input->post('ProjectChoice');
				//echo $ProjectID;
				//$_SESSION['ProjectID']=$ProjectID;
				//$_SESSION['ProjectID']=$ProjectID;
				//echo $ProjectID;
				//Load the project model
				$this->load->model('project_model');
				$result= $this->project_model->projectRevise($ProjectID);
				$result1= $this->project_model-> project_extensionrevision_faculty($_SESSION['username']);
				$result2= $this->project_model-> project_completionrevision_faculty($_SESSION['username']);
				//echo '<p> hello this is the Project Details Page </p>';
				// Display the results
				echo'
					<FORM METHOD=POST ACTION="/rp/FacultyRevisionCheck">
					<table class="table table-bordered">
					<tr<><td></td></tr>
					<TD><h4>ProjectTitle</h4></TD><TD><h4>ProjectId</h4></TD><TD><h4>Start Date</h4></TD><TD><h4>End Date</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</TD><TD><h4></h1></TD>
					
					<tbody>	
					<INPUT TYPE="HIDDEN" NAME="ProjectSelected" VALUE="'.$ProjectID.'">					
					';
					foreach($result->result() as $row)
						{
						echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->ProjectId;
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
						 echo '</TD>';
						 echo '<TD><INPUT TYPE="RADIO" NAME="ProjectSelected" VALUE="'.$row->ProjectId.'"></TD></TR>';
						}			 
					 echo '</tbody></TABLE>
					<INPUT TYPE=SUBMIT name ="RequestType" value="Edit New Application">
					
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
				
						<table class="table table-bordered">
					<TD><h4>ProjectTitle</h4></TD><TD><h4>ProjectId</h4></TD><TD><h4>Work Order Id</h4></TD><TD><h4>Start Date</h4></TD><TD><h4>End Date</h4></TD><TD><h4>Period</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</h1></TD><TD><h4>Comments</h1></TD><TD><h4>Select</h1></TD>
					
					<tbody>';
					echo '<p></br></p>';
					echo '<hr size=10 noshade color="#333333"><h3>Extension:Projects Sent Back For Revision</h3>';
					foreach($result1->result() as $row)
						{
						echo '<tr>
						<td>';
						 print $row->ProjectTitle;
						 echo '</td><TD>';
						 print $row->ProjectId;
						 echo '</td><TD>';
						 print $row->WorkOrderId;
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
						echo '</td><td>';
						$Result=$this->project_model->getComment($row->ProjectId, $_SESSION['usertype']);
						 foreach($Result as $row1)
						 {
							 echo '<p>'.$row1->Date.' ; '.$row1->User.': '.$row1->Comment.'</p>';
						 }
						 echo '</TD><TD><INPUT TYPE="RADIO" NAME="ProjectSelected" VALUE="'.$row->ProjectId.'"></TD></TR>';
						}			 
					 echo '</tbody>
					</table>
					<INPUT TYPE=SUBMIT name ="RequestType" value="Edit Extension">

				<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
				
						<table class="table table-bordered">
					<TD><h4>ProjectTitle</h4></TD><TD><h4>ProjectId</h4></TD><TD><h4>Work Order Id</h4></TD><TD><h4>Start Date</h4></TD><TD><h4>End Date</h4></TD><TD><h4>Period</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</h1></TD><TD><h4>Comments</h1></TD><TD><h4>Select</h1></TD>
					
					<tbody>';
					echo '<p></br></p>';
					echo '<hr size=10 noshade color="#333333"><h3>Completion:Projects Sent Back For Revision</h3>';
					foreach($result2->result() as $row)
						{
						echo '<tr>
						<td>';
						 print $row->ProjectTitle;
						 echo '</td><TD>';
						 print $row->ProjectId;
						 echo '</td><TD>';
						 print $row->WorkOrderId;
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
						echo '</td><td>';
						$Result=$this->project_model->getComment($row->ProjectId, $_SESSION['usertype']);
						 foreach($Result as $row1)
						 {
							 echo '<p>'.$row1->Date.' ; '.$row1->User.': '.$row1->Comment.'</p>';
						 }
						 echo '</TD><TD><INPUT TYPE="RADIO" NAME="ProjectSelected" VALUE="'.$row->ProjectId.'"></TD></TR>';
						}			 
					 echo '</tbody>
					</table>
					<INPUT TYPE=SUBMIT name ="RequestType" value="Edit Completion">

					</FORM>';
                
				
				}
	
	}


?>