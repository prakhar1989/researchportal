<?PHP

class FacultyRevisionCheck extends CI_Controller 
{
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
				echo '<FORM METHOD=POST action="FacultyRevisionCheck/insert" enctype="multipart/form-data">';
				$this->load->model('project_model');
				//session_start();
				$_SESSION['ProjectID'] = $_POST['ProjectSelected'];
				$ProjectID = $_POST['ProjectSelected'];
				//echo $ProjectID;
				echo'
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							';
					if ($_POST['RequestType'] == 'Edit New Application')
						{
						header("Location: /rp/FacultyReviseApp");
						} 
					else if ($_POST['RequestType'] == 'Edit Extension') 
						{
						header("Location: /rp/FacultyRevExt");
						}
					else if ($_POST['RequestType'] == 'Edit Completion') 
						{
						
						$this->load->database();
						$this->load->model('project_model');
						$queryStr='Select * from project where ProjectId = "'.$ProjectID.'";';
						$query = $this->db->query($queryStr);
						$countpromised = 0;
						foreach($query->result() as $row)
							{
							$countpromised = $countpromised + $row->Deliverables;
							$countpromised = $countpromised + $row->cases;
							$countpromised = $countpromised + $row->journals;
							$countpromised = $countpromised + $row->chapters;
							$countpromised = $countpromised + $row->conference;
							$countpromised = $countpromised + $row->paper;
							$countpromised = $countpromised + $row->books;
							}
						echo '<br>Number of Deliverables promised: '.$countpromised;
						echo '<br><br>';
						
						echo '<table class="table table-bordered"> 
								<thead>
								<tr>
								</tr>
								</thead>';
								$tableHeader= '<TR><TD><h4>File Name</h4></TD><TD><h4>Citation Text</h4></TD><TD><h4>Select File</h4></TD><TD><h4>Enter New Citation</h4></TD>';
								if($_SESSION['usertype']==4){
									$tableHeader=$tableHeader.'<TD></TD>';
								}
								$tableHeader= $tableHeader.'</TR>';
								 
								 echo $tableHeader;
						
						$Path = "upload/".$ProjectID."_";
						$Files = glob($Path."*.*");
						$countuploaded = 0;
						foreach ($Files as $File)
							{
							$countuploaded++;			
							if($File!="upload/".$ProjectID."_description.pdf")
							{
								
								echo '<TR><TD>';
								echo'<a href="download?file='.$File.'">'.$File.'</a>';
								$Filename = substr($File,7);
								echo'<input type="hidden" name="Filename" value="'.$Filename.'" />';
								//echo $Filename;
								$res = $this->project_model->getCitationByFile($Filename, $ProjectID);
								foreach($res->result() as $row)
									{
									//$res = $result->row_array();
									 echo '</TD><TD>';
									echo $row->citation_text;
									echo '</TD><TD>';
									echo '<input type="file" name="file_replace_'.$countuploaded.'" id="file_replace_'.$countuploaded.'" />';
									echo '</TD><TD>';
									echo'<input type="hidden" name="citation_replace_id_'.$countuploaded.'" value="'.$row->citation_id.'" />';
									}
								echo'<input type="hidden" name="fileDescreplace_'.$countuploaded.'" value="file_desc_'.$countuploaded.'" />';
								echo '<input type="text" name="citationreplace'.$countuploaded.'" placeholder="Citation" >';
								echo '</TD></TR>';
								
								echo '<br>';
							}
							}
						echo '</tbody> </TABLE>';
						echo'<input type="hidden" name="countuploaded" value="'.$countuploaded.'" />';
						echo'<input type="hidden" name="countpromised" value="'.$countpromised.'" />';
						If ($countuploaded>0)
							$c = $countuploaded-1;
						else
							$c = $countuploaded;
						echo 'Number of Deliverables uploaded: '.$c;
						echo '<br><br>';
						$i = 0;
						//echo '<input type="hidden" name="i" value="'.$i.'" />';
						//echo '<br><input type="file" name="file_desc_'.$i.'" id="file_desc_'.$i.'" />';
						If ($countpromised > ($c))
							{
							echo '<br>Please Upload the remaining promised deliverables.<br>';
							for ($i=$countuploaded; $i <= ($countpromised); $i++)
								{
								echo '<br><input type="file" name="file_desc_'.$i.'" id="file_desc_'.$i.'" />';
								echo'<input type="hidden" name="fileDesc_'.$i.'" value="file_desc_'.$i.'" />';
								echo '<input type="text" name="citation'.$i.'" placeholder="Citation" >';
								}
							echo'<input type="hidden" name="i" value="'.$i.'" />';
							echo '<br><input type="SUBMIT" value="Apply" class="btn btn-large btn-primary "></input>';
							}
						/*If ($countpromised > 0)
							{
							for ($i=1; $i <= ($countpromised); $i++)
								{
								echo '<br><input type="file" name="file_desc_'.$i.'" id="file_desc_'.$i.'" />';
								}
							echo'<input type="hidden" name="i" value="'.$i.'" />
							<br><input type="SUBMIT" value="Apply" class="btn btn-large btn-primary "></input>';
							}*/
						else
							{
							echo'<input type="hidden" name="i" value="'.$i.'" />';
							echo '<input type="SUBMIT" value="Resend Completion Request" class="btn btn-large btn-primary "></input>';
							}
						}
					echo '<br>';
					echo "\n\n";
					 echo '</TABLE>
					</FORM>';
                
				
				}
	
			function insert()
			{
			session_start();
					$ProjectId = $_SESSION['ProjectID'];
					$data['projectID'] = $_SESSION['ProjectID'];
					$i = $_POST['i'];
					$k = $_POST['countuploaded'];
					$countpromised = $_POST['countpromised'];
					$Filename = $_POST['Filename'];
					echo $Filename;
					//move_uploaded_file($_FILES["element_5"]["tmp_name"],"upload/".$ProjectId.'.'.$ext);
					$count = 0;
					for ($j=$k; $j <= $countpromised  ; $j++)
						{
						//$fileTypes = array('doc','docx','ppt','pptx','pdf'); // file extensions allowed
						//$fileParts = pathinfo($_FILES['file_desc_'.$j]['name']);
						//if(in_array($fileParts['extension'],$fileTypes))
						//{
						$ext=end(explode('/', $_FILES['file_desc_'.$j]['name']));
						echo $ext;
						echo 'countuploaded='.$k;
						move_uploaded_file($_FILES['file_desc_'.$j]["tmp_name"],"upload/" . $ProjectId.'_'.$j.'.'.$ext);
						If ($_FILES['file_desc_'.$j]['error'] === UPLOAD_ERR_OK)
							{
							$data['filename'.$j] = ''.$ProjectId.'_'.$j.'.'.$ext;
							$data['citation'.$j] = $_POST['citation'.$j];
							$data['fileDesc_'.$j] = $_POST['fileDesc_'.$j];						
							$count++;
							}
						//}
						//$ext=end(explode('/', $_FILES['file_desc_'.$j]['type']));
						//move_uploaded_file($_FILES['file_desc_'.$j]["tmp_name"],"upload/" . $ProjectId.'_'.$j.'.'.$ext);		           
						}
					$countreplace = 0;	
					for ($l=1; $l <= ($k-1) ; $l++)
						{
						$Path = "upload/".$ProjectId."_";
						//$Files = glob($Path."*.*");
						$Files = glob($Path.$l."*.*");
						//echo'<a href="download?file='.$File.'">'.$File.'</a>';
						//echo '<input type="file" name="file_replace_'.$countuploaded.'" id="file_replace_'.$countuploaded.'" />';
						foreach ($Files as $File)
							{
							$ext=end(explode('/', $_FILES['file_replace_'.$l]['name']));
							//echo "Extension:".$ext;
							If ($ext <> "")
								{
								$data['replaceflag'.$l] = 1;
								//echo "Path".$File;	
								unlink ($File);
								move_uploaded_file($_FILES['file_replace_'.$l]["tmp_name"],"upload/" . $ProjectId.'_'.$l.'.'.$ext);
								If ($_FILES['file_replace_'.$l]['error'] === UPLOAD_ERR_OK)
									{
									$data['replaceflag'.$l] = 1;
									$data['filenamereplace'.$l] = ''.$ProjectId.'_'.$l.'.'.$ext;
									$data['citationreplace'.$l] = $_POST['citationreplace'.$l];
									$data['fileDescreplace_'.$l] = $_POST['fileDescreplace_'.$l];
									$data['citationreplaceid'.$l] = $_POST['citation_replace_id_'.$l];
									$countreplace++;
									}
								//else 
								//	$data['replaceflag'.$l] = 0;
								}
							else 
								$data['replaceflag'.$l] = 0;
								//echo $data['replaceflag'.$l];
							}
						}
			//echo 'Count:'.$count;
			//echo 'CountReplace'.$countreplace;
			$data['count'] = $count;
			$data['countreplace'] = $countreplace;
			$data['countuploaded'] = $k;
			
			$this->load->database();
			$this->load->model('project_model');
			
			$msg1 = $this->project_model->addCitation($data);
			
			$result= $this->project_model->projectCompletionFacultyResponse($ProjectId);
			
			header("Location: /rp/FacultyProjRevision");
			}
			
}
?>