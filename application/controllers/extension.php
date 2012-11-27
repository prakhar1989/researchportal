<?PHP

class Extension extends CI_Controller 
	{
	function index()
		{
			
			$data['myClass']=$this;
			$data['action']=0;
			session_start();
					
			if($_SESSION['usertype']==1){
						$this->load->view('layout',$data);
					} elseif ($_SESSION['usertype']==2){
						$this->load->view('layoutComm',$data);
					} elseif($_SESSION['usertype']==3){
						$this->load->view('layoutChairman',$data);
					}
					else{
			echo 'hello';
			header("location:login");
			}
		}
	function load_php()
				{
				echo '<h1>Extensions</h1>';
				echo '<p> This is the Extension page. The Requests for project extenions to be showed here</p>';
				$this->load->model('project_model');
				$Query= $this->project_model->project_extension();
				
				echo '<FORM METHOD=POST ACTION="ExtensionCheckAdminRequest">
				<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
					 <table class="table table-bordered">
					<tr><TD><h4>ProjectTitle</h4></TD><TD><h4>ProjectId</h4></TD><TD><h4>Description</h4></TD><TD><h4>ProjectCategory</h4></TD><TD><h4>ProjectGrant</h4><TD><h4>App_Date</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</TD><TD><h4>Select</h1></TD></tr>
					
					<tbody>';
					 foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->ProjectId;
						 echo '</TD><TD>';
						 print $row->Description;
						 echo '</TD><TD>';
						 print $row->ProjectCategory;
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
						 echo '<TD><INPUT TYPE="RADIO" NAME="ProjectSelected" VALUE="'.$row->ProjectId.'"></TD></TR>';
					 }
				echo '</tbody></TABLE>
				<INPUT TYPE=SUBMIT name ="RequestType" value="Approve">
				<INPUT TYPE=SUBMIT name="RequestType" value="Reject">
				</FORM>';
				}
	}


?>
