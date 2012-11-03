<?PHP

class FacultyProjCompleted extends CI_Controller {
	
	function index()
		{
			
		$data['myClass']=$this;
		$data['action']=0;
		$this->load->view('layoutFaculty',$data);
		}
	function load_php()
				{
				$this->load->model('project_model');
				$result= $this->project_model-> projectCompleteFaculty('anurag');
				// Display the results
				echo'
					<FORM METHOD=POST ACTION="http://localhost/ci/index.php/FacultyProjRequest">
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							<h1>Completed Projects</h1>
						<table class="table table-bordered">
					<TD><h4>ProjectTitle</h4></TD><TD><h4>ProjectId</h4></TD><TD><h4>Application Date</h4></TD><TD><h4>Researcher1</h4></TD><TD><h4>Researcher2</TD><TD><h4>Researcher3</h1></TD>
					
					<tbody>';
					foreach($result->result() as $row)
						{
						echo '<tr>
						<td>';
						 print $row->ProjectTitle;
						 echo '</td><TD>';
						 print $row->ProjectId;
						 echo '</TD><TD>';
						 print $row->App_Date;
						 echo '</TD><TD>';
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Researcher3;
						echo '</tr>';
						}			 
					 echo '</tbody>
					</table>
					</FORM>';
                
				
				}
	
	}


?>