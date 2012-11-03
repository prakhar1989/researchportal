<?PHP

class C_accounts extends CI_Controller {
	
	function index()
		{
			
			$data['myClass']=$this;
					$data['action']=0;
					$this->load->view('layout',$data);
		}
	function load_php()
				{
				//Load the project model
                //Query for the ongoing projects (!= completed and rejected)
				// Display the results
                
				$this->load->model('conference_model');
				//$status='approved';
				$Query= $this->conference_model->allConferences();
				
				echo '<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
					 ';
				echo '
				<h1>Account Details</h1>
				<FORM METHOD=POST ACTION="Show_C_Account">
                <table class="table table-bordered">
				<TR><TD><h4>Select</h1></TD><TD><h4>ConferenceTitle</h4></TD><TD><h4>ConferenceId</h4></TD><TD><h4>Description</h4></TD><TD><h4>ConferenceCategory</TD><TD><h4>ConferenceGrant</TD><TD><h4>Start_Date</TD><TD><h4>Researcher1 </h1>
				<tbody>';
	 
					 foreach($Query->result() as $row)
					 {
					     echo '<TR><TD><INPUT TYPE="RADIO" NAME="Choice1" VALUE="'.$row->ConferenceId.'"></TD>';
						 echo '<TD>';
						 print $row->ConferenceTitle;
						 echo '</TD><TD>';
						 print $row->ConferenceId;
						 echo '</TD><TD>';
						 print $row->Description;
						 echo '</TD><TD>';
						 print $row->ConferenceCategory;
						 echo '</TD><TD>';
						 print $row->ConferenceGrant;
						 echo '</TD><TD>';
						 print $row->Start_Date;
						 echo '</TD><TD>';
						 print $row->Researcher1;
						 
					 }
				echo '</tbody></TABLE>
				<INPUT TYPE=SUBMIT value="View Account Details">
					</FORM>';
				}
	
	}


?>
