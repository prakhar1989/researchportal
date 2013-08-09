
<?PHP

// Connect to the database. To tweak the database settings goto applciation/config/database.php 

class Conference_model extends CI_Model {
     
	//get all the projects details
	function getConferences()
		{
		$this->load->database();
		//echo '@#usertype is :'.$_SESSION['usertype'];
		if($_SESSION['usertype']==1)
		{
			$queryStr='SELECT * FROM conference WHERE CStatus = "app_admin" ORDER BY App_Date DESC; ';
		} 
		elseif ($_SESSION['usertype']==2)
		{
			
			if($_SESSION['username']=="comm")
				$queryStr='SELECT * FROM conference WHERE CStatus = "app_comm" AND (comm_approval = 0 OR comm_approval = 3 OR comm_approval = 4 OR comm_approval = 7) ORDER BY App_Date DESC;';
			elseif($_SESSION['username']=="comm1")
				$queryStr='SELECT * FROM conference WHERE CStatus = "app_comm" AND (comm_approval = 0 OR comm_approval = 2 OR comm_approval = 4 OR comm_approval = 6) ORDER BY App_Date DESC; ';
			elseif($_SESSION['username']=="comm2")
				$queryStr='SELECT * FROM conference WHERE CStatus = "app_comm" AND (comm_approval = 0 OR comm_approval = 2 OR comm_approval = 3 OR comm_approval = 5) ORDER BY App_Date DESC; ';
		}
		elseif ($_SESSION['usertype']==3)
		{
			$queryStr='SELECT * FROM conference WHERE CStatus = "app_chairman_1" ORDER BY App_Date DESC;';
		}
		$query= $this->db->query($queryStr);
		return $query->result();
		
		}
	
