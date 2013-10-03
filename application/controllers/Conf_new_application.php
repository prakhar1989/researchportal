<?php

class Conf_new_application extends CI_Controller {

				function index()
				{
					session_start();
					$data['myClass']=$this;
					$data['action']=0;
				//	$this->load->view('layout',$data);
					//vridhi
					if($_SESSION['usertype']==1){
						$this->load->view('layout',$data);
					} elseif ($_SESSION['usertype']==2){
						$this->load->view('layoutComm',$data);
					} elseif($_SESSION['usertype']==3){
						$this->load->view('layoutChairman',$data);
					}
				}

				function load_php()
				{
					 
					 $this->load->model('conference_model');
					 $data['query']= $this->conference_model->getConferences();
					 
					 echo '
                     <h1>New Applications</h1>
					 <FORM METHOD=POST ACTION="Conf_show">
                     <table class="table table-bordered">
 					
					<TR><TD><h4>Faculty Name</h4></TD><TD><h4>Conference Title</h4></TD><TD><h4>Application Date</h4></TD><TD><h4>Conference Date</h4></TD><TD><h4>Co Author (if any)</h4></TD><TD><h4>Financial Support Sought for</h4></TD><TD><h4>Faculty Category</h4></TD><TD><h4>Select</h4></TD></TR>
                     ';
					 $flag=0;
					 foreach($data['query'] as $row)
					 {
					  if  (($_SESSION['username']=='fprcomm1') AND($row->comm_approval == 2 || $row->comm_approval== 8 || $row->comm_approval== 9 ))
						 {
							continue;
						 }
						 elseif (($_SESSION['username']=='fprcomm2') AND ($row->comm_approval == 6 || $row->comm_approval == 8 || $row->comm_approval == 13 ))
						 {
						   continue;
						 }
						 elseif (($_SESSION['username']=='fprcomm3') AND($row->comm_approval ==7 || $row->comm_approval ==9 || $row->comm_approval ==13 ))
						 {
						   continue;
						 }
						 
						 
						 $flag++;
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
						 print $row->Researcher2;
						 echo '</TD><TD>' . getFinancialSupportText($row) . '</TD><TD>';
						 if($row->FacultyCategory == 1)
						 	 print "Full Time";
						if($row->FacultyCategory == 2)
						 	 print "Part Time Visiting Faculty/Faculty on Probation";
						 echo '</TD><TD><INPUT TYPE="RADIO" NAME="Choice1" VALUE="'.$row->ConferenceId.'"></TD></TR>';
					 }
					 if($flag==0){
					 echo '<h4>No New Applications</h4> <br > </TABLE>';
					 }
					 else
					 {
					 echo '</TABLE>
					 <INPUT TYPE=SUBMIT value= "View Details" name="View">
					</FORM>';
					 }
				
				 
				 
				 
				}

}


?>
