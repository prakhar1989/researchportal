<?php
// block any attempt to the filesystem
/*if (isset($_GET['file']) && basename($_GET['file']) == $_GET['file']) {
    
} else {
    $filename = NULL;
}
*/
class Downloadfile extends CI_Controller {
function index ()
{
	$filename = $_GET['file'];

	$err = '<p style="color:#990000">Sorry, the file you are requesting is unavailable.</p>';
	//echo 'File is '.$filename;

	if (!$filename) {
	// if variable $filename is NULL or false display the message
	//echo $err;
		} else {
			// define the path to your download folder plus assign the file name
			$filenames= glob($filename.'*');
			//$filename1=glob($filename.'*');
			
			//var_dump($filenames);
			/*
			foreach ( $filename1 as $path )
			{*/
			//echo ' '.$filenames[0].'<br>';
			//$ext=explode('.', $filenames[0]);
			//var_dump($ext);
			//echo ' The extension is '.$ext[1];
			
			
			//echo $filename1;
			$path = $filenames[0];
			echo '</p>'.$path;
			// check that file exists and is readable
			if (file_exists($path) && is_readable($path)) {
				// get the file size and send the http headers
				$size = filesize($path);
				$size = $size + 3000;     // Extra 3 kb to ensure that the full file is transferred bcz there is a diff bw size on disk and actual size 
				header('Content-Type: application/octet-stream');
				header('Content-Length: '.$size);
				header('Content-Disposition: attachment; filename='.$path);
				header('Content-Transfer-Encoding: binary');
				// open the file in binary read-only mode
				// display the error messages if the file can�t be opened
				$file = @ fopen($path, 'rb');
				if ($file) {
					// stream the file and exit the script when complete
					fpassthru($file);
					exit;
				} else {
					echo $err;
				}
			} else {
					echo $err;
					} 
			
		}
	} 	
	}	
	
	?>
	