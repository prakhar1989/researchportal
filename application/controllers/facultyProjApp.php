<?php

class FacultyProjApp extends CI_Controller {

				function index()
				{
					$data['myClass']=$this;
					$data['action']=0;
					$this->load->view('layoutFaculty',$data);
				}

				function load_php()
				{
					 
					 $this->load->model('project_model');
					 $allow= $this->project_model->getNoProj('ankuhfhfhshv');
					 if($allow==True)
					 {
						 echo '
						 <h1>New Project</h1>
					<p>Please use the form below to enter details of a new project</p>
					<form method=POST action="FacultyProjApp/insert" ><table class="table table-bordered">
					<thead>
						<tr>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Project Title</td>
							<td><input type="text" class="large" name="title"></input></td>
						</tr>
						<tr>
							<td>Project Description</td>
							<td><input type="text" class="large" name="desc"></input></td>
						</tr>
						<tr>
							<td>Project Deliverables</td>
							<td><select name="deliverables">
							  <option>Case</option>
							  <option>Course</option>
						 	  <option>Preparatory</option>
							  <option>Theoretical Research</option>
						 	  <option>Secondary Research</option>
							</select></td>
						</tr>
						<tr>
							<td>Co-Researcher 1 ID</td>
							<td><input type="text" class="large" name="researcher2"></input></td>
						</tr>
						<tr>
							<td>Co-Researcher 2 ID</td>
							<td><input type="text" class="large" name="researcher3"></input></td>
						</tr>
						<tr>
							<td>Project Category</td>
							<td>
							<select name="category">
							  <option>1</option>
							  <option>2</option>
							  <option>3</option>
							</select>
						</td>
						</tr>
						<tr>
							<td>Project Grant</td>
							<td><input type="text" class="large" name="grant"></input></td>
						</tr>
						<tr>
							<td>Proposed Time Frame (redundant)<small>after project initiation</small></td>
							<td><input type="text" class="large"></input></td>
						</tr>
					</tbody>
					</table>

					<input type="submit" value"Submit" class="btn btn-large btn-primary"></input></form>';
									
					}
				     else 
					 {
						echo '<h3>You cant apply any more projects as of now</h3>';
					 }
				 
				 
				 
				}
			//function to insert the data into project table
			
			function insert()
			{
			 //echo 'The value of Project category is: '.$_POST['category'];
			 $data['title']=$_POST['title'];
			 $data['desc']=$_POST['desc'];
			 $data['researcher2']=$_POST['researcher2'];
			 $data['researcher3']=$_POST['researcher3'];
			 $data['grant']=$_POST['grant'];
			 $data['deliverables']=$_POST['deliverables'];
			 $data['category']=$_POST['category'];			
			//$data['']=$_POST[''];
			 $this->load->model('project_model');
			 $msg=$this->project_model->insertProject('absdfsf',$data);
			 require('showMsg.php');
			 $showMsg=new showMsg();
			 $showMsg->index($msg,'admin');
			}			

}


?>