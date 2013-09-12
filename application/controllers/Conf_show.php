<?PHP


// 1.Show the details of the selected conference  
// 2. Approve or reject a conference

class Conf_show extends CI_Controller {

	
    
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
    // Displays the details of the conference
	function load_php(){
					 //echo 'load conference called    ';
					 $Conf = $this->input->post('Choice1');
					 //echo $conference;
					 $this->load->model('conference_model');
					  //pass the conferenceId of the selected conference
					 
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
				   <FORM name="approveConference" class = "cmxform" id="commentForm" method= "POST" action="Conf_show/approveConference">';

					 $Query= $this->conference_model->conferenceInfo($Conf);
					 echo '<table class="table table-bordered"> 
					
					 <thead>
							<tr>
							</tr>
					</thead>
					<tbody>';
					 
					$tableHeader= '<TR><TD><h4>Faculty Name</h4></TD><TD><h4>Conference Title</h4></TD><TD><h4>App_Date</h4></TD><TD><h4>Date of Conference</h4></TD><TD><h4>Paper Title</h4></TD><TD><h4>Co Researcher</h4></TD><TD><h4>Source of Funding</h4></TD>';
					/*if ($_SESSION['usertype']==3)
					{$tableHeader= $tableHeader.'<TD><h4>Committee consulted</h4>';
					}*/
					
					$tableHeader= $tableHeader.'</TR>';
					 
					 echo $tableHeader;
					 foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 print $row->ConferenceTitle;
						 echo '</TD><TD>';
						 print $row->App_Date;
						 echo '</TD><TD>';
						 print $row->Start_Date;
						 echo ' to ';
						 print $row->End_Date;
						 echo '</TD><TD>';
						 print $row->PaperTitle;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Funding;
						 if ($row->Funding == 'IIMC'){
							echo ' (Number = ';
							print $row->No_Conferences;
							echo ')';
						}
						echo '</TD></tr>';
						 /*if ($_SESSION['usertype']=='3' && $row->PStatus=='app_chairman_2')
						 {
							echo 'YES';
						 }
						 else if ($_SESSION['usertype']=='3' && $row->PStatus!='app_chairman_2')
						 {
							echo 'NO';
						 }*/
						 
						 }
					
					 
					 echo '</tbody> </TABLE>';

					$Result= $this->conference_model->getcomment($Conf, $_SESSION['usertype']);
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
					
