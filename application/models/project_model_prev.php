
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
			$queryStr='SELECT * FROM project WHERE PStatus = "app_comm" ; ';
		}
		elseif ($_SESSION['usertype']==3)
		{
			$queryStr='SELECT * FROM project WHERE PStatus = "app_chairman" ; ';
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
		
		// Get extension projects ... Nikhil
	function project_extension()
		{
		//echo 'project_stage called';
		$this->load->database();
		//$query= $this->db->get('project');
		//echo $Project['Id'];	
		$queryStr='SELECT * FROM extension;';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
		
	function ongoingFacultyProjects($user)
	{
		$this->load->database();
		$queryStr='SELECT * FROM project WHERE ((Researcher1 LIKE \'%'.$user.'%\' OR Researcher2 LIKE \'%'.$user.'%\' OR Researcher3 LIKE \'%'.$user.'%\') AND PStatus = \'approved\')';
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
	// Search for completed projects for a faculty
	function projectCompleteFaculty($user)
	{
		$this->load->database();
		$queryStr='SELECT * FROM project WHERE ((Researcher1 LIKE \'%'.$user.'%\' OR Researcher2 LIKE \'%'.$user.'%\' OR Researcher3 LIKE \'%'.$user.'%\') AND PStatus = \'completed\')';
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
		$queryStr='SELECT * FROM project WHERE ProjectID = "'.$Project.'";';
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
		//echo '<br>'.$queryStr;
		$query = $this->db->query($queryStr);
		return $query;

		}
		
		//Function to get the no of on going projects for a researcher 
	function getNoProj($user)
		{
		 // SELECT Count(*) from `project` WHERE Researcher1='ankushv' or Researcher2='ankushv'or Researcher3='ankushv'
		 $this->load->database();
		 $queryStr='SELECT Count(*) as "total" from `project` WHERE Researcher1=\''.$user.'\' OR Researcher2=\''.$user.'\' OR Researcher3=\''.$user.'\'';
		 //echo $queryStr;
		 $query = $this->db->query($queryStr);
		 $result = $query->row_array();
		 //echo 'The count of projects is '.$result['total'];
		 if ($result['total']>=3)
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
		 $queryStr= 'INSERT INTO project (ProjectTitle , Description , Researcher1 , Researcher2 ,  Researcher3 , ProjectCategory , ProjectGrant , PStatus , Deliverables ) VALUES (\''.$data['title'].'\' , \'' .$data['desc'].'\' , \''.$user.'\' , \''.$data['researcher2'].'\' , \''.$data['researcher3'].'\' , \''.$data['category'].'\' , \''.$data['grant'].'\' , \'app_admin\' , \''.$data['deliverables'].'\');' ;
		//echo '<br>'.$queryStr;
		$query = $this->db->query($queryStr);
		//$result = $query->result();
		$msg='The Project has been Sent for approval';
		return $msg;
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
		$queryStr= 'INSERT INTO budget (ProjectId , dataset , communication , photocopying ,  field , stationery , domestictravel , localconveyance , accomodation , contingency , software , dessimination) VALUES (\''.$data['projectid'].'\' , \'' .$data['dataset'].'\' , \''.$data['communication'].'\' , \''.$data['photocopying'].'\' , \''.$data['field'].'\' , \''.$data['stationery'].'\' , \''.$data['domestic'].'\' , \''.$data['conveyance'].'\' , \''.$data['accomodation'].'\' , \''.$data['contingency'].'\' , \''.$data['software'].'\' , \''.$data['dessimination'].'\');' ;
		//echo '<br>'.$queryStr;
		$query = $this->db->query($queryStr);
		//$result = $query->result();
		$msg='The Account Details have been Added';
		return $msg;
	}
 	

		 
}
?>