<?PHP


// 1.Show the details of the selected project  
// 2. Approve or reject a project

class ShowProject extends CI_Controller {

	
    
	//calls the view to create the background etc.
	function index()
			{

				//echo '<p>Value received is '. $this->input->post('Choice1'). '</p>';
				session_start();
				$data['myClass']=$this;
				$data['action']=0;
				$this->load->view('layout',$data);
			}
    // Displays the details of the project
	function load_php()
			{
					 //echo 'load project called    ';
					 $Project = $this->input->post('Choice1');
					 //echo $Project;
					 $this->load->model('project_model');
					  //pass the projectId of the selected project
					 
					 echo '<FORM name="approveProject" method= POST action="ShowProject/approveProject">';
					 $Query= $this->project_model->projectInfo($Project);
					 echo '<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
					 ';
					 echo '<TR><TD><h4>ProjectTitle</h4></TD><TD><h4>ProjectId</h4></TD><TD><h4>Description</h4></TD><TD><h4>ProjectCategory</TD><TD><h4>ProjectGrant</TD><TD><h4>App_Date</TD><TD><h4>Researcher1;</TD><TD><h4>Researcher2</TD><TD><h4>Researcher3 </h1>';
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
					 echo '</TABLE>';
					 echo '<input type= submit value= "Approve" name="approve"><input type= submit value= "Reject" name="approve"><input type="hidden" name=projectID value="'.$Project.' " >'; //Hidden to pass the projectId without showing it to the user
					 echo '</FORM>';
				}
	
	//fucntion to approve or reject project based on the user's selection
	function approveProject(){
		session_start();
		$data['myClass']=$this;
		$data['action']=2;
		
		$this->load->model('project_model');
		
		//echo '@#usertype is :'.$_SESSION['usertype'];
		//echo 'project value:'.$_POST['projectID'];
		if($_POST['approve']=='Approve')
		{
			if($_SESSION['usertype']==1)
			{
				$Query= $this->project_model->changeStatus('app_comm',$_POST['projectID']);
			} 
			elseif ($_SESSION['usertype']==2)
			{
				$Query= $this->project_model->changeStatus('app_chairman',$_POST['projectID']);
			}
			elseif ($_SESSION['usertype']==3)
			{
				$Query= $this->project_model->changeStatus('approved',$_POST['projectID']);
			}
			
			//$this->load->view('layout',$data);
			$data['msg']='Approved';
		}
		else
		{
		    $Query= $this->project_model->changeStatus('rejected',$_POST['projectID']);
			$data['msg']='Rejected';
		}
		
		$this->load->view('layout',$data);
	}
	
	function approveMsg($status){
		if($status=='Approved')
			{
			echo 'Project has been Approved!!!!!';
			}
		else
			{
			echo 'Project has been Rejected';
			}
	}
}
?>