					echo'<p><a href="downloadfile?file=upload_conf/'.$Conf.'_title">Download Conference Paper</a><br><br></p>';
					echo'<p><a href="downloadfile?file=upload_conf/'.$Conf.'_fees">Download Conference Registration Fees Details</a><br><br></p>';
					echo'<p><a href="downloadfile?file=upload_conf/'.$Conf.'_budget">Download Conference Budget Details</a><br><br></p>';
					echo'<p><a href="downloadfile?file=upload_conf/'.$Conf.'_acceptance">Download Acceptance Letter</a><br><br></p>';
<<<<<<< HEAD
=======
					echo'<p><a href="downloadfile?file=upload_conf/'.$Conf.'_grouprecommendation">Download Group Recommendation</a><br><br></p>';
>>>>>>> 6e1b6a27fa4b6ba660003e91ecd2b07ce652b0e8

					
					if ($_SESSION['usertype']==1)
					{
					 echo'<a href="Conf_printfile?file='.$Conf.'" target="_blank">Print</a><br><br>';
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
					 echo '<input type= submit value= "Forward To Chairman" name="approve"><input type= submit value= "Send for Revision" name="approve"><input type="hidden" name=conferenceID value="'.$Conf.' " >'; //Hidden to pass the conferenceId without showing it to the user
					 }
					 else if ($_SESSION['usertype']==2)
					 {
					 echo '<input type= submit value= "Forward With Approval" name="approve"><input type="hidden" name=conferenceID value="'.$Conf.' " >'; //Hidden to pass the conferenceId without showing it to the user
					 }
					 else
					 {
						if ($_SESSION['usertype']=='3' && $row->CStatus=='app_chairman_2' || $row->CStatus=='app_comm')
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
							echo '<input type= submit value= "Approve" name="approve"><input type= submit value= "Revision" name="approve"><input type="hidden" name=conferenceID value="'.$Conf.' " >';
						}
						elseif ($_SESSION['usertype']=='3' && $row->CStatus=='app_chairman_1')
						{
							echo '<input type= submit value= "Forward" name="approve"><input type= submit value= "Revision" name="approve"><input type="hidden" name=conferenceID value="'.$Conf.' " >';
						}						
					 }
					 echo '</FORM>';
				}
	
	//function to approve or reject conference based on the user's selection
	function approveConference(){
		session_start();
		$data['myClass']=$this;
		$data['action']=2;
			
		
		$this->load->model('conference_model');
		//echo '@#usertype is :'.$_SESSION['usertype'];
		//echo 'conference value:'.$_POST['conferenceID'];
		if($_POST['approve']=='Approve' OR $_POST['approve']=='Forward To Committee' OR $_POST['approve']=='Forward' OR $_POST['approve']=='Forward To Chairman' OR $_POST['approve']=='Forward With Approval')
		{
			$data['msg']='Approved';
			if($_SESSION['usertype']==1)
			{
				
				$Query= $this->conference_model->changeStatus('app_chairman_1',$_POST['conferenceID']);
				$this->conference_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['conferenceID'],addslashes(trim(nl2br($_POST['comment']))),"admin_forward");
				$this->load->view('layout',$data);
			} 
			elseif ($_SESSION['usertype']==2)
			{
				if($_SESSION['username']=="comm")
					$Query= $this->conference_model->changeStatusComm(2,'app_chairman_2',$_POST['conferenceID']);
				elseif($_SESSION['username']=="comm1")
					$Query= $this->conference_model->changeStatusComm(3,'app_chairman_2',$_POST['conferenceID']);
				elseif($_SESSION['username']=="comm2")
					$Query= $this->conference_model->changeStatusComm(4,'app_chairman_2',$_POST['conferenceID']);
				
				//$this->conference_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['conferenceID'],addslashes(trim($_POST['comment'])),"committee_approve");
				$this->load->view('layoutComm',$data);
			}
			elseif ($_SESSION['usertype']==3 && $_POST['approve']=='Approve')
			{
				
				$Query= $this->conference_model->changeStatus('approved',$_POST['conferenceID']);
				$this->conference_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['conferenceID'],addslashes(trim(nl2br($_POST['comment']))),"chairman_approve");
				$this->load->view('layoutChairman',$data);
			}
			elseif($_SESSION['usertype']==3 && $_POST['approve']=='Forward')
			{
				$to = "nippagupta@iimcal.ac.in";
				$subject = "New Conference Consultation";
				$message = "Hello,
				Chairman has sent a new conference for consultation";
				$from = "fpoffice@iimcal.ac.in";
				$headers = "From:" . $from;
				$stat = mail($to,$subject,$message,$headers);
				//echo $stat;
				$Query= $this->conference_model->changeStatus('app_comm',$_POST['conferenceID']);
				$this->conference_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['conferenceID'],addslashes(trim(nl2br($_POST['comment']))),"chairman_approve");
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
							$Query= $this->conference_model->changeStatus('revisionAdmin',$_POST['conferenceID']);
							$this->conference_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['conferenceID'],addslashes(trim(nl2br($_POST['comment']))),"admin_reject");
							$this->load->view('layout',$data);
			}
			elseif ($_SESSION['usertype']==2)
			{
							
							$this->conference_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['conferenceID'],addslashes(trim(nl2br($_POST['comment']))),"committee_reject");
							$this->load->view('layoutComm',$data);
			}
			elseif ($_SESSION['usertype']==3)
			{
							$Query= $this->conference_model->changeStatus('revisionChairman',$_POST['conferenceID']);
							$this->conference_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$_POST['conferenceID'],addslashes(trim(nl2br($_POST['comment']))),"chairmain_reject");
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
			echo 'Conference has been sent for consultation.';
			}
		else
			{
			echo 'Conference has been sent for revision.';
			}
		/* $queryStr='SELECT PStatus FROM conference WHERE conferenceId = "'.$value.'";';
		// echo $queryStr;
		$query = $this->db->query($queryStr);
		
		if($_SESSION['usertype']==3 && ){
		if($status=='Approved')
			{
			echo 'conference has been approved.';
			}
		else
			{
			echo 'conference has been sent for revision.';
			}
		}
		else{
		if($status=='Approved')
			{
			echo 'conference has ***** been sent for consultation.';
			}
		else
			{
			echo 'conference has been sent for revision.';
			}
		} */
		
	}
}
?>