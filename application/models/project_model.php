
<?PHP

// Connect to the database. To tweak the database settings goto applciation/config/database.php 

class Project_model extends CI_Model {
     
	//get all the projects details
	function getProjects()
	{
		$this->load->database();
		//echo '@#usertype is :'.$_SESSION['usertype'];
		if($_SESSION['usertype']==1)
		{
			$queryStr='SELECT * FROM project WHERE PStatus = "app_admin" ; ';
		} 
		elseif ($_SESSION['usertype']==2)
		{
			
			if($_SESSION['username']=="comm")
				$queryStr='SELECT * FROM project WHERE PStatus = "app_comm" AND (comm_approval = 0 OR comm_approval = 3 OR comm_approval = 4 OR comm_approval = 7);';
			elseif($_SESSION['username']=="comm1")
				$queryStr='SELECT * FROM project WHERE PStatus = "app_comm" AND (comm_approval = 0 OR comm_approval = 2 OR comm_approval = 4 OR comm_approval = 6); ';
			elseif($_SESSION['username']=="comm2")
				$queryStr='SELECT * FROM project WHERE PStatus = "app_comm" AND (comm_approval = 0 OR comm_approval = 2 OR comm_approval = 3 OR comm_approval = 5); ';
		}
		elseif ($_SESSION['usertype']==3)
		{
			$queryStr='SELECT * FROM project WHERE PStatus = "app_chairman_1";';
		}
		$query= $this->db->query($queryStr);
		return $query->result();
	}
	function getCommProjects()//for projects pending with committee, which can be directly approved by chairman(called from 'committee' tab for user: chairman)
	{
		$this->load->database();
		if ($_SESSION['usertype']==3)
		{
			$queryStr='SELECT * FROM project WHERE PStatus = "app_comm" OR PStatus = "app_chairman_2";';
		}
		$query= $this->db->query($queryStr);
		return $query->result();
	}	
		
		
		// By Nikhil for displaying ongoing projects
	function project_status($status)
		{
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='SELECT * FROM project WHERE PStatus = "'.$status.'";';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
		
	// Code added by Pratik
	// Get extension projects
	function project_extension()
		{
		$this->load->database();
		$queryStr='Select project.*,projectextension.* From project Inner Join projectextension On project.ProjectId = projectextension.ProjectId where  ApprovalPending = "admin" order by project.ProjectId';
		//$queryStr='Select * from project where ProjectId IN (SELECT ProjectId FROM projectextension where  ApprovalPending = "admin");';
		$query = $this->db->query($queryStr);
		return $query;
		}
		
	// List all the projects approved for extension
	function projectExtensionApproved()
		{
		$this->load->database();
		$queryStr='Select project.*,projectextension.* From project Inner Join projectextension On project.ProjectId = projectextension.ProjectId where  ApprovalPending = "approved" order by project.ProjectId';
		$query = $this->db->query($queryStr);
		return $query;
		}
	
	// List all the projects approved for completion
	function projectCompletionApproved()
		{
		$this->load->database();
		$queryStr='Select project.*,projectcompleted.* From project Inner Join projectcompleted On project.ProjectId = projectcompleted.ProjectId where  ApprovalPending = "approved" order by project.ProjectId';
		$query = $this->db->query($queryStr);
		return $query;
		}
	
	// Code added by Pratik
	// Get Extension Projects pending for chairman approval
	function project_extension_chairman()
		{
		//echo 'project_stage called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='Select project.*,projectextension.* From project Inner Join projectextension On project.ProjectId = projectextension.ProjectId where  ApprovalPending = "chairman" order by project.ProjectId';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
	
	// Code added by Pratik
	// Get Extension Projects pending for chairman's First approval
	function project_extension_chairmanFirstApprovals()
		{
		//echo 'project_stage called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='Select * from project where ProjectId IN (SELECT ProjectId FROM projectextension where  ApprovalPending = "chairmanFirstApproval");';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
	
	// Code added by Pratik
	// Get the Extension Projects pending Consultation for Committee
	function project_extension_committee()
		{
		//echo 'project_stage called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='Select * from project where ProjectId IN (SELECT ProjectId FROM projectextension where  ApprovalPending = "ConsultCommittee");';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
		
	// Code added by Pratik
	//Check Admin Response for extension as to Approve and Reject and act accordingly
	function projectExtensionAdminResponse($check,$projectid)
		{
		$this->load->database();
		If ($check == 'Approve')
			$queryStr='UPDATE projectextension SET ApprovalPending = "chairman" where ProjectId = "'.$projectid.'";';
		ElseIf ($check == 'Send For Revision')
			$queryStr='UPDATE projectextension SET ApprovalPending = "revisionAdmin" where ProjectId = "'.$projectid.'";';
		$query = $this->db->query($queryStr);
		return $query;
		}	
		
	// Code added by Pratik
	//Check Admin Response for completion as to Approve and Reject and act accordingly
	function projectCompletionAdminResponse($check,$projectid)
		{
		$this->load->database();
		If ($check == 'Approve')
			$queryStr='UPDATE projectcompleted SET ApprovalPending = "chairman" where ProjectId = "'.$projectid.'";';
		//ElseIf ($check == 'Review')
		//	$queryStr='UPDATE projectcompleted SET ApprovalPending = "reviewAdmin" where ProjectId = "'.$projectid.'";';
		ElseIf ($check == 'Send For Revision')
			$queryStr='UPDATE projectcompleted SET ApprovalPending = "revisionAdmin" where ProjectId = "'.$projectid.'";';
		$query = $this->db->query($queryStr);
		return $query;
		}	
	//Check Admin Response for completion as to Approve and Reject and act accordingly
	function projectCompletionFacultyResponse($projectid)
		{
		$this->load->database();
		$queryStr='Select * from projectcompleted where ProjectId = "'.$projectid.'";';
		$query = $this->db->query($queryStr);
		foreach($query->result() as $row)
		{
		If ($row->ApprovalPending == 'revisionAdmin')
			$queryStr1='UPDATE projectcompleted SET ApprovalPending = "admin" where ProjectId = "'.$projectid.'";';
		ElseIf ($row->ApprovalPending == 'revisionChairman')
			$queryStr1='UPDATE projectcompleted SET ApprovalPending = "chairman" where ProjectId = "'.$projectid.'";';
		}
		$query1 = $this->db->query($queryStr1);
		return $query1;
		}	
	
	// Code Added by Pratik 4 Dec 2012
	// Check Chairman Response for Project Completion and Update Tables Accordingly
	function projectCompletionChairmanResponse($check,$projectid)
		{
		$this->load->database();
		If ($check == 'Approve')
			{
			$queryStr='UPDATE projectcompleted SET ApprovalPending = "approved" where ProjectId = "'.$projectid.'";';
			$queryStr1='UPDATE project SET Pstatus = "completed" where ProjectId = "'.$projectid.'";';
			$query1 = $this->db->query($queryStr1);
			}
		ElseIf ($check == 'Reject')
			$queryStr='UPDATE projectcompleted SET ApprovalPending = "rejectedChairman" where ProjectId = "'.$projectid.'";';
		ElseIf ($check == 'Send For Revision')
			$queryStr='UPDATE projectcompleted SET ApprovalPending = "revisionChairman" where ProjectId = "'.$projectid.'";';
		$query = $this->db->query($queryStr);
		return $query;
		$query = $this->db->query($queryStr);
		return $query;
		}
	
	// Code added by Pratik
	//Check for projects pending for completion approval by Admin
	function project_completion_admin()
		{
		//echo 'project_stage called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='Select project.*,projectcompleted.* From project Inner Join projectcompleted On project.ProjectId = projectcompleted.ProjectId where  ApprovalPending = "admin" Order By projectcompleted.ProjectId;';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}	
		
	// Code added by Pratik
	//Check for projects pending for completion approval by Chairman
	function project_completion_chairman()
		{
		//echo 'project_stage called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='Select project.*,projectcompleted.* From project Inner Join projectcompleted On project.ProjectId = projectcompleted.ProjectId where  ApprovalPending = "chairman" Order By projectcompleted.ProjectId;';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}		
		
	// Code added by Pratik
	// Get the Completion Projects pending Consultation for Committee
	function project_completion_committee()
		{
		//echo 'project_stage called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='Select * from project where ProjectId IN (SELECT ProjectId FROM projectcompleted where  ApprovalPending = "ConsultCommittee");';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
	// Code added by Pratik
	// Get Extension Revision Projects for Faculty
	function project_extensionrevision_faculty($user)
		{
		//echo 'project_stage called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='Select project.*,projectextension.* From project Inner Join projectextension On project.ProjectId = projectextension.ProjectId where  (projectextension.ApprovalPending = "revisionAdmin" OR projectextension.ApprovalPending = "revisionChairman") AND (Researcher1 =\''.$user.'\' OR Researcher2 = \''.$user.'\' OR Researcher3 = \''.$user.'\');';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
	// Code added by Pratik
	// Get CompletionRevision Projects for Faculty
	function project_completionrevision_faculty($user)
		{
		//echo 'project_stage called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='Select project.*,projectcompleted.* From project Inner Join projectcompleted On project.ProjectId = projectcompleted.ProjectId where  (projectcompleted.ApprovalPending = "revisionAdmin" OR projectcompleted.ApprovalPending = "revisionChairman") AND (Researcher1 =\''.$user.'\' OR Researcher2 = \''.$user.'\' OR Researcher3 = \''.$user.'\');';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
	
	function ongoingFacultyProjects($user)
	{
		$this->load->database();
		$queryStr='SELECT * FROM project WHERE ((Researcher1 LIKE \'%'.$user.'%\' OR Researcher2 LIKE \'%'.$user.'%\' OR Researcher3 LIKE \'%'.$user.'%\') AND PStatus = \'ongoing\')';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
	}
	// Search for project by Project ID
	function projectSearchByID($value)
		{
		$this->load->database();
		$queryStr='SELECT * FROM project WHERE ProjectId = "'.$value.'";';	
		$query = $this->db->query($queryStr);
		return $query;

		}
		// Search for project by Project ID
	function projectRevise($value)
		{
		$this->load->database();
		$queryStr='SELECT * FROM project WHERE PStatus = "revisionAdmin" OR PStatus = "revisionChairman";';	
		$query = $this->db->query($queryStr);
		return $query;

		}
	// Search for completed projects for a faculty
	function projectCompleteFaculty($user)
	{
		$this->load->database();
		$queryStr='SELECT * FROM project WHERE ((Researcher1 LIKE \'%'.$user.'%\' OR Researcher2 LIKE \'%'.$user.'%\' OR Researcher3 LIKE \'%'.$user.'%\') AND PStatus = \'completed\')';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
	}
	// Search for completed projects for a faculty
	function projectPendingFaculty($user)
	{
		$this->load->database();
		$queryStr='SELECT * FROM project WHERE ((Researcher1 =\''.$user.'\' OR Researcher2 = \''.$user.'\' OR Researcher3 = \''.$user.'\') AND (PStatus <> \'approved\' AND PStatus <> \'completed\' AND PStatus <> \'ongoing\'))';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
	}
	
	// Request for Project Completion
	function projectCompletion($value)
	{
		$this->load->database();
		$queryStrCheck = 'Select ProjectId from projectcompleted where ProjectId = "'.$value.'";';
		$queryCheck = $this->db->query($queryStrCheck);
		If ( $queryCheck->num_rows() == 0)
			{
			$queryStr= 'INSERT INTO projectcompleted (ProjectId , ApprovalPending) VALUES (\''.$value.'\', \'admin\' );' ;
			$query = $this->db->query($queryStr);
			$msg='The Project has been Requested for Completion Approval';
			}
		Else
			$msg='Your Request For Approval Has Already Been Sent';
		return $msg;
	}
	
	// Request for Project Extension
	function projectExtension($value,$period)
	{
		$this->load->database();
		$queryStrCheck = 'Select ProjectId from projectextension where ProjectId = "'.$value.'";';
		$queryCheck = $this->db->query($queryStrCheck);
		If ( $queryCheck->num_rows() == 0)
			{
			$queryStr= 'INSERT INTO projectextension (ProjectId, Period , ApprovalPending) VALUES (\''.$value.'\',\''.$period.'\' , \'admin\' );' ;
			$query = $this->db->query($queryStr);
			$msg='The Request for Project Extension has been sent';
			}
		Else
			$msg='Your Request For Approval Has Already Been Sent';
		return $msg;
	}	
	
	// Get recurring details for faculty
	function projectRecurring($user)
		{
		$this->load->database();
		$queryStr='SELECT * FROM recurring WHERE Userid = \''.$user.'\'';
		$query = $this->db->query($queryStr);
		return $query;
		}
		
	// insert recurring record in the table-- called from faculty page
	function insertRecurring($data)
		{
			$this->load->database();
			$queryStr1='SELECT WorkOrderId FROM project WHERE ProjectId = '.$data['ProjectId'].';';
			$row=$this->db->query($queryStr1)->result();
			$queryStr= 'INSERT INTO recurring (ProjectId, WorkOrderId, recurring_amt, Userid, Account_Details, Payment_Procedure, No_Payments, researcher_id, Day_payment, PAN, Cheque_name) VALUES ('.$data['ProjectId'].', \''.$row[0]->WorkOrderId.'\' , '.$data['recurring_amt'].', \''.$data['Userid'].'\', \''.$data['Account_Details'].'\', \''.$data['Payment_Procedure'].'\', '.$data['No_Payments'].', \''.$data['researcher_id'].'\', '.$data['Day_payment'].', \''.$data['PAN'].'\', \''.$data['Cheque_name'].'\');';
			$query = $this->db->query($queryStr);
			$msg='The Recurring expense has been added';
			return $msg;
		}
		
	//get a project's details
	function projectInfoNewProject($Project)
		{
		//echo 'projectInfo called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='Select *From project where  project.ProjectID = "'.$Project.'" order by project.ProjectId;';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
		
	
	//get a project's details
	function projectInfo($Project)
		{
		//echo 'projectInfo called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='Select project.*,projectextension.* From project Inner Join projectextension On project.ProjectId = projectextension.ProjectId where  project.ProjectID = "'.$Project.'" order by project.ProjectId;';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
	
	// Function to change the status of the project
	function changeStatus($status,$Project)//changing the status of the project
		{
			//echo 'changeStatus called ';
			$this->load->database();
			//echo "Project Name:".$Project;
		/*if ($_SESSION['usertype']==2)
		{
			
			$queryStr ='Select comm_approval from project where ProjectID = "'.$Project.'"' ;
			$query = $this->db->query($queryStr);
			var_dump($query->result());
			$result = $query->result();
			echo'  The value is '.$result[0]->comm_approval;
			$comm_val= $result[0]->comm_approval;
			if ($_SESSION['username']=='comm')
			{
				$comm_val=$comm_val+2;
			}
			elseif 
			($_SESSION['username']=='comm1')
			{
				$comm_val=$comm_val+6;
			}
			elseif ($_SESSION['username']=='comm2')
			{
				$comm_val=$comm_val+7;
			}
			$queryStr='UPDATE project SET comm_approval= '.$comm_val.' WHERE ProjectId =\''.$Project.'\' ;';
			echo '<br>The string 1 is '.$queryStr;
			$query = $this->db->query($queryStr);
			if ( $comm_val == 15)
			{
				$queryStr='UPDATE project SET  PStatus =\''.$status.'\' WHERE  ProjectId =\''.$Project.'\' ;';
				echo '<br>The string 2 is '.$queryStr;
				$query = $this->db->query($queryStr);
			}
		}*/
		
			$queryStr='UPDATE project SET  PStatus =\''.$status.'\' WHERE  ProjectId =\''.$Project.'\' ;';
			//echo $queryStr;
			$query = $this->db->query($queryStr);
		
		return $query;
		}
	function changeStatusComm($comm_app,$status,$Project)//changing the status of the project
		{
		
		$this->load->database();
		//$num = 0;
		$queryStr = 'SELECT comm_approval FROM project WHERE ProjectId =\''.$Project.'\' ;';
		$query = $this->db->query($queryStr);
		$result=$query->result();
		foreach($result as $row)
		{
		$num=$row->comm_approval;
		}
		$num = $num + $comm_app;
		//echo "Project Name:".$Project;
		$queryStr='UPDATE project SET  comm_approval =\''.$num.'\' WHERE  ProjectId =\''.$Project.'\' ;';
		if($num == 9)
			$queryStr='UPDATE project SET  PStatus =\''.$status.'\' WHERE  ProjectId =\''.$Project.'\' ;';
		
		
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
	
	// Get the projects at  committee or chairman's approval pending stage	
	function project_stage($stage)
		{
		//echo 'project_stage called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='SELECT * FROM project WHERE PStatus = "app_'.$stage.'";';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}	
		
	// Search for project 
	function projectSearch($type,$value)
		{
		$this->load->database();
		if ($type == 'ProjectId')
		{
			$queryStr='SELECT * FROM project WHERE ProjectId = "'.$value.'";';	
		}
		elseif ($type == 'Researcher')
		{
		   $queryStr='SELECT * FROM project WHERE Researcher1 LIKE \'%'.$value.'%\' OR Researcher2 LIKE \'%'.$value.'%\' OR Researcher2 LIKE \'%'.$value.'%\' OR Researcher2 LIKE \'%'.$value.'%\';';
		}
		elseif ($type == 'ProjectType')
		{
			$queryStr='SELECT * FROM project WHERE ProjectCategory = "'.$value.'";';	
		}
		elseif ($type == 'ProjectCategory')
		{
			$queryStr='SELECT * FROM project WHERE ProjectCategory = "'.$value.'";';	
		}
		elseif ($type == 'Budget')
		{
			$queryStr='SELECT * FROM project WHERE ProjectGrant = "'.$value.'";';	
		}
		elseif ($type == 'Deliverable')
		{
			$queryStr='SELECT * FROM project WHERE Deliverables = "'.$value.'";';	
		}
		elseif ($type == 'ProjectName')
		{
			$queryStr='SELECT * FROM project WHERE ProjectTitle LIKE \'%'.$value.'%\';';	
		}
		elseif ($type == 'WorkOrderId')
		{
			$queryStr='SELECT * FROM project WHERE WorkOrderId LIKE \'%'.$value.'%\';';	
		}
		//echo '<br>'.$queryStr;
		$query = $this->db->query($queryStr);
		return $query;

		}
		
		//Function to get the no of on going projects for a researcher 
	function getNoProj($user)
		{
		 // SELECT Count(*) from `project` WHERE Researcher1='ankushv' or Researcher2='ankushv'or Researcher3='ankushv'
		 $this->load->database();
		 $queryStr='SELECT Count(*) as "total" from `project` WHERE (Researcher1=\''.$user.'\' OR Researcher2=\''.$user.'\' OR Researcher3=\''.$user.'\') And (ProjectCategory = "Category 1 (IIM C)" OR ProjectCategory = "Category 2 (IIM C)" OR ProjectCategory = "Category 3 (IIM C)")';
		 //echo $queryStr;
		 $query = $this->db->query($queryStr);
		 $result = $query->row_array();
		 //echo 'The count of projects is '.$result['total'];
		 if ($result['total']>=2)
			return False;
		 else
		   return True;
		 }	
	
        // Fucntion to get the details of the Project Account 
	function getAccount($projectId)
	{
		$this->load->database();
		$queryStr='SELECT * FROM budget WHERE ProjectID = "'.$projectId.'";';
	    $query= $this->db->query($queryStr);
		return $query->result();
	}
	
	
	
	// Function to get all the projects
	function allProjects()
	{
	//echo 'project_stage called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='SELECT * FROM project WHERE PStatus = "approved" OR PStatus = "completed";';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
	}
	
	//function to insert the project details into project table (user is Faculty)
	function insertProject($user,$data)
		{
		//1. Check if co researchers are doing more than 3 projects
		//echo 'insertProject called';
		if (! $this->getNoProj($data['researcher2']) && $data['researcher3']!='')
		{
			$msg='The co researcher '.$data['researcher2'].' is already doing 3 project';
			//echo $msg;
			return $msg;
		}
		if (! $this->getNoProj($data['researcher3']) && $data['researcher3']!='')
		{
			$msg='The co researcher '.$data['researcher3'].' is already doing 3 project';
			//echo $msg;
			return $msg;
		}
		
		
		//2. Insert value into the project table
		//INSERT INTO `researchportal`.`project` (`ProjectTitle`, `ProjectId`, `Description`, `App_Date`, `Start_Date`, `End_Date`, `Researcher1`, `Researcher2`, `Researcher3`, `ProjectCategory`, `ProjectGrant`, `PStatus`, `Deliverables`) VALUES ('Business Leasdership Study', 'P33333', 'Leadership traits study on current business leaders', '2012-09-29', '2012-09-30', '2012-11-20', 'ashishkj11', 'prakhars2013', 'anuragn2013', '2', '100000', 'app_admin', '1 Leadership report');
		 $queryStr= 'INSERT INTO project (ProjectTitle , Researcher1 , Researcher2 ,  Researcher3 , ProjectCategory , ProjectGrant , PStatus , cases , journals , chapters , conference , paper, books ) VALUES (\''.$data['title'].'\' , \''.$user.'\' , \''.$data['researcher2'].'\' , \''.$data['researcher3'].'\' , \''.$data['category'].'\' , \''.$data['grant'].'\' , \'app_admin\' , \''.$data['cases'].'\' , \''.$data['journals'].'\' , \''.$data['chapters'].'\' , \''.$data['conferences'].'\' , \''.$data['papers'].'\', \''.$data['books'].'\');' ;
		//echo '<br>'.$queryStr;
		$query = $this->db->query($queryStr);
		//$result = $query->result();
		
		//*** Getting the project Id so as to save the files 
		$queryStr = 'SELECT ProjectId FROM project WHERE ProjectId = (SELECT MAX(ProjectId)  FROM project)';
		$query = $this->db->query($queryStr);
		$result=$query->result();
		foreach($result as $row)
					{
						 //echo 'the projectId is '.$row->ProjectId;
						 $ProjectId=$row->ProjectId;
					}
		
		
		//$msg='The Project has been Sent for approval';
		return $ProjectId;
		}
	//function to insert the project details into project table (user is Faculty)
	function insertProjectRevision($user,$data,$status,$projectid)
		{
		//1. Check if co researchers are doing more than 3 projects
		//echo 'insertProject called';
		 $this->load->database();
		
		//2. Insert value into the project table
		//INSERT INTO `researchportal`.`project` (`ProjectTitle`, `ProjectId`, `Description`, `App_Date`, `Start_Date`, `End_Date`, `Researcher1`, `Researcher2`, `Researcher3`, `ProjectCategory`, `ProjectGrant`, `PStatus`, `Deliverables`) VALUES ('Business Leasdership Study', 'P33333', 'Leadership traits study on current business leaders', '2012-09-29', '2012-09-30', '2012-11-20', 'ashishkj11', 'prakhars2013', 'anuragn2013', '2', '100000', 'app_admin', '1 Leadership report');
		 $queryStr= 'UPDATE project SET ProjectCategory = "'.$data['category'].'", ProjectGrant = '.$data['grant'].', PStatus = "'.$status.'", cases = '.$data['cases'].', journals = '.$data['journals'].', chapters = '.$data['chapters'].', conference = '.$data['conferences'].', paper = '.$data['papers'].', , books = '.$data['books'].' WHERE ProjectId = '.$projectid.';';
		//echo '<br>'.$queryStr;
		$query = $this->db->query($queryStr);
		//$result = $query->result();
		
		//*** Getting the project Id so as to save the files 
		//$queryStr = 'SELECT ProjectId FROM project WHERE ProjectId = (SELECT MAX(ProjectId)  FROM project)';
		
		}
	// function to get the account status of the project
    function getAccStatus ($projectId)
		{
		//1. get the project budget
		$this->load->database();
		$queryStr='SELECT ProjectGrant FROM project WHERE ProjectID = "'.$projectId.'";';
	    $query= $this->db->query($queryStr);
		$budget= $query->result();
		foreach($budget as $row)
					 {
						 //print $row->ProjectGrant;
						 $account['grant']=$row->ProjectGrant;
					}
		//2. Calculate the project spending so far
		$queryStr='SELECT * FROM budget WHERE ProjectID = "'.$projectId.'";';
		$query= $this->db->query($queryStr);
		$results['query']=$query->result();
		$total=0;
		foreach($results['query'] as $row)
					 {
						 $total=$total + $row->dataset + $row->communication + $row->photocopying + $row->field + $row->stationery +	$row->domestictravel +	$row->localconveyance	+ $row->accomodation	+ $row->contingency	+ $row->software	+ $row->dessimination ;
					} 
		$account['spent']=$total;			
		return $account;
				
		}
	// function to insert the account data
    function insertAccount($data)
	{
		$this->load->database();
		//--vridhi--added date below
		$queryStr= 'INSERT INTO budget (ProjectId , dataset , communication , photocopying ,  field , stationery , domestictravel , localconveyance , accomodation , contingency , software , dessimination) VALUES (\''.$data['projectid'].'\' , \'' .$data['dataset'].'\' , \''.$data['communication'].'\' , \''.$data['photocopying'].'\' , \''.$data['field'].'\' , \''.$data['stationery'].'\' , \''.$data['domestic'].'\' , \''.$data['conveyance'].'\' , \''.$data['accomodation'].'\' , \''.$data['contingency'].'\' , \''.$data['software'].'\' , \''.$data['dessimination'].'\');' ;
		//echo '<br>'.$queryStr;
		$query = $this->db->query($queryStr);
		//$result = $query->result();
		$msg='The Account Details have been Added';
		return $msg;
	}
	// function to extract the recurring Amount for a project
	function getRecurring()
		{
		//echo 'getRecurring Called';
		$this->load->database();
		$queryStr='SELECT * FROM recurring;';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query->result();
		}
 	
	//*** Edit the amount of recurring that the project will be getting
	function editAmount($ProjectId,$amount)
	{
	$this->load->database();
	//echo $ProjectId;
	$queryStr='UPDATE recurring SET recurring_amt='.$amount.' WHERE ProjectId='.$ProjectId.';';
	//echo $queryStr;
	$query = $this->db->query($queryStr);
	$msg= 'Edited';
	return $msg;
	}
	//*** Add the projeect for the recurring account and set its amount and total
	function addProject($ProjectId,$amount,$total)
	{
	$this->load->database();
	//echo $ProjectId.' '.$amount;
	$queryStr='INSERT INTO recurring (ProjectId,recurring_amt,total) values ( '.$ProjectId.', '.$amount.' , '.$total.' );';
	$query = $this->db->query($queryStr);
	$msg= 'Added';
	}
	
	//*** Enter the recurring expenses to the project
	function addRecurring($Project)
	{
	$this->load->database();
	$this->db->select('recurring_amt'); 
	$this->db->where('ProjectId', $Project); 
	$query = $this->db->get("recurring"); #From the settings table
	$row = $query->row_array(); // get the row
	$amount= $row['recurring_amt'];
	$queryStr='INSERT INTO budget ( ProjectId, recurring, Date, dataset , communication , photocopying ,  field , stationery , domestictravel , localconveyance , accomodation , contingency , software , dessimination) values ( '.$Project.' , '. $amount.' , \''.date("Y-M-D").'\' ,0,0,0,0,0,0,0,0,0,0,0 ) ;';
	$query = $this->db->query($queryStr);
	
	}
	//vridhi-function to insert comment into the comment table
	function insertComment($user, $usertype, $ProjectID, $comment, $comment_type)
	{
		$this->load->database();
		$queryStr= 'INSERT INTO comment (Project_ID , Comment, Comment_type, User, User_type) VALUES ('.$ProjectID.' , \''.$comment.'\' , \''.$comment_type.'\' , \''.$user.'\' , '.$usertype.');' ;
		//echo '<br>'.$queryStr;
		$query = $this->db->query($queryStr);
		//$result = $query->result();
		//$msg='The Comments have been Added';
		//return $msg;
	}
	//vridhi-function to get comments from comment table based on project id. more checks can be added in query to check for usertype
	function getcomment($ProjectID, $usertype)
	{
		$this->load->database();
		$queryStr='SELECT * FROM comment WHERE Project_ID='.$ProjectID.';';
		$query = $this->db->query($queryStr);
		return $query->result();
		
	}

	// Code Added by Pratik 4 Dec 2012
	// Check Chairman Response for Project Extension and Update Tables Accordingly
	function projectExtensionChairmanResponse($check,$projectid)
		{
		$this->load->database();
		If ($check == 'Approve')
			{
			$queryStr3 = 'Select Period from projectextension where ProjectId = "'.$projectid.'";';
			$query3 = $this->db->query($queryStr3);
			foreach($query3->result() as $row)
				{
				$period = $row->Period;
				}
			$queryStr='UPDATE projectextension SET ApprovalPending = "approved" where ProjectId = "'.$projectid.'";';
			//$queryStr1='UPDATE project SET End_Date = DATEADD(d,20,End_Date) where ProjectId = "'.$projectid.'";';
			$queryStr1='UPDATE project SET End_Date = DATE_ADD(End_Date,Interval '.$period.' MONTH) where ProjectId = "'.$projectid.'";';
			$query1 = $this->db->query($queryStr1);
			}
		ElseIf ($check == 'Reject')
			$queryStr='UPDATE projectextension SET ApprovalPending = "rejectedChairman" where ProjectId = "'.$projectid.'";';
		/*ElseIf ($check == 'Consult Committee')
			$queryStr='UPDATE projectextension SET ApprovalPending = "ConsultCommittee" where ProjectId = "'.$projectid.'";';
			*/
		ElseIf ($check == 'Send For Revision')
			$queryStr='UPDATE projectextension SET ApprovalPending = "revisionChairman" where ProjectId = "'.$projectid.'";';
		$query = $this->db->query($queryStr);
		return $query;
		}		
		
	// Code Added by Pratik 4 Dec 2012
	// Check Committee Response for Project Extension and Update Tables Accordingly
	function projectExtensionCommitteeResponse($check,$projectid)
		{
		$this->load->database();
		If ($check == 'Approve')
			$queryStr='UPDATE projectextension SET ApprovalPending = "chairman" where ProjectId = "'.$projectid.'";';
		$query = $this->db->query($queryStr);
		return $query;
		}
		
	// Code Added by Pratik 4 Dec 2012
	// Check Committee Response for Project Completion and Update Tables Accordingly
	function projectCompletionCommitteeResponse($check,$projectid)
		{
		$this->load->database();
		If ($check == 'Send')
			$queryStr='UPDATE projectcompleted SET ApprovalPending = "chairman" where ProjectId = "'.$projectid.'";';
		$query = $this->db->query($queryStr);
		return $query;
		}
		
	function budgetConsumed($Project)
	{
		$this->load->database();
		$queryStr='';
		$query = $this->db->query($queryStr);
		return 0;
	}
	
	// Code Added by Pratik 
	// To get the number of files uploaded
  /*function getDirectoryList ($ProjectId) 
  {
	$directory = '/rp/upload/';
	echo $directory;
    $count = 0;
    $handler = opendir('/upload');
    while ($file = readdir($handler)) 
	{
      if ($file != "." && $file != "..") 
	  {
		$filename = explode("_",$file);
        If (strcasecmp($ProjectId,$filename[0]))
			$count++;
      }
    }
    closedir($handler);
    return $count;

  }*/
  function insertWorkOrder($projectId,$workId)
  {
	$this->load->database();
	$queryStr='Update project set WorkOrderId = \''.$workId.'\' , PStatus =\'ongoing\' WHERE ProjectId ='.$projectId.';';
	//echo $queryStr;
	$query = $this->db->query($queryStr);
	
 }
 function getWorkOrder($projectId)
 {
}
}
?>