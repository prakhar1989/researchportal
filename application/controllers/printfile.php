<?php

class printfile extends CI_Controller 
{
function index ()
{
			//echo '<p>Value received is '. $this->input->post('Choice1'). '</p>';
				/*session_start();
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
			}*/

	session_start();
	$projectID = $_GET['file'];
	$err = '<p style="color:#990000">Sorry, please try again later.</p>';
	//echo 'File is '.$projectID;
	if (!$projectID) 
	{
	// if variable $projectID is NULL or false display the message
	//echo $err;
	} 
	else 
	{			
	$this->load->model('project_model');
	  //pass the projectId of the selected project
	 
	 echo '<FORM name="approveProject" method= POST action="">';
	
	 $Query= $this->project_model->projectInfoNewProject($projectID);
	 
	 $this->load->database();
	 $queryStr='Select *From project where  project.ProjectID = "'.$projectID.'"';
	 $result = $this->db->query($queryStr);
	 foreach ($result->result() as $row)
		 {
		 echo '<table class="table table-bordered"> 
		
		 <thead>
				<tr>
				</tr>
		</thead>
		<tbody>';

		foreach($Query->result() as $row)
		 {
		 echo '<Table>
		 <TR><TD style="font-weight:bold" align = center colspan=6>';
		 $path = "image/iimclogo";
		 $Files = glob($path."*.*");
		 foreach ($Files as $File)
			{
			echo '<IMG src="'.$File.'" border="0" width ="100" height="100">';
			}	
		 echo '</TD></TR>
		 <TR><TD style="font-weight:bold" align = center colspan=6>INDIAN INSTITUE OF MANAGEMENT CALCUTTA</TD></TR>
		 <TR><TD style="font-weight:bold" align = center colspan=6>Fellow Programme and Research</TD></TR>
		 <TR><TD style="font-weight:bold" align = center colspan=6></TD></TR>
		 <TR><TD align = center colspan=6><u>Inter-office Memo</u></TD></TR>
		 <TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=3><u>To : </TD><TR></TR><TR></TR>
		 <TR><TD align = left colspan=3>C.C : </TD></TR><TR></TR><TR></TR>
		 <TR><TD align = left colspan=6>From : </TD></TR><TR></TR><TR></TR>
		 <TR><TD align = left colspan=6>Subject : Research Project Application by Prof. '.$row->Researcher1.'';
		 if ($row->Researcher2 != '')
			echo ', Prof.'.$row->Researcher2;
		if ($row->Researcher3 != '')
			echo ', Prof.'.$row->Researcher3;
		
		 
		 echo '</TD></TR>
		 <TR><TD align = left colspan=6>'.date("Y-m-d").'</TD></TR>
		 <TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=6>The Research Subcommittee of the FPR Committee has approved the following Research Project proposal submitted by Prof. '.$row->Researcher1.'';
		 if ($row->Researcher2 != '')
			echo ', Prof.'.$row->Researcher2;
		if ($row->Researcher3 != '')
			echo ', Prof.'.$row->Researcher3;
		
		 echo '. Please issue a Work Order for the project.</TD></TR>
		 <TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=6>Title of the Project : '.$row->ProjectTitle.'</TD></TR>
		 <TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=6>Researcher : Prof.'.$row->Researcher1.'';
		 if ($row->Researcher2 != '')
		echo '   Prof.'.$row->Researcher2;
		 if ($row->Researcher3 != '')
		echo 'Prof.'.$row->Researcher3;
		echo '</TD></TR>
		 <TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=6>Project Category : '.$row->ProjectCategory.'</TD></TR>
		 <TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=6>Project Grant : '.$row->ProjectGrant.'</TD></TR>
		 <TR><TD align = left colspan=6><br></TD></TR>';
		//$date1 = new DateTime("2007-03-24");
		//$date2 = new DateTime("2009-06-26");
		//$datetime = strtotime($row->createdate);
		//$mysqldate = date("Y-m-d H:i:s", $datetime);
		//strtotime($row->App_Date)
		//strtotime($row->End_Date)
		//$interval = $date1->diff($date2);
		 //echo '<TR><TD align = left colspan=6>Proposed Time Frame : '.date_diff(date_create(date("Y-m-d H:i:s",strtotime($row->Start_Date))),date_create(date("Y-m-d H:i:s",strtotime($row->End_Date)))).'</TD></TR>';
		 $interval = date_diff(date_create($row->Start_Date),date_create($row->End_Date));
		 echo '<TR><TD align = left colspan=6>Proposed Time Frame : '.$interval->format('%d days').'</TD></TR>';
		 if($row->PStatus == "approved")
		 {
		 $path = "image/chairman";
		 $Files = glob($path."*.*");
		 //echo '$$$$$$';
		 foreach ($Files as $File)
			{
			
			echo '<TR><TD align = left colspan=6><IMG src="'.$File.'" border="0" width ="100" height="100"></TD></TR>';
			}		
		 }
		 else
		 {
			echo'<TR><TD align = left colspan=6><br></TD></TR><TR><TD align = left colspan=6><br></TD></TR><TR><TD align = left colspan=6><br></TD></TR>';
		 }
		 echo '</TD><TD align = left colspan=2>';
		 
		 echo '<TR><TD align = left colspan=6>(Prof. Biswatosh Saha)</TD></TR>
		 <TR><TD align = left colspan=2>';
		 if($row->comm_approval == 2 || $row->comm_approval == 5 || $row->comm_approval == 6 || $row->comm_approval == 9)
		 {
		 $path = "image/1";
		 $Files = glob($path."*.*");
		 foreach ($Files as $File)
			{
			echo '<IMG src="'.$File.'" border="0" width ="100" height="100">';
			}		
		 }
		 else
		 {
			echo '';
			//echo'<TR><TD align = left colspan=6><br></TD></TR>';
		 }
		 echo '</TD><TD align = left colspan=2>';
		 if($row->comm_approval == 3 || $row->comm_approval == 5 || $row->comm_approval == 7 || $row->comm_approval == 9)
		 {
		 $path = "image/2";
		 $Files = glob($path."*.*");
		 foreach ($Files as $File)
			{
			echo '<IMG src="'.$File.'" border="0" width ="100" height="100">';
			}		
		 }
		 else
		 {
			echo '';
			//echo '<TR><TD align = left colspan=6><br></TD></TR>';
		 }
		 echo '</TD><TD align = left colspan=2>';
		 if($row->comm_approval == 4 || $row->comm_approval == 6 || $row->comm_approval == 7 || $row->comm_approval == 9)
		 {
		 $path = "image/3";
		 $Files = glob($path."*.*");
		 foreach ($Files as $File)
			{
			echo '<IMG src="'.$File.'" border="0" width ="100" height="100">';
			}		
		 }
		 else
		 {
			echo '';
			//echo '<TR><TD align = left colspan=6><br></TD></TR>';
		 }
		 echo '</TD></TR>
		 <TR><TD align = left colspan=2>(Prof. Bhaskar Chakrabarti)</TD><TD align = left colspan=2>(Prof.Somprakash Bandyopadhyay)</TD><TD align = left colspan=2>(Prof.Amit Dhiman)</TD></TR>
		 <TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=6><u><b>Encl. : </b>Research Proposal of Prof.'.$row->Researcher1.'</u></TD></TR>
		 ';
		 }
		 echo '</tbody> ';
		echo '<TR><TD align = center colspan=6><INPUT TYPE="button" onClick="window.print()" value="  Print  "></TR></Table></TABLE>';
		}
	}
} 	
}	
	
	?>
	