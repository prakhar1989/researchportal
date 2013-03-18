<?PHP

class App_chairman extends CI_Controller {
	
	function index()
		{
			
			$data['myClass']=$this;
			$data['action']=0;
			//vridhi
			session_start();
			if($_SESSION['usertype']==1){
				$this->load->view('layout',$data);
			} elseif ($_SESSION['usertype']==2){
				$this->load->view('layoutComm',$data);
			} 
			/*elseif($_SESSION['usertype']==3){
				$this->load->view('layoutChairman',$data);
			}*/
			else{
			
			header("location:login");
			}
		}
	function load_php()
				{
				//echo '<p> App_chairman page </p>';
				//Load the project model
				$this->load->model('project_model');
				$stage='chairman_1';
				$Query= $this->project_model->project_stage($stage);
				
                echo "<h1>Chairman</h1>";
				echo '<TABLE class="table table-bordered">';
                echo '<TR><TD><h4>ProjectTitle</h4></TD><TD><h4>Description</h4></TD><TD><h4>ProjectCategory</h4></TD><TD><h4>ProjectGrant</h4></TD><TD><h4>App_Date</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</h4></TD><TD><h4>Researcher3 </h4></td></TR>';

					 foreach($Query->result() as $row)
					 {
						 
						 echo '<TR><TD>';
						 print $row->ProjectTitle;
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
						 echo '</td></tr>';
					 }
					 
				$stage='chairman_2';
				$Query= $this->project_model->project_stage($stage);
				foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						 print $row->ProjectTitle;
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
						 echo '</td></tr>';
					 }
				
				echo '</TABLE>';
                }
	
	}


?>
