<?php

class FacultyProjApp extends CI_Controller {

		function index()
		{
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
					 
					 $this->load->model('project_model');
					 //$allow= $this->project_model->getNoProj('ankuhfhfhshv');
					 $allow= $this->project_model->getNoProj($_SESSION['username']);
					 if($allow==True)
					 {
						 echo '
						 <h1>New Project</h1>
					<p>Please use the form below to enter details of a new project</p>
					<form name="application" method=POST action="FacultyProjApp/insert"  enctype="multipart/form-data"><table class="table table-bordered">
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
							<td>Project Title</td>
							<td><input type="text" class="large" name="title"></input></td>
						</tr>
						<tr>
							<td>Project Description</td>
							<td><input type="file" name="file_desc" id="file_desc" /></td>
						</tr>
						<tr>
							<td>Project Deliverables</td>
							<td><table>
							<tr>Please select all the deliverable appilcable from below</tr>
							<tr><td>Cases</td><td><input type="checkbox" value="1" name="casesCB" onClick="enableMe(\'cases\');" /></td><td><input type="text" disabled="disabled" name="cases" value="No of Cases" ></td></tr>
							<tr><td>Journals</td><td><input type="checkbox" value="1" name="journalsCB" onClick="enableMe(\'journals\');" /></td><td><input type="text" disabled="disabled" name="journals" value="No of Journals" ></td></tr>
							<tr><td>Book Chapters</td><td><input type="checkbox" value="1" name="chaptersCB" onClick="enableMe(\'chapters\');" /></td><td><input type="text" disabled="disabled" name="chapters" value="No of Chapters" ></td></tr>
							<tr><td>Conference</td><td><input type="checkbox" value="1" name="conferencesCB" onClick="enableMe(\'conferences\');" /></td><td><input type="text" disabled="disabled" name="conferences" value="No of Conferences" ></td></tr>
							<tr><td>Work Paper</td><td><input type="checkbox" value="1" name="papersCB" onClick="enableMe(\'papers\');" /></td><td><input type="text" disabled="disabled" name="papers" value="No of Work Papers" ></td></tr>
							</table></td>													
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
							  <option>Category 1 (IIM C)</option>
							  <option>Category 2 (IIM C)</option>
							  <option>Category 3 (IIM C)</option>
							  <option>External Project </option>
							  <option>Other Category</option>
							  
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

					<input type="submit" value"Submit" class="btn btn-large btn-primary"></input></form>
				
					
					<a href="downloadfile?file=researchportal%283%29.txt">Download file</a>
					';	
					
					
					
					
					}
				     else 
					 {
						echo '<h3>You cant apply any more projects as of now</h3>';
					 }
				 
				 
				 
				}
			//function to insert the data into project table
			
			function insert()
			{
			 session_start();
			 //echo 'The value of Project category is: '.$_POST['category'];
			 $data['title']=$_POST['title'];
			 //$data['desc']=$_POST['desc'];
			 $data['researcher2']=$_POST['researcher2'];
			 $data['researcher3']=$_POST['researcher3'];
			 $data['grant']=$_POST['grant'];
			 $data['deliverables']="dummy_Deliverable";
			 $data['category']=$_POST['category'];			
			//$data['']=$_POST[''];
			
			$this->load->model('project_model');
		$ProjectId=$this->project_model->insertProject('absdfsf',$data);
			 //$ProjectId=$this->project_model->insertProject($_SESSION['username'],$data);
			 //Uploading the file code... Can be modified to check the file extension if required
			 $ext=end(explode('/', $_FILES['file_desc']['type']));
			 move_uploaded_file($_FILES['file_desc']["tmp_name"],"upload/" . $ProjectId.'_description.'.$ext);
			// echo "Stored in: " . "upload/" . $_FILES["file_desc"]["name"];
						 
			 $msg='The Project has been sent for approval ';
			 require('showMsg.php');
			 $showMsg=new showMsg();
			 $showMsg->index($msg,'faculty');
			}			

}


?>