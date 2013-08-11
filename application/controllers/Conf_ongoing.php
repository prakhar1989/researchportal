<?PHP

class Conf_ongoing extends CI_Controller {
	
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
			header("location:login");
			}
		}
	function load_php()
				{
				echo '<h1> Approved Applications </h1>';
				//Load the project model
                //Query for the ongoing projects (!= completed and rejected)
				// Display the results
                
				$this->load->model('conference_model');
				$status='approved';
				$Query= $this->conference_model->conference_status($status);
				
				 echo '					 <FORM METHOD=POST ACTION="Conf_ongoing/archived"><table class="table table-bordered"> 
					
					 <thead>
							<tr>
							</tr>
					</thead>
					<tbody>';
					 
					$tableHeader= '<TR><TD><h4>Faculty Name</h4></TD><TD><h4>Conference Title</h4></TD><TD><h4>App_Date</h4></TD><TD><h4>Date of Conference</h4></TD><TD><h4>Paper Title</h4></TD><TD><h4>Co Researcher</h4></TD><TD><h4>Source of Funding</h4></TD>';
					if($_SESSION['usertype']==1){
						$tableHeader=$tableHeader.'<TD></TD>';
					}
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
						 if($_SESSION['usertype']==1){
							echo '</TD><TD><INPUT TYPE="RADIO" NAME="Choice1" VALUE="'.$row->ConferenceId.'"></TD>';
						 }
						 echo '</TR>';

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
					 if($_SESSION['usertype']==1){
						echo '<input type=submit name = "submit" value = "Print"><input type=submit name = "submit" value = "Send to Archive"></FORM>';
					}
				}
	//only called by admin
	function archived()
	{
			session_start();
		$data['myClass']=$this;
		//$data['action']=1;
		$this->load->model('conference_model');
		if($_POST['submit']=='Print'){
		 //
		 header("Location: /rp/ConfPrintApproved?Conf_id=".$_POST['Choice1']);
		} else if($_POST['submit']=='Send to Archive') {
			//$data['msg']='Archived';
			$Query= $this->conference_model->changeStatus('completed',$_POST['Choice1']);
			//$this->load->view('layout',$data);
			$msg='The Conference has been sent to Archives';
			require('showMsg.php');
			$showMsg=new showMsg();
			$showMsg->index($msg,'admin');
		}
	}
	}


?>
