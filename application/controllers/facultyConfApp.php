<?php

class FacultyConfApp extends CI_Controller {

				function index()
				{
					$data['myClass']=$this;
					$data['action']=0;
					$this->load->view('layoutFaculty',$data);
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
				    <form method=POST action="FacultyConfApp/insert" ><table class="table table-bordered">
					<thead>
						<tr>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Conference Title</td>
							<td><input type="text" class="large" name="title"></input></td>
						</tr>
						<tr>
							<td>Conference Brief</td>
							<td><input type="text" class="large" name="desc"></input></td>
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
							<td>Conference Grant</td>
							<td><input type="text" class="large" name="grant"></input></td>
						</tr>
						<tr>
						 	<td>Conference Start Date (YYYY-MM-DD)</td>
						 	<td><input type="text" class="large" name="start_date"></input></td>
						</tr>
						 <tr>
						 	<td>Conference End Date (YYYY-MM-DD)</td>
						 	<td><input type="text" class="large" name="end_date"></input></td>
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
					$data['title']=$_POST['title'];
					$data['desc']=$_POST['desc'];
					$data['grant']=$_POST['grant'];
					$data['category']=$_POST['category'];
					$data['start_date']=$_POST['start_date'];
					$data['end_date']=$_POST['end_date'];
					//vridhi
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