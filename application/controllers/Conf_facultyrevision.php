<?PHP

class Conf_facultyrevision extends CI_Controller {
	
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
				}
	
	}


?>