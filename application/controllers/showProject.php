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
//				session_start();
			if($_SESSION['usertype']==1){
				$this->load->view('layout',$data);
			} elseif ($_SESSION['usertype']==2){
				$this->load->view('layoutComm',$data);
			} elseif($_SESSION['usertype']==3){
				$this->load->view('layoutChairman',$data);
			}
			else{
			
			header("location:login");
			}
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
					 echo '<table class="table table-bordered"> 
					
					 <thead>
							<tr>
							</tr>
					</thead>
					<tbody>';
					 $tableHeader= '<TR><TD><h4>ProjectTitle</h4></TD><TD><h4>ProjectId</h4></TD><TD><h4>ProjectCategory</TD><TD><h4>ProjectGrant</TD><TD><h4>App_Date</TD><TD><h4>Researcher1</TD><TD><h4>Researcher2</TD><TD><h4>Researcher3 </h4>';
					 foreach($Query->result() as $row)
					 {
						if ($row->cases!=0)
						{
						 $tableHeader= $tableHeader.'<TD><h4>Cases</h4>';
						}
						if ($row->journals!=0)
						{
						 $tableHeader= $tableHeader.'<TD><h4>Journals</h4>';
						}
						if ($row->chapters!=0)
						{
						 $tableHeader= $tableHeader.'<TD><h4>Chapters</h4>';
						}
						if ($row->conference!=0)
						{
						 $tableHeader= $tableHeader.'<TD><h4>Conferences</h4>';
						}
						if ($row->paper!=0)
						{
						 $tableHeader= $tableHeader.'<TD><h4>Papers</h4>';
						}
						$tableHeader= $tableHeader.'</TR>';
					 }
					 
					 echo $tableHeader;
					 //echo '<TR><TD><h4>ProjectTitle</h4></TD><TD><h4>ProjectId</h4></TD><TD><h4>ProjectCategory</TD><TD><h4>ProjectGrant</TD><TD><h4>App_Date</TD><TD><h4>Researcher1</TD><TD><h4>Researcher2</TD><TD><h4>Researcher3 </h1>';
					 foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->ProjectId;
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
						if ($row->cases!=0)
						{
						 echo '</TD><TD>';
						 print $row->cases;
						}
						if ($row->journals!=0)
						{
						 echo '</TD><TD>';
						 print $row->journals;
						}
						if ($row->chapters!=0)
						{
						 echo '</TD><TD>';
						 print $row->chapters;
						}
						if ($row->conference!=0)
						{
						 echo '</TD><TD>';
						 print $row->conference;
						}
						if ($row->paper!=0)
						{
						 echo '</TD><TD>';
						 print $row->paper;
						}
					 }
					 
					 echo '</tbody> </TABLE>';

					$Result= $this->project_model->getcomment($Project, $_SESSION['usertype']);
					 echo '<table class="table table-bordered"> 
					
					 <thead>
							<tr>
							</tr>
					</thead>
					<tbody>';
					 $tableHeader= '<TR><TD><h4>Comment</h4></TD><TD><h4>Comment Type</h4></TD><TD><h4>Added by user</h4></TD><TD><h4>Added on</h4>';
					 
					 echo $tableHeader;
					 foreach($Result as $row1)
					 {
						 echo '<TR><TD>';
						 print $row1->Comment;
						 echo '</TD><TD>';
						 print $row1->Comment_type;
						 echo '</TD><TD>';
						 print $row1->User;
						 echo '</TD><TD>';
						 print $row1->Date;
						
					 }
					 
					 echo '</tbody> </TABLE>';


					 //$size = filesize('upload/54_description.pdf');
					 //echo $size;
					 echo'<a href="downloadfile?file='.$row->ProjectId.'_description.pdf">Download Description file</a><br><br>';
					 echo '<p>Please enter comments for appoving/rejecting (mandatory)*</p><p><textarea name="comment"></textarea></p>';
					 echo '<input type= submit value= "Approve" name="approve"><input type= submit value= "Reject" name="approve"><input type="hidden" name=projectID value="'.$Project.' " >'; //Hidden to pass the projectId without showing it to the user
					 echo '</FORM>';
				}
	
	//function to approve or reject project based on the user's selection
	function approveProject(){
		session_start();
		$data['myClass']=$this;
		$data['action']=2;
			
		
		$this->load->model('project_model');
		
		//echo '@#usertype is :'.$_SESSION['usertype'];
		//echo 'project value:'.$_POST['projectID'];
		if($_POST['approve']=='Approve')
		{
			$data['msg']='Approved';
			if($_SESSION['usertype']==1)
			{
				$Query= $this->project_model->changeStatus('app_comm',$_POST['projectID']);
				$this->project_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['projectID'],addslashes(trim($_POST['comment'])),"admin_approve");
				$this->load->view('layout',$data);
			} 
			elseif ($_SESSION['usertype']==2)
			{
				$Query= $this->project_model->changeStatus('app_chairman',$_POST['projectID']);
				$this->project_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['projectID'],addslashes(trim($_POST['comment'])),"committee_approve");
				$this->load->view('layoutComm',$data);
			}
			elseif ($_SESSION['usertype']==3)
			{
				$Query= $this->project_model->changeStatus('approved',$_POST['projectID']);
				$this->project_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['projectID'],addslashes(trim($_POST['comment'])),"chairman_approve");
				$this->load->view('layoutChairman',$data);
			}
			else
			{
			
			header("location:login");
			}

			
			//$this->load->view('layout',$data);

		}
		else
		{
		    $Query= $this->project_model->changeStatus('rejected',$_POST['projectID']);
			$data['msg']='Rejected';
			if($_SESSION['usertype']==1)
			{
							$this->project_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['projectID'],addslashes(trim($_POST['comment'])),"admin_reject");
							$this->load->view('layout',$data);
			}
			elseif ($_SESSION['usertype']==2)
			{
							$this->project_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['projectID'],addslashes(trim($_POST['comment'])),"committee_reject");
							$this->load->view('layoutComm',$data);
			}
			elseif ($SESSION['usertype']==3)
			{
							$this->project_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['projectID'],addslashes(trim($_POST['comment'])),"chairmain_reject");
							$this->load->view('layoutChairman',$data);
			}
			else{
			
			header("location:login");
			}

			
		}
		
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