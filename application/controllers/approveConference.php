<?PHP

class ApproveConference extends CI_Controller {

		function index()
		{
		$Recvd=$this->input->post('approve');
        echo $Recvd;
		//echo '<p>Value received is '. . '</p>';
		//foreach($Recvd->result() as $row)
							 {
							//	 print $row->ProjectTitle;
							 }

		//$data['myClass']=$this;
		//$this->load->view('layout',$data);
		}
}
?>