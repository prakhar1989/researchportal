<?PHP

class FacultyRevSubmit extends CI_Controller {
	
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
				//echo $ProjectID;
				//Load the project model
				$this->load->database();
				$this->load->model('project_model');
				$ProjectID = $_SESSION['ProjectID'];
				$Period = $_POST['Period'];
				$queryStr1='Select ApprovalPending from projectextension where ProjectId = "'.$ProjectID.'";';
				$query1 = $this->db->query($queryStr1);
				//echo '<p> hello this is the Project Details Page </p>';
				// Display the results
				//echo $ProjectID;
				//echo $Period;
				echo'
					<FORM METHOD=POST ACTION="">
					<table class="table table-bordered">
					<tr<><td></td></tr>
					<tbody>';
					echo '<p></br></p>';
					foreach($query1->result() as $row)
					{
					If ($row->ApprovalPending == 'revisionChairman')
						{
						$queryStr2='UPDATE projectextension SET ApprovalPending = "admin", Period =  "'.$Period.'" where ProjectId = "'.$ProjectID.'";';
						$query2 = $this->db->query($queryStr2);
						echo 'Extension:Project Sent Back For Revision';
						}
					Else If ($row->ApprovalPending == 'revisionAdmin')
						{
						$queryStr2='UPDATE projectextension SET ApprovalPending = "admin", Period =  "'.$Period.'" where ProjectId = "'.$ProjectID.'";';
						$query2 = $this->db->query($queryStr2);
						echo 'Extension:Project Sent Back For Revision';
						}
					}
					echo '</tbody>
					</table>
					</FORM>';
                
				
				}
	
	
	}


?>