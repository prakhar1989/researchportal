<?PHP

class FacultyRevExt extends CI_Controller {
	
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
				$this->load->model('project_model');
				//$result= $this->project_model->projectRevise($ProjectID);
				//$result1= $this->project_model-> project_extensionrevision_faculty($_SESSION['username']);
				//$result2= $this->project_model-> project_completionrevision_faculty($_SESSION['username']);
				//echo '<p> hello this is the Project Details Page </p>';
				// Display the results
				echo'
					<FORM METHOD=POST ACTION="FacultyRevSubmit">
					<table class="table table-bordered">
					<tr<><td></td></tr>
					<tbody>';
					echo '<p></br></p>';
					//echo 'Extension:Project Sent Back For Revision';
					echo '</tbody>
					</table>
					<Input Type = TEXT name="Period"></Input>
					<INPUT TYPE=Submit name ="RequestType" value="Edit">
					</FORM>';
                
				
				}
	
	/*function EditPeriod()
	{
	session_start();
	$ProjectID = $_SESSION['ProjectID'];
	$Period = $_Post["Period"];
	alert ("Hello");
	//alert ($Period);
	}*/
	
	}


?>