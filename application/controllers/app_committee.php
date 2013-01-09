<?PHP
//******** To show the projects lying for approval from committee ********************
class App_committee extends CI_Controller {
	
	function index()
		{
			
			$data['myClass']=$this;
			$data['action']=0;
			//$this->load->view('layout',$data);
			session_start();
			if($_SESSION['usertype']==1){
				$this->load->view('layout',$data);
			} 
			/*elseif ($_SESSION['usertype']==2){
				$this->load->view('layoutComm',$data);
			}*/ elseif($_SESSION['usertype']==3){
				$this->load->view('layoutChairman',$data);
			}
			else{
			
			header("location:login");
			}
		}
	function load_php()
				{
				//echo '<p> App_chairman page </p>';
				//Load the project model
				$this->load->model('project_model');
				$stage='comm';
				$Query= $this->project_model->project_stage($stage);
				
				echo '
				<h1>Committee Projects</h1>
						<table class="table table-bordered">
						<TR><TD><h4>ProjectTitle</h4></TD><TD><h4>ProjectId</h4></TD><TD><h4>Description</h4></TD><TD><h4>ProjectCategory</TD><TD><h4>ProjectGrant</TD><TD><h4>App_Date</TD><TD><h4>Researcher1</TD><TD><h4>Researcher2</TD><TD><h4>Researcher3 </h1></tr>
						<tbody>';

					 foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->ProjectId;
						 echo '</TD><TD>';
						 print $row->Description;
						 echo '</TD><TD>';
						 print $row->ProjectCategory;
						 echo '</TD><TD>';
						 print $row->ProjectGrant;
						 echo '</TD><TD>';
						 print $row->App_Date;
						 echo '</TD><TD>';
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Researcher3;
					 }
				echo '</tbody></TABLE>';
				}
	
	}


?>
