<?PHP

class FacultyRevisionCheckSubmit extends CI_Controller 
{
	function index()
		{			
		$data['myClass']=$this;
		$data['action']=0;
		$this->load->view('layoutfaculty',$data);
		}
	function load_php()
		{
		session_start();
		$ProjectId = $_SESSION['ProjectID'];
		//$temp = $_POST['txt'];
		//echo $temp;
		echo $ProjectId;
		$i = $_POST['i'];
		echo $i;
		$ext = end(explode('.', $_FILES["element_5"]["name"]));
		echo $ext;
		move_uploaded_file($_FILES["element_5"]["tmp_name"],"upload/".$ProjectId.'.'.$ext);
	
		for ($j=1; $j < $i ; $j++)
			{
			$ext=end(explode('/', $_FILES['file_desc_'.$j]['type']));
			move_uploaded_file($_FILES['file_desc_'.$j]["tmp_name"],"upload/" . $ProjectId.'_'.$j.$ext);		           
			}
		}
}
?>