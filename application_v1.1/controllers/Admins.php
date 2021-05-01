<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Admins extends CI_Controller
{
	
	public function __construct(){
		parent:: __construct();

		if($this->session->userdata('logged_in') !== TRUE){
			//$this->session->set_flashdata('warning','You dont have access please login first');
      		redirect(base_url('login'));
    	}

    	 // File upload path 
    	$path = base_url(); //http://localhost/TEST2/
        $this->uploadPath = 'assets/images/users/';
        $this->uploadPathimg = 'assets/images/upload/';

    	$this->load->model('datacontroller_model','data_model');
	}

/**
**
**/
//============================================ DASHBOARD ======================================================
	public function dashboard(){
      	if($this->session->userdata('actyID') ==='1'){

      		$page 					= 'dashboard';
	    	$data['all']			= $this->data_model->someTittlestaffs();
			$data['title_active'] 	= ucfirst($page);

			//fetch user profile data
			$this->setuserdatabyID($this->session->userdata('userID'));

			//total parts
			$data['countTotal']		= $this->data_model->countTotal();


			//fetc category	
			$data['pages_category'] = $this->data_model->pages_categoryall();


			$this->load->view('templates/header',$data);
			$this->load->view('admin/menubar_header');
			$this->load->view('admin/'.$page);
			$this->load->view('templates/footer');

		}else{

			//denies access
			redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
	      	
		}

	}
//============================================ DASHBOARD======================================================
/*
**
*/
//============================================ USER LIST======================================================

	//list user
	public function user_list(){
      	if($this->session->userdata('actyID') ==='1'){

      		$page 					= 'user_list';
	    	$data['all']			= $this->data_model->someTittlestaffs();
			$data['title_active'] 	= ucfirst($page);

			//fetch all user
			$data['userlist']		= $this->data_model->user_list($this->session->userdata('userID'));	

			//total parts
			$data['countTotal']		= $this->data_model->countTotal();


			//fetc category	
			$data['pages_category'] = $this->data_model->pages_categoryall();
			

			$this->load->view('templates/header',$data);
			$this->load->view('admin/menubar_header');
			$this->load->view('admin/'.$page);
			$this->load->view('templates/footer');

		}else{

			//denies access
			redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
		}
	}

	public function adduser(){

		if($this->session->userdata('actyID') ==='1'){
	
			$page 					= 'adduser';
			$data['all']			= $this->data_model->someTittlestaffs();
			$data['title_active'] 	= ucfirst($page);

			$data['accatype']		= $this->data_model->showaccetyall();

			//total parts
			$data['countTotal']		= $this->data_model->countTotal();

			//fetc category	
			$data['pages_category'] = $this->data_model->pages_categoryall();
			


			$this->form_validation->set_rules('firstname','Firstname','required');
			$this->form_validation->set_rules('lastname','Lastname','required');
			$this->form_validation->set_rules('firstname','Firstname','required');
			//$this->form_validation->set_rules('gender','Gender','required|callback_select_validate');

			$this->form_validation->set_rules('mobile','Mobile Number','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			//$this->form_validation->set_rules('region == S','Region','required');
			//$this->form_validation->set_rules('district == S','District','required');

			if ($this->form_validation->run() == false) {

				$this->load->view('templates/header',$data);
				$this->load->view('admin/menubar_header');
				$this->load->view('admin/'.$page,$data);
				$this->load->view('templates/footer');

			}else{

				if ($this->input->post('gender') == "M") {
					//assigne image for men
					$image = "male_default.png";

				}else{
					//assign image for women
					$image =  "female_default.jpg";
				}

				$userregdata = array('firstname' => $this->input->post('firstname'),'midlename' => $this->input->post('midlename'),'lastname'=> $this->input->post('lastname'),'gender'=> $this->input->post('gender'),'DOB' => $this->input->post('DOB'),'usermobile'=> $this->input->post('mobile'),
					'userEmail'=> $this->input->post('email'),'userAddress'=>$this->input->post('district').', '.$this->input->post('region'),'userPic'=> $image,'actyID'=> $this->input->post('actyID'),
					'usereg_at'=> $this->data_model->toDay()
				);

				$callback = $this->data_model->insertuser($userregdata);

				$authdata = array(
					'userID'   => $callback,'username' => $this->input->post('lastname').$callback,
					'password' => $this->data_model->returnDefaultpass($this->input->post('actyID')),
					'actyID'=> $this->input->post('actyID')
				);

				$this->data_model->insertAuthentication($authdata);
				$this->session->set_flashdata('success','insertion successfully');

				redirect(base_url('user_list'));
			}
		}else{

			//denies access
			redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
		}
		
	}

	public function reset_user(){
		$userID = $this->uri->segment(3);
		//find if data
		$feedback = $this->data_model->finduserbyID($userID);

		if ($feedback->num_rows()> 0) {
			$data = $feedback->row_array();

			/*
			| we must find a way tha admin can provide a default password from thw dashboard 
			| rather than providing direct from the source code below
			*/

			$resetData = array('username' => $data['lastname'].$data['userID'],
				'password'=> $this->data_model->returnDefaultpass($data['actyID']),'pammision' => 0);

		}

		//now reset data;
		$reset = $this->data_model->reset_user($userID,$resetData);
		$this->session->set_flashdata('success','Username and Password Back to default successfully');
		redirect(base_url('user_list'));


	}

	public function delete_user(){
		$userID = $this->uri->segment(3);
		$callback = $this->data_model->delete_user($userID);
		$this->session->set_flashdata('success','Record removed successfully');
		redirect(base_url('user_list'));
	}


	public function block_user(){
		$userID = $this->uri->segment(3);
		$pamissdata = array('pammision' => 0);
		$callback = $this->data_model->permit_user($userID,$pamissdata);
		redirect(base_url('user_list'));

	}

	public function allow_user(){
		$userID = $this->uri->segment(3);
		$pamissdata = array('pammision' => 1);
		$callback = $this->data_model->permit_user($userID,$pamissdata);
		redirect(base_url('user_list'));
	}


//============================================== USER LIST ==============================================
/*
**
*/
//============================================= CONTENTS ================================================
	//view content
	public function content(){
      	if($this->session->userdata('actyID') ==='1'){

      		if ($this->uri->segment(3) == 'delete_content') {
      			//delete content
				$callback = $this->data_model->delete_content($this->uri->segment(4));
				//set message
				$this->session->set_flashdata('success','Content Removed to the database');
				//redirect page
				redirect(base_url('content'));

      		}else if ($this->uri->segment(3) == 'block_content') {
      			//brock content
				$pamissdata = array('papamission' => 0);
				$callback = $this->data_model->permit_content($this->uri->segment(4),$pamissdata);
				//set message
				$this->session->set_flashdata('warning','Content Blocked in Home page');
				//redirect page
				redirect(base_url('content'));
      		}else if ($this->uri->segment(3) == 'allow_content') {
      			//allow content
				$pamissdata = array('papamission' => 1);
				$callback = $this->data_model->permit_content($this->uri->segment(4),$pamissdata);
				//set message
				$this->session->set_flashdata('success','Content Activared in Home page');
				//redirect page
				redirect(base_url('content'));

			}else if($this->uri->segment(3) == 'delete_cat'){
				//remove category
				$callback = $this->data_model->deletecategory($this->uri->segment(4));
				//set message
				$this->session->set_flashdata('success','category Removed');
				//redirect page
				redirect(base_url('content'));
			}else if($this->uri->segment(3) == 'add_category'){
				//add category
				$category = array('pacatName' => $this->uri->segment(4));
				$callback = $this->data_model->addcategory($category);
				//set message
				$this->session->set_flashdata('success','category Added successfully');
				//redirect page
				redirect(base_url('content'));
      		}else {
      			$page					= 'content';
		    	$data['all']			= $this->data_model->someTittlestaffs();
				$data['title_active'] 	= ucfirst($page);

				//fetch page_content data
				$data['pages_content']	= $this->data_model->pages_contentall();

				//total parts
				$data['countTotal']		= $this->data_model->countTotal();
					


				//fetc category	
				$data['pages_category'] = $this->data_model->pages_categoryall();
				
				$this->load->view('templates/header',$data);
				$this->load->view('admin/menubar_header');
				$this->load->view('admin/'.$page);
				$this->load->view('templates/footer');
      		}
		}else{

			//denies access
			redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
		}
	}

	//add content
	public function addContent(){
		if($this->session->userdata('actyID') ==='1'){
			
			$page					= 'addcontent';
	    	$data['all']			= $this->data_model->someTittlestaffs();
			$data['title_active'] 	= ucfirst($page);

			//total parts
			$data['countTotal']		= $this->data_model->countTotal();

			// //fetc category	
			$data['pages_category'] = $this->data_model->pages_categoryall();

			$this->form_validation->set_rules('pacontTitle', 'Tittle','required');
			$this->form_validation->set_rules('pacontDetails', 'Content','required');

			if ($this->form_validation->run() == false) {

				//$this->session->set_flashdata('error','Both field must be field');
				$this->load->view('templates/header',$data);
				$this->load->view('admin/menubar_header');
				$this->load->view('admin/'.$page);
				$this->load->view('templates/footer');
	    	}else{

	    		$contentData = array(
		    		'pacatID' => $this->input->post('pacatID'),
		    		'pacontTitle' => $this->input->post('pacontTitle'),
		    		'pacontDetails' => $this->input->post('pacontDetails'),
		    		'papamission' => 0,
		    		'posted_date' => $this->data_model->toDay()
		    	);

		    	//send data
		    	$this->data_model->addcontent($contentData);
		    	//set message
				$this->session->set_flashdata('success','Content added to the database');
				//redirect page
		    	redirect(base_url('content'));
	    	}

		}else{
			//denies access
			redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
		}
	}

	// Edit/Update content
	public function editcontent($pacontID){

		if($this->session->userdata('actyID') ==='1'){
			
			$page					= 'edit_Content';
	    	$data['all']			= $this->data_model->someTittlestaffs();
			$data['title_active'] 	= ucfirst($page);

			//total parts
			$data['countTotal']		= $this->data_model->countTotal();	

			// //fetc category	
			$data['pages_category'] = $this->data_model->pages_categoryall();

			$data['pagecontbyID'] = $this->data_model->findpageContentbyID($pacontID);

			$this->form_validation->set_rules('pacontTitle', 'Tittle','required');
			$this->form_validation->set_rules('pacontDetails', 'Content','required');
			
			if ($this->form_validation->run() == false) {

				//$this->session->set_flashdata('error','Both field must be field');
				$this->load->view('templates/header',$data);
				$this->load->view('admin/menubar_header');
				$this->load->view('admin/'.$page);
				$this->load->view('templates/footer');
	    	}else{

	    		$contentUpdate = array(
		    		'pacatID' => $this->input->post('pacatID'),
		    		'pacontTitle' => $this->input->post('pacontTitle'),
		    		'pacontDetails' => $this->input->post('pacontDetails'),
		    		'posted_date' => $this->data_model->toDay()
		    	);

		    	//send data
		    	$this->data_model->editcontent($pacontID,$contentUpdate);
		    	//set message
				$this->session->set_flashdata('success','Content Updated to the database');
				//redirect page
		    	redirect(base_url('content'));
	    	}
	    }else{

			//denies access
			redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
		}
	}

	//Galley
	public function gallery($parameter = ''){

		if($this->session->userdata('actyID') ==='1'){

			$page					= 'gallery';
	    	$data['all']			= $this->data_model->someTittlestaffs();
			$data['title_active'] 	= ucfirst($page);
			//fetch page_content data
			$data['pages_content']	= $this->data_model->pages_contentall();
			//total parts
		    $data['countTotal']		= $this->data_model->countTotal();
			//fetc category	
			$data['pages_category'] = $this->data_model->pages_categoryall();
			//fetch Galley
			$data['gallery'] 		= $this->data_model->galleryall();

			// Get image data
			$imgData = $this->data_model->imgbygalleryID($this->uri->segment(4)); 
			$deletedImage = $imgData['pic'];

			// File upload configuration 
            $config['allowed_types'] = 'jpg|jpeg|png'; 
            $config['upload_path'] = $this->uploadPathimg; 
            $config['allowed_types'] = 'jpg|jpeg|png'; 
            $config['max_size'] = 1024;
            $config['encrypt_name'] = TRUE;

            // Load and initialize upload library 
	        $this->load->library('upload', $config);

			//add image
			if ($parameter  == 'add_gallery') {
	            // Upload file to server 
	            if($this->upload->do_upload('file_name')){ 
	                // Uploaded file data 
	                $fileData = $this->upload->data(); 

	                $newimgGallery = array(
						'pacatID' => 4,
						'pic' => $fileData['file_name'],
						'pammision' => 0, 
						'posted_at' => $this->data_model->toDay()
					);

					// Update data_model data 
			        $updateimage = $this->data_model->addpicgallery($newimgGallery);

			        $this->session->set_flashdata('success', 'Picture added in Gallery successfully'); 
	            	redirect(base_url('gallery'));
		                
        	}else{ 
		        $this->session->set_flashdata('error', $this->upload->display_errors()); 
				redirect(base_url('gallery'));
		    }
			}elseif ($parameter == 'edit_gallery') { 
				//find image by id
				$data['gallerybyID'] = $deletedImage;

				if($this->uri->segment(5) == 'upload'){
					if($this->upload->do_upload('file_name')){ 
					// Uploaded file data 
					$fileData = $this->upload->data();

						$newimgGallery = array(
							'pic' => $fileData['file_name'],
							'pammision' => 0, 
							'posted_at' => $this->data_model->toDay()
						);

						// Update data_model data 
				        $this->data_model->updateGalley($this->uri->segment(4),$newimgGallery);
				        //remove image from the folder
			        	@unlink($this->uploadPathimg.$deletedImage);
			        	//set message
			        	$this->session->set_flashdata('success', 'Image updated in Gallery successfully'); 
			  			redirect(base_url('gallery'));

					}else{
						$this->session->set_flashdata('error', $this->upload->display_errors()); 
						redirect(base_url('admins/gallery/edit_gallery/'.$this->uri->segment(4)));
					}

				}else{
					$this->load->view('templates/header',$data);
					$this->load->view('admin/menubar_header');
					$this->load->view('admin/'.$page);
					$this->load->view('templates/footer');
				}

			}elseif ($parameter == 'delete_gallery') {
				//delete image in Server
				$this->data_model->delete_galley($this->uri->segment(4));
				//delete image in Folder
				@unlink($this->uploadPathimg.$deletedImage);
				//set message
				$this->session->set_flashdata('success','picture deleted from the database');
				//redirect page
				redirect(base_url('gallery'));

			}elseif ($parameter == 'allow_gallery') {
				//procee deletion
				$parmitArray = array('pammision' => 1);
				$this->data_model->allow_galley($this->uri->segment(4),$parmitArray);
				//set message
				//$this->session->set_flashdata('success','Picture Enabled to the Gallery');
				//redirect page
				redirect(base_url('gallery'));

			}elseif ($parameter == 'block_gallery') {
				//procee deletion
				$parmitArray = array('pammision' => 0);
				$this->data_model->block_galley($this->uri->segment(4),$parmitArray);
				//set message
				//$this->session->set_flashdata('warning','Picture Disabled from the Gallery');
				//redirect page
				redirect(base_url('gallery'));

			}else {
				$data['gallerybyID'] = '';
				$this->load->view('templates/header',$data);
				$this->load->view('admin/menubar_header');
				$this->load->view('admin/'.$page);
				$this->load->view('templates/footer');
			}

		}else{
			//denies access
			redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
		}
	}


	public function upload_CKeditor(){
		// File upload configuration 


					// 		if ($this->uri->segment(4) == NULL) {
						
					// 	$this->load->view('templates/header',$data);
					// 	$this->load->view('admin/menubar_header');
					// 	$this->load->view('admin/'.$page);
					// 	$this->load->view('templates/footer');

					// }else{
					// 	//fetch specific image in Galley
					// 	$data['imgbygalID'] = $this->data_model->imgbygalleryID($this->uri->segment(3));
					// 	$this->load->view('templates/header',$data);
					// 	$this->load->view('admin/menubar_header');
					// 	$this->load->view('admin/'.$page);
					// 	$this->load->view('templates/footer');
					// }







            $config['upload_path'] = $this->uploadPath; 
            $config['allowed_types'] = 'jpg|jpeg|png'; 
            $config['max_size'] = 1024;
            $config['encrypt_name'] = TRUE;
             
            // Load and initialize upload library 
            $this->load->library('upload', $config); 
            //$this->upload->initialize($config); 

            // Upload file to server 
            if(!$this->upload->do_upload('file_name')){ 
                

            	echo json_encode(array('error' => $this->upload->display_errors()));
                
        	}else{
        		// Uploaded file data 
                $fileData = $this->upload->data();
                //$newimgData = array('userPic' => $fileData['file_name']);
        		 
		       echo json_encode(array('file_name' => $fileData['file_name']));
		    }
	}


//============================================= CONTENTS ============================================
/*
**
*/
//============================================= PROFILE =============================================

	//profile data
    public function profile(){
    	$page 					= 'profile';
    	$data['all']	        = $this->data_model->someTittlestaffs(); //public to all page in donor folder
		$data['title_active'] 	= ucfirst($page);

		$this->setuserdatabyID($this->session->userdata('userID'));

		//total parts
		$data['countTotal']		= $this->data_model->countTotal();

		//fetc category	
		$data['pages_category'] = $this->data_model->pages_categoryall();


    	$this->load->view('templates/header',$data);
		$this->load->view('admin/menubar_header');
		$this->load->view('admin/'.$page);
		$this->load->view('templates/footer');
    }


    public function editimage($userID){
		// Upload image file to the server
		if(!empty($_FILES['userimage']['name'])){ 

			// Get image data
	     	$imgData = $this->data_model->getRows($userID); 
	     	$prevImage = $imgData['userPic'];


     	    // File upload configuration 
	     	$imageName = $_FILES['userimage']['name'];
            $config['upload_path'] = $this->uploadPath; 
            $config['allowed_types'] = 'jpg|jpeg|png'; 
            $config['max_size'] = 1024;
            $config['encrypt_name'] = TRUE;
             
            // Load and initialize upload library 
            $this->load->library('upload', $config); 
            //$this->upload->initialize($config); 

            // Upload file to server 
            if($this->upload->do_upload('userimage')){ 
                // Uploaded file data 
                $fileData = $this->upload->data(); 
                $newimgData = array('userPic' => $fileData['file_name']);
                
        	}else{ 
		        $errorimg = $this->upload->display_errors();  
		    }


	     	if(empty($errorimg)){
				// Update data_model data 
		        $updateimage = $this->data_model->updateimage($newimgData, $userID); 

	            if($updateimage){

	            	//Image has been updated successfully.
	            	if ($prevImage == "female_default.jpg") {
		                
		                $this->session->set_flashdata('success', 'Image has been updated successfully'); 
	                	redirect(base_url('admin_prof'));

	                }else if($prevImage == "male_default.png"){
	                	$this->session->set_flashdata('success', 'Image has been updated successfully'); 
	                	redirect(base_url('admin_prof'));

		            }else{
		            	@unlink($this->uploadPath.$prevImage);
		            	$this->session->set_flashdata('success', 'Image has been updated successfully'); 
	                	redirect(base_url('admin_prof'));

		            } 
                }else{ 

                	$this->session->set_flashdata('error', 'Some problems occurred, please try again.'); 
                    redirect(base_url('admin_prof')); 
                } 
            }else{
            	$this->session->set_flashdata('error', $errorimg); 
				redirect(base_url('admin_prof'));
            }	
		}else{

     		$this->session->set_flashdata('error', 'Please select image file'); 
		    redirect(base_url('admin_prof'));
		}
    }


    //edit user data except image
	public function editUsewImg(){

		if (!empty($this->input->post('email'))) 
		{

			//email fiels is field
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			if ($this->form_validation->run() == false) 
			{
				//if email is ivalid
				$this->session->set_flashdata('error','Enter valid Email');
				redirect(base_url('admin_prof'));

			}else{

				//valid email
				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('currpassword', 'Current password', 'required');

				if ($this->form_validation->run() == false) 
				{
					$this->session->set_flashdata('error','Username and Current password field must Required');
					redirect(base_url('admin_prof'));

				}else{

					//$this->session->set_flashdata('success','Email is valid,username and password present');
					//find if user provide correct password
					$user_id		= $this->session->userdata('userID');
					$currpassword 	= $this->input->post('currpassword');
					$username 		= $this->session->userdata('username');
					$feedback = $this->data_model->finduserby3arg($user_id,$username,$currpassword);
					if ($feedback->num_rows()>0) 
					{
						$userAddress  = $this->input->post('district').', '.$this->input->post('region');
						$eduserData = array(
							'firstname' => $this->input->post('firstname'),
							'midlename' => $this->input->post('midlename'),
							'lastname' 	=> $this->input->post('lastname'),
							'usermobile'=> $this->input->post('phone'),
							'userEmail' => $this->input->post('email'),
							'userAddress' => $userAddress
						);

						//send the data to database
						$this->data_model->sendEditarry($user_id,$eduserData);
						//set flash message
						$this->session->set_flashdata('success','Your data updated successfully');
						//call function to update session infomation
						$this->setuserdatabyID($this->session->userdata('userID'));
						//redirect page
						redirect(base_url('admin_prof'));
					}else{

						//password do not match
						$this->session->set_flashdata('error','password not match');
				
						redirect(base_url('admin_prof'));
					}
				}
			}
		}else{
			//email fiels is not present

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('currpassword', 'Current password', 'required');

			if ($this->form_validation->run() == false) 
			{
				$this->session->set_flashdata('error','Username and Current password field must Required');
				redirect(base_url('admin_prof'));

			}else{

				//$this->session->set_flashdata('success','username and password present no prosed');
				//find if user provide correct password
				$user_id		= $this->session->userdata('userID');
				$currpassword 	= $this->input->post('currpassword');
				$username 		= $this->session->userdata('username');
				$feedback = $this->data_model->finduserby3arg($user_id,$username,$currpassword);
				if ($feedback->num_rows()>0) 
				{
					$userAddress  = $this->input->post('region').','.$this->input->post('district');
					$eduserData = array(
						'firstname' => $this->input->post('firstname'),
						'midlename' => $this->input->post('midlename'),
						'lastname' 	=> $this->input->post('lastname'),
						'usermobile'=> $this->input->post('phone'),
						'userEmail' => $this->input->post('email'),
						'userAddress' => $userAddress
					);

					//send data to databse
					$this->data_model->sendEditarry($user_id,$eduserData);
					//flash data message
					$this->session->set_flashdata('success','Your data updated successfully');
					//call function to update session infomation
					$this->setuserdatabyID($this->session->userdata('userID'));
					//rediraect page
					redirect(base_url('admin_prof'));

				}else{

					//password do not match
					$this->session->set_flashdata('error','password not match');
					//return to profile page without nothing change
					redirect('admin_prof');
				}
			}
		}
	}


		//edit username
	public function editusername($userID){
		
		$this->form_validation->set_rules('curr_username', 'current Username', 'required');
		$this->form_validation->set_rules('new_username', 'Username', 'required');
		$this->form_validation->set_rules('currpassword', 'Your password', 'required');

		if ($this->form_validation->run() == false) {

			//Some filed is empty
			$this->session->set_flashdata('error','All field required');
			redirect(base_url('admin_prof'));
		}else{

			//find is curr_username is present
			$ispresent = $this->data_model->isusernamefound($this->input->post('curr_username'),$this->input->post('currpassword'));

			if($ispresent->num_rows() > 0){
				//found
				$arryData = array('username' => $this->input->post('new_username'));
				//send data
				$quertupdate = $this->data_model->updateusername($userID,$arryData);
			    //set flash message
				$this->session->set_flashdata('success','Your Username changed');
				//call function to update session infomation
				$this->setuserdatabyID($this->session->userdata('userID'));
				//redirect page
				redirect(base_url('admin_prof'));

			}else{
				//not present
				$this->session->set_flashdata('error','Current username or Password is wrong!!');
			    redirect(base_url('admin_prof'));
			}

		}
	}

//========================================= PROFILE ======================================================
/*
**
*/
//========================================= SESSIONS =====================================================
	//Set userdatasession
	public function setuserdatabyID($userID){
    	$getprofile = $this->data_model->fetch_adminprof($userID);

		if ($getprofile->num_rows() > 0) {
			$getBYID = $getprofile->row_array();

			$userProfar = array(
				'username' => $getBYID['username'],
				'firstname'=> $getBYID['firstname'],'midlename'=> $getBYID['midlename'],	
				'lastname'=> $getBYID['lastname'],'gender'=> $getBYID['gender'],
				'DOB'=> $this->data_model->date_break($getBYID['DOB']),'bgroupID'=> $getBYID['bgroupID'],
				'usermobile'=> $getBYID['usermobile'],'userEmail'=> $getBYID['userEmail'],
				'userregion'=>$this->data_model->returnRegion($getBYID['userAddress']),
				'userdistrict'=>$this->data_model->returnDistrict($getBYID['userAddress']),
				'userPic'=> $getBYID['userPic'],'actyName'=> $getBYID['actyName'],
				'usereg_at' => $this->data_model->date_break($getBYID['usereg_at'])
			);

			return $this->session->set_userdata($userProfar);
		}
    }


    public function findcontentSatus(){


    	$totalblocked	= $this->data_model->countTotalBlockedContent();
		$totalpacateg   = $this->data_model->countTotalpagecategory();

		$output = '';
		
		if($totalactive != 0){
            $output .= '<small class="label pull-right bg-green" data-toggle="tooltip" title="active">'.$totalactive.'</small>';
        }else{
            $output .= '<small class="label pull-right bg-green" data-toggle="tooltip" title="active">0</small>';
        }
        
        if($totalblocked != 0){
            $output .= '<small class="label pull-right bg-red" data-toggle="tooltip" title="blocked">'.$totalblocked.'</small>';
        }else{
            $output .= '<small class="label pull-right bg-red" data-toggle="tooltip" title="blocked">0</small>';
        }



        //echo $output;
    }


//============================================= SESSIONS =====================================================
	
}


