<?PHP

class extension_chairman extends CI_Controller 
	{
	function index()
		{
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
			header("location:login");
			}
		}
	function load_php()
				{
				echo '<h1>Extensions</h1>';
				echo '<p> This is the Extension page. The Requests for project extenions to be showed here</p>';
				//session_start();
				$this->load->model('project_model');
				$Query= $this->project_model->project_extension_chairman();
				//$Query1= $this->project_model->project_extension_chairmanFirstApprovals();
				echo '<FORM METHOD=POST ACTION="ExtensionCheckChairmanRequest">
				
					<p><br><br></p>
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
					 <table class="table table-bordered">
					<tr><TD><h4>ProjectTitle</h4></TD><TD><h4>Description</h4></TD><TD><h4>ProjectCategory</h4></TD><TD><h4>ProjectGrant</h4><TD><h4>Start_Date</h4></TD><TD><h4>End_Date</h4></TD><TD><h4>Period</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</TD><TD><h4>Comments</h4></TD><TD><h4>Select</h1></TD></tr>
					<tbody>';
					echo 'Projects Reviewed by Committee';
					 foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->Description;
						 echo '</TD><TD>';
						 print $row->ProjectCategory;
						 echo '</TD><TD>';
						 print $row->ProjectGrant;
						 echo '</TD><TD>';
						 print $row->Start_Date;
						 echo '</TD><TD>';
						 print $row->End_Date;
						 echo '</TD><TD>';
						 print $row->Period;
						 echo '</TD><TD>';
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Researcher3;
					         echo '</TD><TD>';
						  //vridhi--display comments below
						 $Result=$this->project_model->getComment($row->ProjectId, $_SESSION['usertype']);
						 foreach($Result as $row1)
						 {
							 echo '<p>'.$row1->Date.' ; '.$row1->User.': '.$row1->Comment.'</p>';
						 }
						 echo '</TD><TD><INPUT TYPE="RADIO" NAME="ProjectSelected" VALUE="'.$row->ProjectId.'"></TD></TR>';
					 }
				echo '</tbody></TABLE>
				<p>Please enter comments (mandatory)*</p>
				<p><textarea name="comment" ></textarea></p>
				
				<INPUT TYPE=SUBMIT name ="RequestType" value="Approve">
				<INPUT TYPE=SUBMIT name="RequestType" value="Reject">
				<INPUT TYPE=SUBMIT name="RequestType" value="Send For Revision">
				</FORM>';
				}
	}


?>
