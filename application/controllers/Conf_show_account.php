<?php

class Conf_show_account extends CI_Controller {

				function index()
				{
					session_start();
					$data['myClass']=$this;
					$data['action']=0;
					$this->load->view('layout',$data);
					
				}

				function load_php()
				{
					 
					 
					 $this->load->model('conference_model');
					 //1.get the account details of the project
					 $Conference = $this->input->post('Choice1');
					 $data['query']= $this->conference_model->getC_Account($Conference);
					 
					 echo '
					 <FORM METHOD=POST ACTION="AddC_Account">
					 <TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
                     <h1>Account Details</h1>
						<table class="table table-bordered">
					<tr><TD><h4>Date</h4></TD><TD><h4>ConferenceId</h4></TD><TD><h4>Registration Charges</h4></TD><TD><h4>Travel</h4></TD><TD><h4>Accomodation</h4></TD><TD><h4>Per Diem</h4></TD></tr>
					
					<tbody>';
					
					 foreach($data['query'] as $row)
					 {
						 
						 echo '<TR><TD>';
						 print $row->date;
						 echo '</TD><TD>';
						 print $row->ConferenceId;
						 echo '</TD><TD>';
						 print $row->registrationCharges;
						 echo '</TD><TD>';
						 print $row->travel;
						 echo '</TD><TD>';
						 print $row->stay;
						 echo '</TD><TD>';
						 print $row->perDiem;
						 echo '</TD></TR>';
						 
					 }
					 				 
					 echo '</tbody>
					 </TABLE>
					 <input type= submit value= "ADD" name="add"><input type="hidden" name=conferenceID value="'.$Conference.' " >
					</FORM>';
					
				
				 
				 
				 
				}

}


?>