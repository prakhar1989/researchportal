<?php

class ConfPrintApproved extends CI_Controller 
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
	$conferenceID = $_GET['Conf_id'];
	$err = '<p style="color:#990000">Sorry, please try again later.</p>';
	//echo 'File is '.$conferenceID;
	if (!$conferenceID) 
	{
	// if variable $conferenceID is NULL or false display the message
	//echo $err;
	} 
	else 
	{			
	$this->load->model('conference_model');
	  //pass the conferenceID of the selected project
	 
	 echo '<FORM name="approveConference" method= POST action="">';
	
	 $Query= $this->conference_model->conferenceInfoNewConference($conferenceID);
	 
	 $this->load->database();
	 $queryStr='Select * From conference where conference.conferenceID = "'.$conferenceID.'"';
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
		 <TR><TD style="font-weight:bold" align = center colspan=6>Fellow Programme and Research Office</TD></TR>
		 <TR><TD style="font-weight:bold" align = center colspan=6></TD></TR>
		 <TR><TD align = center colspan=6><u>Inter Office Memo</u></TD></TR>
		 <TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=3>To : The Director, IIMC</TD><<TR></TR><TR></TR>
		 <TR><TD align = left colspan=6>From : Research Sub-committee of the FPR Committee</TD></TR><TR></TR><TR></TR>
		 <TR><TD align = left colspan=6>Subject : International Conference Application of Prof. '.$row->Researcher1.'';
		 //if ($row->Researcher2 != '')
		//	echo ', Prof.'.$row->Researcher2;
		echo '</TD></TR>
		<TR><TD align = left colspan=6></TD></TR>
		<TR><TD align = left colspan=6></TD></TR>
		  <TR><TD align = left colspan=6>Date : '.date("Y-m-d").'</TD></TR>
		 <TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=6>Dear Sir, </TR>
		 <TR><TD align = left colspan=6>I would like to apply for the Institute\'s financial support to present my paper in an International Conference, vide the following details:</TD></TR>';
		
		 echo '<TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=6>Nameof Conference: '.$row->ConferenceTitle.'</br></TD></TR>
		 <TR><TD align = left colspan=6>Venue: '.$row->Venue.'</TD></TR>
		 <TR><TD align = left colspan=6>Dates of Conferences: '.$row->Start_Date.' to '.$row->End_Date.'</TD></TR>
		 <TR><TD align = left colspan=6>Title of paper to be presented: '.$row->ConferenceTitle.'</TD></TR>
		 <TR><TD align = left colspan=6>Co-author details : Prof.'.$row->Researcher2;
		echo '</TD>
		<TR><TD align = left colspan=6><br></TD></TR>
		<TR><TD align = left colspan=6>This is my '.$row->No_Conferences.' conference support requisition in the current three year block 01.04.'.(2007+3*$row->Block_number).' - 31.03.'.(2010+3*$row->Block_number).'</TD></TR>
		<TR><TD align = left colspan=6><br></TD></TR>
		<TR><TD align = left colspan=6>I declare that I am not receiving financial support from any other source for the conference.</TD></TR>
		<TR><TD align = left colspan=6><br></TD></TR>
		<TR><TD align = left colspan=6>Application contains a copy of the "letter of acceptance" by the conference organizers.</TD></TR>
		<TR><TD align = left colspan=6><br></TD></TR>
		<TR><TD align = left colspan=6>Financial support sought for : </TD></TR>
		<TR><TD>Air Fare </TD><TD> Local Travel </TD><TD> Registration Fees </TD></TR>
		<TR><TD> Per Diem</TD><TD>Visa</TD><TD>Medical Insurance</TD></TR>
		<TR><TD align = left colspan=6><br></TD></TR>
		<TR><TD align = left colspan=6>Application contains the full paper to be presented.</TD></TR>
		<TR><TD align = left colspan=6><br></TD></TR>
		<TR><TD align = left colspan=6>Application contains the details of the registration fees.</TD></TR>
		<TR><TD align = left colspan=6><br></TD></TR>
		<TR><TD align = left colspan=6>I am a '.$row->FacultyCategory.' Faculty, hence Group Recommendation is ';
		if ($row->FacultyCategory='Full Time')
			echo 'not ';	
		echo 'attached.</TD></TR>
		<TR><TD align = left colspan=6><br></TD></TR>
		<TR><TD align = left colspan=6>I have given a soft copy of paper presented in the previous conference to FPR Office.</TD></TR>
		<TR><TD align = left colspan=6><br></TD></TR>
		
		<TR><TD align = left colspan=6><br></TD></TR>
		';
		 if($row->CStatus == "approved")
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
			echo'<TR><TD align = left colspan=6><br></TD></TR><TR><TD align = left colspan=6><br></TD></TR><TR><TD align = left colspan=6><br></TD></TR>';
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
			echo'<TR><TD align = left colspan=6><br></TD></TR><TR><TD align = left colspan=6><br></TD></TR><TR><TD align = left colspan=6><br></TD></TR>';
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
			echo'<TR><TD align = left colspan=6><br></TD></TR><TR><TD align = left colspan=6><br></TD></TR><TR><TD align = left colspan=6><br></TD></TR>';
		 }
		 echo '</TD></TR>
		 <TR><TD align = left colspan=2>(Prof. Bhaskar Chakrabarti)</TD><TD align = left colspan=2>(Prof.Somprakash Bandyopadhyay)</TD><TD align = left colspan=2>(Prof.Amit Dhiman)</TD></TR>
		 <TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=6><u><b>Encl. : </b>Application of Prof. '.$row->Researcher1.'</u></TD></TR>
		 ';
		 }
		 echo '</tbody> ';
		echo '<TR><TD align = center colspan=6><INPUT TYPE="button" onClick="window.print()" value="  Print  "></TR></Table></TABLE>';
		}
	}
} 	
}	
	
	?>
	