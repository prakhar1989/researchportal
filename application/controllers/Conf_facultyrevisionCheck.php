<?PHP

class Conf_facultyrevisionCheck extends CI_Controller {
	
	function index()
		{
			
			ini_set( "display_errors", 0); 
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
				$this->load->model('conference_model');
				$_SESSION['ConferenceID'] = $_POST['ConferenceSelected'];
				$ConferenceID = $_POST['ConferenceSelected'];
				
				echo '<FORM METHOD=POST action="Conf_facultyrevisioncheck/insert" enctype="multipart/form-data">';
				if ($_POST['RequestType'] == 'Edit')
					{
					//echo 'asd';
					header("Location: /rp/Conf_FacultyReviseApp");
					}
				
			}
	
	}


?>