	//get a conference details
	function conferenceInfo($Conference)
		{
		//echo 'projectInfo called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='SELECT * FROM conference WHERE ConferenceID = "'.$Conference.'";';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
	//get comments related to the specific conference	
	function getcomment($ConferenceID, $usertype)
	{
		$this->load->database();
		$queryStr='SELECT * FROM conferencecomment WHERE Conference_ID='.$ConferenceID.';';
		$query = $this->db->query($queryStr);
		return $query->result();
		
	}
	
	// Function to change the status of the project
	function changeStatus($status,$Conference)//changing the status of the project
		{
		//echo 'changeStatus called ';
		$this->load->database();
		//echo "Project Name:".$Project;
		$queryStr='UPDATE conference SET  CStatus =\''.$status.'\' WHERE  ConferenceId =\''.$Conference.'\' ;';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
	
		
	// Get the projects at  committee or chairman's approval pending stage	
	function conference_stage($stage)
		{
		//echo 'project_stage called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='SELECT * FROM conference WHERE CStatus = "app_'.$stage.'";';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}	
		
	// Search for project
	function conferenceSearch($type,$value)
		{
		$this->load->database();
		if ($type == 'ConferenceId')
		{
			$queryStr='SELECT * FROM conference WHERE ConferenceId = "'.$value.'";';	
		}
		elseif ($type == 'Researcher')
		{
		   $queryStr='SELECT * FROM conference WHERE Researcher1 LIKE \'%'.$value.'%\';';
		}
		elseif ($type == 'ConferenceTitle')
		{
		   $queryStr='SELECT * FROM conference WHERE ConferenceTitle LIKE \'%'.$value.'%\';';
		}
		elseif ($type == 'Funding')
		{
		   $queryStr='SELECT * FROM conference WHERE Researcher1 LIKE \'%'.$value.'%\';';
		}
		elseif ($type == 'PaperTitle')
		{
		   $queryStr='SELECT * FROM conference WHERE PaperTitle LIKE \'%'.$value.'%\';';
		}

	
		
		$query = $this->db->query($queryStr);
		return $query;

		}
	function getNoConf($user)
		{
		 // SELECT Count(*) from `project` WHERE Researcher1='ankushv' or Researcher2='ankushv'or Researcher3='ankushv'
		 $this->load->database();
		 $queryStr='SELECT Count(*) as "total" from `conference` WHERE Researcher1=\''.$user.'\'';
		 //echo $queryStr;
		 $query = $this->db->query($queryStr);
		 $result = $query->row_array();
		 //echo 'The count of projects is '.$result['total'];
		 if ($result['total']>=3)
			return False;
		 else
		   return True;
		 }
		 //**
		 function conference_status($status) //vridhi
		 {
		 	$this->load->database();
		 	//$query= $this->db->get('project');
		 	//echo $Project['Id'];
		 	$queryStr='SELECT * FROM conference WHERE CStatus = "'.$status.'";';
		 	//echo $queryStr;
		 	$query = $this->db->query($queryStr);
		 	return $query;
		 }
		 
		  function getNoConflast3yr($user)
		 {
		 	// SELECT Count(*) from `project` WHERE Researcher1='ankushv' or Researcher2='ankushv'or Researcher3='ankushv'
		 	$this->load->database();
		 	$queryStr='SELECT Count(*) as "total" from `conference` WHERE (Researcher1=\''.$user.'\' AND Start_Date >= DATE("'.date("Y-m-d").'")) ';
		 	//echo $queryStr;
		 	$query = $this->db->query($queryStr);
		 	$result = $query->row_array();
		 	//echo 'The count of projects is '.$result['total'];
		 	if ($result['total']>=3)
		 		return False;
		 	else
		 		return True;
		 }
		  function getNoConfInBlock($user)
		 {
		 	//$curr_block_num=1+floor((date("Y")-2001)/3);//first block is from 1/1/2001 to 31/12/2003
			
			$curr_block_num= (date("Y")-2013)/3;
			if ((date("Y")-2013)%3==0){
				if (date("m")>=4) {
					$curr_block_num= 2+floor($curr_block_num);
				} else {
					$curr_block_num=1+floor($curr_block_num);
				}
			} else {
				$curr_block_num=1+floor($curr_block_num);
			}
		 	$this->load->database();
		 	$queryStr='SELECT Count(*) as "total" from `conference` WHERE (Researcher1=\''.$user.'\' AND Block_number='.$curr_block_num.') ';
		 	//echo $queryStr;
		 	$query = $this->db->query($queryStr);
		 	$result = $query->row_array();
		 	//echo 'The count of projects is '.$result['total'];
		 	if ($result['total']>=3)
		 		return False;
		 	else
		 		return True;
		 	
		 }
		 function ongoingFacultyConferences($user) //--vridhi
		 {
		 	$this->load->database();
		 	$queryStr='SELECT * FROM conference WHERE (Researcher1 LIKE \'%'.$user.'%\' AND CStatus = \'approved\')';
		 	//echo $queryStr;
		 	$query = $this->db->query($queryStr);
		 	return $query;
		 }
		 function conferenceCompleteFaculty($user)
		 {
		 	$this->load->database();
		 	$queryStr='SELECT * FROM conference WHERE (Researcher1 LIKE \'%'.$user.'%\' AND CStatus = \'completed\')';
		 	//echo $queryStr;
		 	$query = $this->db->query($queryStr);
		 	return $query;
		 }
		function ongoingStudentConferences($user) //--vridhi
		 {
		 	$this->load->database();
		 	$queryStr='SELECT * FROM conference WHERE (Researcher1 LIKE \'%'.$user.'%\' AND CStatus = \'approved\')';
		 	//echo $queryStr;
		 	$query = $this->db->query($queryStr);
		 	return $query;
		 }
		 function conferenceCompleteStudent($user)
		 {
		 	$this->load->database();
		 	$queryStr='SELECT * FROM conference WHERE (Researcher1 LIKE \'%'.$user.'%\' AND CStatus = \'completed\')';
		 	//echo $queryStr;
		 	$query = $this->db->query($queryStr);
		 	return $query;
		 }
		 
		 // Function to get all the projects--vridhi
		 function allConferences()
		 {
		 	//echo 'project_stage called';
		 	$this->load->database();
		 	//$query= $this->db->get('project');
		 	//echo $Project['Id'];
		 	$queryStr='SELECT * FROM conference WHERE CStatus = "approved" OR CStatus = "completed";';
		 	//echo $queryStr;
		 	$query = $this->db->query($queryStr);
		 	return $query;
		 }
		 // Fucntion to get the details of the Project Account --vridhi
		 function getC_Account($conferenceId)
		 {
		 	$this->load->database();
		 	$queryStr='SELECT * FROM c_budget WHERE ConferenceID = "'.$conferenceId.'";';
		 	$query= $this->db->query($queryStr);
		 	return $query->result();
		 }
		 //function to insert the project details into project table (user is Faculty)
		 function insertConference($user,$data)
		 {
		 	$this->load->database();
		 	
		 	//1. Check if co researchers are doing more than 3 projects
		 	//echo 'insertProject called';
			//no logic of co researcher here
			$queryStr2='SELECT COUNT(ConferenceId) FROM conference WHERE (Researcher1=\''.$user.'\' AND Funding = \'IIMC\' AND Block_number = '.$data['block_num'].');'; 
			$query2 = $this->db->query($queryStr2);
			$result2=$query2->row_array();
			$No_conference = $result2['COUNT(ConferenceId)']+1;
		 	//2. Insert value into the project table
		
		 	//INSERT INTO `researchportal`.`project` (`ProjectTitle`, `ProjectId`, `Description`, `App_Date`, `Start_Date`, `End_Date`, `Researcher1`, `Researcher2`, `Researcher3`, `ProjectCategory`, `ProjectGrant`, `PStatus`, `Deliverables`) VALUES ('Business Leasdership Study', 'P33333', 'Leadership traits study on current business leaders', '2012-09-29', '2012-09-30', '2012-11-20', 'ashishkj11', 'prakhars2013', 'anuragn2013', '2', '100000', 'app_admin', '1 Leadership report');
		 	$queryStr= 'INSERT INTO conference (ConferenceTitle , Start_Date, Researcher1 , Category , CStatus, Block_number, PaperTitle, No_Conferences, Funding, Venue, Researcher2) VALUES (\''.$data['conf_name'].'\' , \'' .$data['conf_date'].'\' , \''.$user.'\' , \''.$data['category'].'\' , \'app_admin\' , '.$data['block_num'].' , \''.$data['paper_title'].'\' , '.$No_conference.' , \''.$data['funding'].'\' , \''.$data['conf_venue'].'\' , \''.$data['co_author'].'\' );' ; 	
			$data['conf_name']=$_POST['conf_name'];
		 	$query = $this->db->query($queryStr);
			$queryStr1 = 'SELECT ConferenceId FROM conference WHERE ConferenceId = (SELECT MAX(ConferenceId)  FROM conference)';
			$query1 = $this->db->query($queryStr1);
			$result1=$query1->result();
			foreach($result1 as $row)
						{
							 $ConfId=$row->ConferenceId;
						}
			
			return $ConfId;
		 	
		 }
		 // function to get the account status of the project--vridhi
		 function getC_AccStatus ($conferenceId)
		 {
		 	//1. get the project budget
		 	$this->load->database();
		 	$queryStr='SELECT ConferenceGrant FROM conference WHERE ConferenceID = "'.$conferenceId.'";';
		 	$query= $this->db->query($queryStr);
		 	$budget= $query->result();
		 	foreach($budget as $row)
		 	{
		 		//print $row->ProjectGrant;
		 		$account['grant']=$row->ConferenceGrant;
		 	}
		 	//2. Calculate the project spending so far
		 	$queryStr='SELECT * FROM c_budget WHERE ConferenceID = "'.$conferenceId.'";';
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
		 // function to insert the account data--vridhi
		 function insertC_Account($data)
		 {
		 	$this->load->database();
		 	$queryStr= 'INSERT INTO c_budget (Date, ConferenceId , registrationCharges , travel , perDiem ,  stay ) VALUES (\''.Date("Y-M-D").'\' , \''.$data['conferenceid'].'\' , \'' .$data['registrationCharges'].'\' , \''.$data['travel'].'\' , \''.$data['perDiem'].'\' , \''.$data['stay'].'\');' ;
		 	//echo '<br>'.$queryStr;
		 	$query = $this->db->query($queryStr);
		 	//$result = $query->result();
		 	$msg='The Account Details have been Added';
		 	return $msg;
		 }
		 function conferenceSearchByID($value)
		{
			$this->load->database();
			$queryStr='SELECT * FROM conference WHERE ConferenceId = "'.$value.'";';
			$query = $this->db->query($queryStr);
			return $query;
		
		}
		//function to insert comment into the comment table for conferences
	function insertComment($user, $usertype, $ID, $comment, $comment_type)
	{
		$this->load->database();
		$queryStr= 'INSERT INTO conferencecomment (Conference_ID , Comment, Comment_type, User, User_type) VALUES ('.$ID.' , \''.$comment.'\' , \''.$comment_type.'\' , \''.$user.'\' , '.$usertype.');' ;
		//echo '<br>'.$queryStr;
		$query = $this->db->query($queryStr);
		//$result = $query->result();
		//$msg='The Comments have been Added';
		//return $msg;
	}
	function getCommConf()//for confs pending with committee, which can be directly approved by chairman(called from 'committee' tab for user: chairman & admin)
	{
		$this->load->database();
		if ($_SESSION['usertype']==3 || $_SESSION['usertype']==1)
		{
			$queryStr='SELECT * FROM conference WHERE CStatus = "app_comm" OR CStatus = "app_chairman_2" ORDER BY App_Date DESC;';
		}
		$query= $this->db->query($queryStr);
		return $query->result();
	}	
	
	function changeStatusComm($comm_app,$status,$ID)//changing the status of the conf
		{
		
		$this->load->database();
		//$num = 0;
		$queryStr = 'SELECT comm_approval FROM conference WHERE ConferenceId =\''.$ID.'\' ;';
		$query = $this->db->query($queryStr);
		$result=$query->result();
		foreach($result as $row)
		{
		$num=$row->comm_approval;
		}
		$num = $num + $comm_app;
		//echo "Project Name:".$Project;
		$queryStr='UPDATE conference SET  comm_approval =\''.$num.'\' WHERE  ConferenceId =\''.$ID.'\' ;';
		$query = $this->db->query($queryStr);
		if($num == 9)
			$queryStr='UPDATE conference SET  CStatus =\''.$status.'\' WHERE  ConferenceId =\''.$ID.'\' ;';
		
		
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
	function conferenceInfoNewConference($ConferenceID)
		{
		//echo 'projectInfo called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='Select *From conference where  conference.conferenceID = "'.$ConferenceID.'" order by conference.conferenceId;';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
}
?>