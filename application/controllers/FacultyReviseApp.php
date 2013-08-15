<?PHP

class FacultyReviseApp extends CI_Controller {
	
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
	function explode_dn($dn, $with_attributes=0)
						{
							ini_set( "display_errors", 0); 
							$result = ldap_explode_dn($dn, $with_attributes);
							foreach($result as $key=>$value){
							  $result[$key] = preg_replace("/\\\([0-9A-Fa-f]{2})/e", "''.chr(hexdec('\\1')).''", $value);
							}
							return $result;
						}	
	function load_php()
				{
				error_reporting(E_ERROR | E_PARSE);
				ini_set( "display_errors", 0);  
					
				$ProjectID = $_SESSION['ProjectID'];
				echo '<INPUT TYPE="HIDDEN" NAME="ProjectSelected" VALUE="'.$ProjectID.'">	';
				//echo $ProjectID;
				//echo 'jai mata di';
				//Load the project model
				$this->load->model('project_model');
				$result= $this->project_model->projectSearchByID($ProjectID);
				foreach ($result->result() as $row){
				//if ($row->PStatus = "")
				$status= "app_admin";
				//echo '<p> hello this is the Project Details Page </p>';
				// Display the results
					 echo '
					<p>Please use the form below to edit the details of a new project</p>
					<form name="application" method=POST action="FacultyReviseApp/insert"  enctype="multipart/form-data"><table class="table table-bordered">
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
							<td><b>'.$row->ProjectTitle.'</b></td>
						</tr>
						<tr>
							<td>Project Description</td>
							<td><input type="file" name="file_desc" id="file_desc" /></td>
						</tr>
						<tr>
							<td>Project Deliverables</td>
							<td><table>
							<tr>Please select all the deliverable applicable from below</tr>
							<tr><td>Cases</td><td><input type="checkbox" value="1" name="casesCB" onClick="enableMe(\'cases\');" /></td><td><input type="text" disabled="disabled" name="cases" placeholder="No of Cases" ></td></tr>
							<tr><td>Journals</td><td><input type="checkbox" value="1" name="journalsCB" onClick="enableMe(\'journals\');" /></td><td><input type="text" disabled="disabled" name="journals" placeholder="No of Journals" ></td></tr>
							<tr><td>Book Chapters</td><td><input type="checkbox" value="1" name="chaptersCB" onClick="enableMe(\'chapters\');" /></td><td><input type="text" disabled="disabled" name="chapters" placeholder="No of Chapters" ></td></tr>
							<tr><td>Conference</td><td><input type="checkbox" value="1" name="conferencesCB" onClick="enableMe(\'conferences\');" /></td><td><input type="text" disabled="disabled" name="conferences" placeholder="No of Conferences" ></td></tr>
							<tr><td>Work Paper</td><td><input type="checkbox" value="1" name="papersCB" onClick="enableMe(\'papers\');" /></td><td><input type="text" disabled="disabled" name="papers" placeholder="No of Work Papers" ></td></tr>
							<tr><td>Books</td><td><input type="checkbox" value="1" name="booksCB" onClick="enableMe(\'books\');" /></td><td><input type="text" disabled="disabled" name="books" placeholder="No of Books" ></td></tr>
							</table></td>													
						</tr>';
						
						
						// LDAP Connection

							//*******************Uncomment on Server*********************
/*
							$username="ashishkj11";
							$ldapHost="192.168.1.103";
							$ldapPort=389;
							$ds = ldap_connect($ldapHost, $ldapPort) or die('Could not connect to $ldaphost');
							if ($ds) {
								$r = ldap_bind($ds);
								$query = ldap_search($ds, "ou=Group,dc=iimcal,dc=ac,dc=in", "cn=Faculty");
								$data = ldap_get_entries($ds, $query);
								$namescsv ="[";
								$namesarray= array();
								foreach($data[0]['member'] as $member) {
									$member_dn = $this->explode_dn($member);
									$member_cn = str_replace("cn=","",$member_dn[0]);
									$namescsv.="\"".$member_cn."\", ";
									array_push($namesarray, $member_cn);
								};
								$namescsv.="\"\"]";

							} else { $member_cn = Nil; }
							*/
							//*******************Uncomment on Server*********************

							

							
							echo'
							<div class="container-narrow">
							<tr>
							<td>Co-Researcher 1 ID</td>
							<td>
							<input type="text" name="researcher2" placeholder = "'.$row->Researcher2.'" class="names_text" style="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source=\''.$namescsv.'\'></input> 
							</td>
							</tr>
							<tr>
							<td>Co-Researcher 2 ID</td>
							<td>
							<input type="text" name="researcher3" placeholder = "'.$row->Researcher3.'" class="names_text" style="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source=\''.$namescsv.'\'></input> 
							</td>
							</tr>
							';
						  
						
						echo '
							<tr>
						<td>Project Category</td>
							<td>
							<select name="category" id = "cat" onchange = "MyFunction1()">
							  <option value="1">Category 1 (IIM C)</option>
							  <option value="2">Category 2 (IIM C)</option>
							  <option value="3">Category 3 (IIM C)</option>
							  <option>Externally Funded Project </option>
							  
							  
							</select>
						</td>
						</tr>
						<tr>
						<!--<input type="textarea" name="Reference" id="ref_details" style="display: none;" />-->
						<td>
						 <font color="#a0a0a0">
						Reference Details (For Category 2 and Category 3 Projects)
						<br>Please enter the details in following format
						<br>Name
						<br>Contact
						<br>Email
						<br>Address
						</font>
						</td>
						<td><textarea rows	= "12"  name="Reference" style= "width: 400px;" id="ref_details" disabled = "disabled"></textarea></td>
						
						</tr>
						<tr>
							<td>Project Grant</td>
							<td><input type="text" class="large" name="grant"></input></td>
						</tr>
						<tr>
							<td>Proposed Time Frame after project initiation months </td>
							<td><input type="text" class="large"></input></td>
						</tr>
						<tr>
							<td>Extra comments</td>
							
							<td><textarea name="comment" ></textarea></td>
						
						</tr>
					</tbody>
					</table>

					<input type="submit" value="Apply" class="btn btn-large btn-primary"></input><input type="hidden" name=projectID value="'.$ProjectID.' " ></input><input type="hidden" name=status value="'.$status.' " ></input></form>
				
					
					
					';	
					
					//<a href="downloadfile?file=researchportal%283%29.txt">Download file</a>
					
					
			
                }
				
				}
function insert()
			{
			 session_start();
			 $ProjectID = $_SESSION['ProjectID'];
			  if (isset($_POST['Reference'])) {
			 $data['reference'] = addslashes(trim(nl2br($_POST['Reference'])));
			 } else {
			 $data['reference'] = "";

			 }
			 //echo 'The value of Project category is: '.$_POST['category'];
			 if(isset($_POST['casesCB']))
			 {
				//echo 'cases CB is it chcked ? ';
				$data['cases']=$_POST['cases'];
			 }
			 else
			 {
			 $data['cases']=0;
			 }
			 
			 if(isset($_POST['journalsCB']))
			 {
				//echo 'journals CB is it checked ? ';
				$data['journals']=$_POST['journals'];
			 }
			 else
			 {
			 $data['journals']=0;
			 }
			 
			 if(isset($_POST['chaptersCB']))
			 {
				$data['chapters']=$_POST['chapters'];
				//echo 'chapters CB is it checked ? ';
			 }
			 else
			 {
			 $data['chapters']=0;
			 }
			 
			 if(isset($_POST['conferencesCB']))
			 {
				$data['conferences']=$_POST['conferences'];
				//echo 'conference CB is it checked ? ';
			 }
			 else
			 {
			 $data['conferences']=0;
			 }
			 
			 if(isset($_POST['papersCB']))
			 {
				$data['papers']=$_POST['papers'];
				//echo 'papers CB is it checked ? ';
			 }
			 else
			 {
			 $data['papers']=0;
			 }
			 
			 if(isset($_POST['booksCB']))
			 {
				$data['books']=$_POST['books'];
				//echo 'papers CB is it checked ? ';
			 }
			 else
			 {
			 $data['books']=0;
			 }
			 
			 //$data['title']=$_POST['title'];
			 //$data['desc']=$_POST['desc'];
			 //$data['researcher2']=$_POST['researcher2'];
			 //$data['researcher3']=$_POST['researcher3'];
			 $data['grant']=$_POST['grant'];
			 $data['deliverables']="dummy_Deliverable";
			 $data['category']=$_POST['category'];			
			//$data['']=$_POST[''];
			
			$this->load->model('project_model');
			
		    $this->project_model->insertProjectRevision($_SESSION['username'],$data,$_POST['status'],$ProjectID);
			//	$ProjectId=900;
			 //$ProjectId=$this->project_model->insertProject($_SESSION['username'],$data);
			 //Uploading the file code... Can be modified to check the file extension if required
			 $ext=end(explode('/', $_FILES['file_desc']['type']));
			 move_uploaded_file($_FILES['file_desc']["tmp_name"],"upload/" . $ProjectID.'_description.'.$ext);
			// echo "Stored in: " . "upload/" . $_FILES["file_desc"]["name"];

			//if(isset($_POST['commentCB']))
			//{
				if(!isset($_POST['comment']) || strlen(trim($_POST['comment'])) == 0)
				{
				}
				else
				{
					$this->load->model('project_model');
					$this->project_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$ProjectID,addslashes(trim($_POST['comment'])),"faculty_application_revision");
				}
				
			//}
			
			 $msg='The Project has been sent for approval ';
			 require('showMsg.php');
			 $showMsg=new showMsg();
			 $showMsg->index($msg,'faculty');
			}				
	}


?>
<script>
function MyFunction1()
{
	if (document.getElementById('cat').value == 2 || document.getElementById('cat').value == 3){
       //document.getElementById('ref_details').style.display = 'block';}
	   document.getElementById('ref_details').disabled = false;}
   else {
   //document.getElementById('ref_details').style.display = 'none';
   document.getElementById('ref_details').disabled = true;
   }
	/*var names = "";
	var sel = document.getElementById("cat");
	if (sel.options[sel.selectedIndex].value == "Category 2 (IIM C)" || sel.options[sel.selectedIndex].value == "Category 3 (IIM C)")
	{
	names = prompt("Please Enter external reference name and email","");
	}
	document.application.hidden2.value = names;*/

}
function enableMe(fld)
{
	eval('window.document.application.'+fld+'.disabled = !window.document.application.'+fld+'CB'+'.checked');

}
</script>