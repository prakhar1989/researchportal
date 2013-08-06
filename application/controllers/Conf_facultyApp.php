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
				    <form method=POST action="Conf_facultyApp/insert" ><table class="table table-bordered">
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
					//echo 'The value of Project category is: '.$_POST['category'];
					$data['conf_name']=$_POST['conf_name'];
					$data['conf_venue']=$_POST['conf_venue'];
					$data['paper_title']=$_POST['paper_title'];
					$data['category']=$_POST['category'];
					$data['conf_date']=$_POST['conf_date'];
					$data['co_author']=$_POST['co_author'];
					//vridhi
					//block number depending on format of date
					$data['block_num']=1+floor((date("Y")-2001)/3);
					//$data['']=$_POST[''];
					$this->load->model('conference_model');
					$msg=$this->conference_model->insertConference('absdfsf',$data); // insert the real username from session
					require('showMsg.php');
					$showMsg=new showMsg();
					$showMsg->index($msg,'faculty');
				}

}


?>