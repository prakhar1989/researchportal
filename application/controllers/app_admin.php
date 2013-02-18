<?PHP
// Object to show the projects that are waiting for the approval from admin
class App_admin extends CI_Controller {
	
	function index()
		{
			
			$data['myClass']=$this;
			$data['action']=0;
			//$this->load->view('layout',$data);
			//vridhi
			session_start();
			//if($_SESSION['usertype']==1){				//this is page showing application pending with admin for approval; 
			//	$this->load->view('layout',$data);		//page is meant for chairman and committee; so should nt be accessible to admin
			//} else									//admin can see such projects under the "New application" tab
			if ($_SESSION['usertype']==2){
				$this->load->view('layoutComm',$data);
			} elseif($_SESSION['usertype']==3){
				$this->load->view('layoutChairman',$data);
			}
			else{
			echo 'hello';
			header("location:login");
			}
		}
	function load_php()
				{
				//echo '<p> App_chairman page </p>';
				//Load the project model
				$this->load->model('project_model');
				$stage='admin';
				$Query= $this->project_model->project_stage($stage);
				
				echo '<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
					 ';
					 echo '<TR><TD><h4>ProjectTitle</h4></TD><TD><h4>Description</h4></TD><TD><h4>ProjectCategory</TD><TD><h4>ProjectGrant</TD><TD><h4>App_Date</TD><TD><h4>Researcher1;</TD><TD><h4>Researcher2</TD><TD><h4>Researcher3 </h1>';

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
					 }
				echo '</TABLE>';
                }
	
	}


?>