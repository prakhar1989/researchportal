<?PHP

class ProjectDetails extends CI_Controller {

	
    
	//calls the view to create the background etc.
	function index()
			{

				//echo '<p>Value received is '. $this->input->post('Choice1'). '</p>';
				$data['myClass']=$this;
				$data['action']=0;
				$this->load->view('layout',$data);
			}
    // Displays the details of the project
	function load_php()
			{
					 //echo 'show project details called    ';
					 $Project = $this->input->post('Choice1');
					 //echo $Project;
					 $this->load->model('project_model');
					  //pass the projectId of the selected project
					 
					 //echo '<FORM name="approveProject" method= POST action="ShowProject/approveProject">';
					 $Query= $this->project_model->projectInfo($Project);
					 echo '<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
					 ';
					 foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->ProjectId;
						 echo '</TD><TD>';
						 print $row->Description;
						 echo '</TD><TD>';
						 print $row->ProjectCategory;
						 echo '</TD><TD>';
						 print $row->ProjectGrant;
						 echo '</TD><TD>';
						 print $row->App_Date;
						 echo '</TD><TD>';
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Researcher3;
					 }
					 echo '</TABLE>';
				}
}	
?>