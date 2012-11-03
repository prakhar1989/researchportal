<?PHP
// Show the msg passed for Faculty 
class ShowMsg extends CI_Controller {
		function index($msg,$user)
		{
		
		$data['myClass']=$this; // passing the object for callback
		$data['msg']=$msg;
		$data['action']=1;      // what spl action to do for this layout
		if($user=='admin')
		{
		$this->load->view('layout',$data);
		}
		elseif($user=='faculty')
		{
		$this->load->view('layoutFaculty',$data);
		}
		
		}
		
		function load_php($msg)
		{
		 
		 echo '<h4>'.$msg.'</h4>';  
		}
}
?>