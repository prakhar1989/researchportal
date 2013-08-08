<?php

class Conf_printfile extends CI_Controller 
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
	$conferenceID = $_GET['file'];
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
		 <TR><TD style="font-weight:bold" align = center colspan=6>Fellow Programme and Research</TD></TR>
		 <TR><TD style="font-weight:bold" align = center colspan=6></TD></TR>
		 <TR><TD align = center colspan=6><u>Inter-office Memo</u></TD></TR>
		 <TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=3>To : The Director, IIMC</TD><<TR></TR><TR></TR>
		 <TR><TD align = left colspan=6>From : Research Sub-committee of the FPR Committee</TD></TR><TR></TR><TR></TR>
		 <TR><TD align = left colspan=6>Subject : International Conference Application by Prof. '.$row->Researcher1.'';
		 if ($row->Researcher2 != '')
			echo ', Prof.'.$row->Researcher2;
		echo '</TD></TR>
		<TR><TD align = left colspan=6></TD></TR>
		<TR><TD align = left colspan=6></TD></TR>
		  <TR><TD align = left colspan=6>Date : '.date("Y-m-d").'</TD></TR>
		 <TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=6>Prof. '.$row->Researcher1.'';  
		 if ($row->Researcher2 != '')	
		 echo ', Prof.'.$row->Researcher2.' has applied for the Institute\'s financial support to present his paper in an International Conference, vide the following details:';
		
		 echo '<TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=6>Name, Venue and Date of Conferences: '.$row->ConferenceTitle.'</br>'.$row->Start_Date.'</TD></TR>
		 <TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=6>Details of paper to be presented: '.$row->ConferenceTitle.'</TD></TR>
		 <TR><TD align = left colspan=6><br></TD></TR>
		 <TR><TD align = left colspan=6>Co-authorResearcher : Prof.'.$row->Researcher2.'';
		echo '</TD>
		<TR><TD align = left colspan=6><br></TD></TR>
		<TR><TD align = left colspan=6>Application contains a copy of the "letter of acceptance" by the conference organizers.</TD></TR>
		<TR><TD align = left colspan=6><br></TD></TR>
		<TR><TD align = left colspan=6>Applicant declares that he is not receiving financial support from any other source for the conference.</TD></TR>
		<TR><TD align = left colspan=6><br></TD></TR>
		<TR><TD align = left colspan=6>Application contains a \'budget statement\' whose component items tally with the Institute\'s permissible expenditure heads.</TD></TR>
		<TR><TD align = left colspan=6><br></TD></TR>
		<TR><TD align = left colspan=6>This is the applicant\'s conference support requisition in the current three-year block</TD></TR>
		<TR><TD align = left colspan=6><br></TD></TR>
		<TR><TD align = left colspan=6>In the light of the above information, the Research sub-committee of the FPR Committee recommends that the application of Prof.'.$row->Researcher1.' be considered favourably and that he be given the Institute\'s financial support as per rules.</TD></TR>
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
	