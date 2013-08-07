<?PHP


// 1.Show the details of the selected project  
// 2. Approve or reject a project

class ShowProject extends CI_Controller {

	
    
	//calls the view to create the background etc.
	function index(){

				//echo '<p>Value received is '. $this->input->post('Choice1'). '</p>';
				session_start();
				$data['myClass']=$this;
				$data['action']=0;

			if($_SESSION['usertype']==1){
				$this->load->view('layout',$data);
			} elseif ($_SESSION['usertype']==2){
				$this->load->view('layoutComm',$data);
			} elseif($_SESSION['usertype']==3){
				$this->load->view('layoutChairman',$data);
			}
			else{
			
			header("location:/rp/login");
			}
			}
    // Displays the details of the project
	function load_php(){
					 //echo 'load project called    ';
					 $Project = $this->input->post('Choice1');
					 //echo $Project;
					 $this->load->model('project_model');
					  //pass the projectId of the selected project
					 
					 echo '
				   <script src="/rp/static/js/jquery-latest.js"></script>
				   <script type="text/javascript" src="/rp/static/js/jquery.validate.js"></script>
				   <style type="text/css">
				   * { font-family: Verdana; font-size: 96%; }
				   label { width: 10em; float: left; }
				   label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
				   p { clear: both; }.submit { margin-left: 12em; }
				   em { font-weight: bold; padding-right: 1em; vertical-align: top; }
				   </style>
				   <script>
				   $(document).ready(function(){
				   $("#commentForm").validate();
				   });
				   </script>
				   <FORM name="approveProject" class = "cmxform" id="commentForm" method= "POST" action="ShowProject/approveProject">';

					 $Query= $this->project_model->projectInfoNewProject($Project);
					 echo '<table class="table table-bordered"> 
					
					 <thead>
							<tr>
							</tr>
					</thead>
					<tbody>';
					 
					 foreach($Query->result() as $row)
					 {
					If ($row->cases!=0 OR  $row->journals!=0 OR $row->chapters!=0 OR $row->conference!=0 OR $row->paper!=0 OR $row->books!=0)
						{

						$tableHeader= '<TR><TD rowspan="2"><h4>ProjectTitle</h4></TD><TD rowspan="2"><h4>Work Order Number</h4></TD><TD rowspan="2"><h4>ProjectCategory</TD><TD rowspan="2"><h4>Reference Details (Category 2,3)</TD><TD rowspan="2"><h4>ProjectGrant</TD><TD rowspan="2"><h4>App_Date</TD><TD rowspan="2"><h4>Researcher1</TD><TD rowspan="2"><h4>Researcher2</TD><TD rowspan="2"><h4>Researcher3 </h4>';
						/*if ($_SESSION['usertype']==3)
						{$tableHeader= $tableHeader.'<TD><h4>Committee consulted</h4>';
						}*/
						$tableHeader= $tableHeader.'<TD><h4>Deliverables</h4></TD></TR><TR>';
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
						if ($row->books!=0)
						{
						 $tableHeader= $tableHeader.'<TD><h4>Books</h4>';
						}
						$tableHeader= $tableHeader.'</TR>';
						}
					else
						{
						$tableHeader= '<TR><TD><h4>ProjectTitle</h4></TD><TD><h4>Work Order Number</h4></TD><TD><h4>ProjectCategory</TD><TD><h4>Reference Details (Category 2,3)</TD><TD><h4>ProjectGrant</TD><TD><h4>App_Date</TD><TD><h4>Researcher1</TD><TD><h4>Researcher2</TD><TD ><h4>Researcher3 </h4>';
						/*if ($_SESSION['usertype']==3)
						{$tableHeader= $tableHeader.'<TD><h4>Committee consulted</h4>';
						}*/
						}
						$tableHeader= $tableHeader.'</TR>';
					 }
					 $tableHeader= $tableHeader.'</TR>';
					 echo $tableHeader;
					 //echo '<TR><TD><h4>ProjectTitle</h4></TD><TD><h4>Work Order Id</h4></TD><TD><h4>ProjectCategory</TD><TD><h4>ProjectGrant</TD><TD><h4>App_Date</TD><TD><h4>Researcher1</TD><TD><h4>Researcher2</TD><TD><h4>Researcher3 </h1>';
					 foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->WorkOrderId;
						 echo '</TD><TD>';
						 print $row->ProjectCategory;
						 echo '</TD><TD>';
						 print $row->Reference;
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
						 echo '</TD>';
						 /*if ($_SESSION['usertype']=='3' && $row->PStatus=='app_chairman_2')
						 {
							echo 'YES';
						 }
						 else if ($_SESSION['usertype']=='3' && $row->PStatus!='app_chairman_2')
						 {
							echo 'NO';
						 }*/
						 
						 
						if ($row->cases!=0)
						{
						 echo '</td><TD>';
						 print $row->cases;
						}
						if ($row->journals!=0)
						{
						 echo '</td><TD>';
						 print $row->journals;
						}
						if ($row->chapters!=0)
						{
						 echo '</td><TD>';
						 print $row->chapters;
						}
						if ($row->conference!=0)
						{
						 echo '</td><TD>';
						 print $row->conference;
						}
						if ($row->paper!=0)
						{
						 echo '</td><TD>';
						 print $row->paper;
						}
						if ($row->books!=0)
						{

						 echo '</td><TD>';

						 print $row->books;
						 echo '</td>';
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
					
					echo'<a href="downloadfile?file=upload/'.$Project.'_description">Download Project Description file</a><br><br>';
					
					if ($_SESSION['usertype']==1)
					{
					 echo'<a href="printfile?file='.$Project.'" target="_blank">Print</a><br><br>';
					 //echo '<p>Please enter comments for appoving/rejecting (mandatory)*</p><p><textarea name="comment"></textarea></p>';
					}
					
					if ($_SESSION['usertype']!=2)
					{
					 echo '<p>Please enter comments for appoving/rejecting (mandatory)*</p>
					 <p> <label for="cname">Name</label>
					<em>*</em><input id="cname" name="name" size="25" class="required" minlength="2" /></p>
					 <p><textarea name="comment"></textarea></p>';
					}
					
					 if ($_SESSION['usertype']==1)
					 {
					 echo '<input type= submit value= "Forward To Chairman" name="approve"><input type= submit value= "Send for Revision" name="approve"><input type="hidden" name=projectID value="'.$Project.' " >'; //Hidden to pass the projectId without showing it to the user
					 }
					 else if ($_SESSION['usertype']==2)
					 {
					 echo '<input type= submit value= "Forward With Approval" name="approve"><input type="hidden" name=projectID value="'.$Project.' " >'; //Hidden to pass the projectId without showing it to the user
					 }
					 else
					 {
						if ($_SESSION['usertype']=='3' && $row->PStatus=='app_chairman_2' || $row->PStatus=='app_comm')
						{
							$commStr= '';
							if($row->comm_approval == 0){
							$commStr = $commStr."No Committee Member ";
							}
							
							if($row->comm_approval == 2 || $row->comm_approval == 5 || $row->comm_approval == 6 || $row->comm_approval == 9){
							$commStr = $commStr."Committee1 ";
							}
							if($row->comm_approval == 3 || $row->comm_approval == 5 || $row->comm_approval == 7 || $row->comm_approval == 9){
							$commStr = $commStr."Committee2 ";
							}
							if($row->comm_approval == 4 || $row->comm_approval == 6 || $row->comm_approval == 7 || $row->comm_approval == 9){
							$commStr = $commStr."Committee3";
							}
							echo '<h4>Approved by ';
							echo $commStr;
							echo '</h4>';
							echo '<input type= submit value= "Approve" name="approve"><input type= submit value= "Revision" name="approve"><input type="hidden" name=projectID value="'.$Project.' " >';
						}
						elseif ($_SESSION['usertype']=='3' && $row->PStatus=='app_chairman_1')
						{
							echo '<input type= submit value= "Forward To Committee" name="approve"><input type= submit value= "Review" name="approve"><input type="hidden" name=projectID value="'.$Project.' " >';
						}						
					 }
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
		if($_POST['approve']=='Approve' OR $_POST['approve']=='Forward To Committee' OR $_POST['approve']=='Forward To Chairman' OR $_POST['approve']=='Forward With Approval')
		{
			$data['msg']='Approved';
			if($_SESSION['usertype']==1)
			{
				
				$Query= $this->project_model->changeStatus('app_chairman_1',$_POST['projectID']);
				$this->project_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['projectID'],addslashes(trim($_POST['comment'])),"admin_forward");
				$this->load->view('layout',$data);
			} 
			elseif ($_SESSION['usertype']==2)
			{
				if($_SESSION['username']=="comm")
					$Query= $this->project_model->changeStatusComm(2,'app_chairman_2',$_POST['projectID']);
				elseif($_SESSION['username']=="comm1")
					$Query= $this->project_model->changeStatusComm(3,'app_chairman_2',$_POST['projectID']);
				elseif($_SESSION['username']=="comm2")
					$Query= $this->project_model->changeStatusComm(4,'app_chairman_2',$_POST['projectID']);
				
				//$this->project_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['projectID'],addslashes(trim($_POST['comment'])),"committee_approve");
				$this->load->view('layoutComm',$data);
			}
			elseif ($_SESSION['usertype']==3 && $_POST['approve']=='Approve')
			{
				
				$Query= $this->project_model->changeStatus('approved',$_POST['projectID']);
				$this->project_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['projectID'],addslashes(trim($_POST['comment'])),"chairman_approve");
				$this->load->view('layoutChairman',$data);
			}
			elseif($_SESSION['usertype']==3 && $_POST['approve']=='Forward To Committee')
			{
				$to = "nippagupta@iimcal.ac.in";
				$subject = "New Project Consultation";
				$message = "Hello,
				Chairman has sent a new project for consultation";
				$from = "fpoffice@iimcal.ac.in";
				$headers = "From:" . $from;
				$stat = mail($to,$subject,$message,$headers);
				//echo $stat;
				$Query= $this->project_model->changeStatus('app_comm',$_POST['projectID']);
				$this->project_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['projectID'],addslashes(trim($_POST['comment'])),"chairman_approve");
				$this->load->view('layoutChairman',$data);
			}
			else
			{
			header("location:/rp/login");
			}

			
			//$this->load->view('layout',$data);

		}
		else
		{
		    
			$data['msg']='Rejected';
			if($_SESSION['usertype']==1)
			{
							$Query= $this->project_model->changeStatus('revisionAdmin',$_POST['projectID']);
							$this->project_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['projectID'],addslashes(trim($_POST['comment'])),"admin_reject");
							$this->load->view('layout',$data);
			}
			elseif ($_SESSION['usertype']==2)
			{
							
							$this->project_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['projectID'],addslashes(trim($_POST['comment'])),"committee_reject");
							$this->load->view('layoutComm',$data);
			}
			elseif ($_SESSION['usertype']==3)
			{
							$Query= $this->project_model->changeStatus('revisionChairman',$_POST['projectID']);
							$this->project_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['projectID'],addslashes(trim($_POST['comment'])),"chairmain_reject");
							$this->load->view('layoutChairman',$data);
			}
			else{
			header("location:/rp/login");
			}

			
		}
		
	}
	
	function approveMsg($status){
		if($status=='Approved')
			{
			echo 'Project has been sent for consultation.';
			}
		else
			{
			echo 'Project has been sent for revision.';
			}
		/* $queryStr='SELECT PStatus FROM project WHERE ProjectId = "'.$value.'";';
		// echo $queryStr;
		$query = $this->db->query($queryStr);
		
		if($_SESSION['usertype']==3 && ){
		if($status=='Approved')
			{
			echo 'Project has been approved.';
			}
		else
			{
			echo 'Project has been sent for revision.';
			}
		}
		else{
		if($status=='Approved')
			{
			echo 'Project has ***** been sent for consultation.';
			}
		else
			{
			echo 'Project has been sent for revision.';
			}
		} */
		
	}
}
?>