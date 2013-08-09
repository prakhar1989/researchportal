<?php

class Conf_facultyApp extends CI_Controller {

				function index()
				{
					ini_set( "display_errors", 0); 
					$data['myClass']=$this;
					$data['action']=0;
					session_start();
					if($_SESSION['usertype']==4){
					$this->load->view('layoutFaculty',$data);
					} 
					else{
					header("location:login");
					}
				}

				function load_php()
				{
					 
					 $this->load->model('conference_model');
					 //vridhi changed two lines below
					 $allow=$this->conference_model->getNoConfInBlock('absdfsf'); // insert the real username from session
					 //$this->conference_model->getNoConf('ankuhfhfhshv');
					 if($allow==True)
					 {
						 echo '
						 <h1>New Conference</h1>
					<p>Please use the form below to enter details of a new conference</p>
				    <form name ="c_application" method=POST action="Conf_facultyApp/insert" enctype="multipart/form-data"><table class="table table-bordered">
					<thead>
						<tr>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Username</td>
							<td><b>'.$_SESSION['username'].'</b></td>
						</tr>
						<tr>
							<td>Name of Conference</td>
							<td><input type="text" class="large" name="conf_name"></input></td>
						</tr>
						<tr>
							<td>Venue of Conference</td>
							<td><input type="text" class="large" name="conf_venue"></input></td>
						</tr>
						<tr>
						 	<td>Conference Date (YYYY-MM-DD)</td>
						 	<td><input type="text" class="large" name="conf_date"></input></td>
						</tr>
						<tr>
							<td>Title of Paper</td>
							<td><input type="text" class="large" name="paper_title"></input></td>
						</tr>
						<tr>
							<td>Co-author (if any) [Name; Institute]</td>
							<td><input type="text" class="large" name="co_author"></input></td>
						</tr>
						<tr>
							<td>Conference Category</td>
							<td>
							<select name="category">
							  <option>International</option>
							  <option>Other</option>
							</select>
						</td>
						</tr>
						<tr>
						<td>
						Funding from
						</td><td><select name = "funding"><option>IIMC</option><option>External</option>
						</td>
						</tr>
						<tr><td>Upload Title of Paper (Full Paper)</td><td><input type="file" name="file_title" id="file_title" /></td></tr>
						<tr><td>Upload Website Registration Fees Page</td><td><input type="file" name="file_fees" id="file_fees" /></td></tr>
						<tr><td>Upload Budget Declaration Page</td><td><input type="file" name="file_budget" id="file_budget" /></td></tr>
						<tr><td>Upload Acceptance Letter</td><td><input type="file" name="file_acceptance" id="file_acceptance" /></td></tr>
					</tbody>
					</table>

					<input type="submit" value"Submit" class="btn btn-large btn-primary"></input></form>';
									
					}
				     else 
					 {
						echo '<h3>You cant apply any more conferences as of now</h3>';
					 }
				 
				 
				 
				}
				//function to insert the data into conference table
					
				function insert()
				{
					session_start();
					//echo 'The value of Project category is: '.$_POST['category'];
					$data['conf_name']=$_POST['conf_name'];
					$data['conf_venue']=$_POST['conf_venue'];
					$data['paper_title']=$_POST['paper_title'];
					$data['category']=$_POST['category'];
					$data['conf_date']=$_POST['conf_date'];
					$data['co_author']=$_POST['co_author'];
					$data['funding']=$_POST['funding'];
					$block_num= (date("Y")-2013)/3;
					if ((date("Y")-2013)%3==0){
						if (date("m")>=4) {
							$block_num= 2+floor($block_num);
						} else {
							$block_num=1+floor($block_num);
						}
					} else {
						$block_num=1+floor($block_num);
					}
			
					$data['block_num']=$block_num;
			//		if (($_FILES['file_title']['error'] === UPLOAD_ERR_OK)||($_FILES['file_fees']['error'] === UPLOAD_ERR_OK)||($_FILES['file_budget']['error'] === UPLOAD_ERR_OK)||($_FILES['file_acceptance']['error'] === UPLOAD_ERR_OK)){
						$this->load->model('conference_model');
						$ConfId=$this->conference_model->insertConference($_SESSION['username'],$data);
						$ext=end(explode('/', $_FILES['file_title']['name']));
						move_uploaded_file($_FILES['file_title']["tmp_name"],"upload/" . $ConfId.'_title.'.$ext);		           
						$ext=end(explode('/', $_FILES['file_fees']['name']));
						move_uploaded_file($_FILES['file_fees']["tmp_name"],"upload/" . $ConfId.'fees.'.$ext);		           
						$ext=end(explode('/', $_FILES['file_budget']['name']));
						move_uploaded_file($_FILES['file_title']["tmp_name"],"upload/" . $ConfId.'_budget.'.$ext);		           
						$ext=end(explode('/', $_FILES['file_acceptance']['name']));
						move_uploaded_file($_FILES['file_title']["tmp_name"],"upload/" . $ConfId.'_acceptance.'.$ext);		           
				//	}
					
					//$data['']=$_POST[''];
					//$this->load->model('conference_model');
					//$msg=$this->conference_model->insertConference('absdfsf',$data); // insert the real username from session
					$msg='The Conference has been sent for approval ';
					require('showMsg.php');
					$showMsg=new showMsg();
					$showMsg->index($msg,'faculty');
				}

}


?>