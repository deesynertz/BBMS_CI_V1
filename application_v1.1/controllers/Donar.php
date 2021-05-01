<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Donar extends CI_Controller
{
	
	public function __construct(){
		parent:: __construct(); 


		if($this->session->userdata('logged_in') !== TRUE){
			//$this->session->set_flashdata('warning','Please login fist to get access');
      		redirect(base_url('login'));
    	}
    	// File upload path 
    	//$path = base_url(); //http://localhost/TEST2/
        $this->uploadPath = 'assets/images/users/';

		$this->load->model('datacontroller_model','data_model');
		
	}


/*
**
*/
//========================================= DASHBOARD ================================================

	public function dashboard(){

		//Allowing akses 
      	if($this->session->userdata('actyID') ==='5')
      	{
      		$page 					= 'dashboard';
      		$data['all']	        = $this->data_model->someTittlestaffs(); //public to all page in donor folder
			$data['title_active'] 	= ucfirst($page);
			
			//userID will taken from the session
			//fetch user profile data
			$this->setuserdatabyID($this->session->userdata('userID'));

			//fetch donation records
			$data['fetch_donation'] = 	$this->data_model->fetch_donation($this->session->userdata('userID'));

			//fetch request records
			$data['fetch_request']	=	$this->data_model->fetch_request();

			//print_r($data['fetch_donation']);

			$this->load->view('templates/header',$data);
			$this->load->view('donar/menubar_header');
			$this->load->view('donar/'.$page);
			$this->load->view('templates/footer');

      	}else{
      		//denies access
      		redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
			//$this->acessdenie($this->session->userdata('actyID'));
      	}

    }
//========================================= DASHBOARD ===========================================
/*
**
*/
//========================================= DONATION ============================================
    public function donation(){
    	if($this->session->userdata('actyID') ==='5')
      	{
	    	$page 					= 'donation';
			$data['all']	        = $this->data_model->someTittlestaffs(); //public to all page in donor folder
			$data['title_active'] 	= ucfirst($page);
			
			//fetch donation records
			$data['fetch_donation'] = 	$this->data_model->fetch_donation($this->session->userdata('userID'));


			$this->load->view('templates/header',$data);
			$this->load->view('donar/menubar_header');
			$this->load->view('donar/'.$page);
			$this->load->view('templates/footer');
		}else{
      		//denies access
      		redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
			//$this->acessdenie($this->session->userdata('actyID'));
      	}
	}

//========================================= DONATION ============================================
/*
**
*/
//========================================= REQUEST =============================================

    public function request(){
    	if($this->session->userdata('actyID') ==='5')
      	{
	    	$page 					= 'request';
			$data['all']	        = $this->data_model->someTittlestaffs();//public to all page in donor folder
			$data['title_active'] 	= ucfirst($page);
			
			//fetch request records
			$data['fetch_request']	=	$this->data_model->fetch_request();

			$this->load->view('templates/header',$data);
			$this->load->view('donar/menubar_header');
			$this->load->view('donar/'.$page);
			$this->load->view('templates/footer');

		}else{
      		//denies access
      		redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
			//$this->acessdenie($this->session->userdata('actyID'));
      	}
	}




//========================================= REQUEST ============================================
/*
**
*/
//========================================= PROFILE ============================================

	//profile data
    public function profile(){
    	if($this->session->userdata('actyID') ==='5')
      	{
	    	$page 					= 'profile';
	    	$data['all']	        = $this->data_model->someTittlestaffs(); //public to all page in donor folder
			$data['title_active'] 	= ucfirst($page);

			$this->setuserdatabyID($this->session->userdata('userID'));

			//$data['units'] 			= $this->data_model->countTotalbloodunit($data['fetch_donation']['units']);


	    	$this->load->view('templates/header',$data);
			$this->load->view('donar/menubar_header');
			$this->load->view('donar/'.$page);
			$this->load->view('templates/footer');

		}else{
      		//denies access
      		redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
			//$this->acessdenie($this->session->userdata('actyID'));
      	}
    }


    //edit user data except image
	public function editUsewImg(){

		if($this->session->userdata('actyID') ==='5')
      	{

			if (!empty($this->input->post('email'))) 
			{

				//email fiels is field
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				if ($this->form_validation->run() == false) 
				{
					//if email is ivalid
					$this->session->set_flashdata('error','Enter valid Email');
					redirect(base_url('donar_prof'));

				}else{

					//valid email
					$this->form_validation->set_rules('username', 'Username', 'required');
					$this->form_validation->set_rules('currpassword', 'Current password', 'required');

					if ($this->form_validation->run() == false) 
					{
						$this->session->set_flashdata('error','Username and Current password field must Required');
						redirect(base_url('donar_prof'));

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
							redirect(base_url('donar_prof'));
						}else{

							//password do not match
							$this->session->set_flashdata('error','password not match');
					
							redirect(base_url('donar_prof'));
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
					redirect(base_url('donar_prof'));

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
						redirect(base_url('donar_prof'));

					}else{

						//password do not match
						$this->session->set_flashdata('error','password not match');
						//return to profile page without nothing change
						redirect('donar_prof');
					}
				}
			}

		}else{
      		//denies access
      		redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
			//$this->acessdenie($this->session->userdata('actyID'));
      	}
	}

		//edit username
	public function editusername($userID){
		if($this->session->userdata('actyID') ==='5')
      	{
			$this->form_validation->set_rules('curr_username', 'current Username', 'required');
			$this->form_validation->set_rules('new_username', 'Username', 'required');
			$this->form_validation->set_rules('currpassword', 'Your password', 'required');

			if ($this->form_validation->run() == false) {

				//Some filed is empty
				$this->session->set_flashdata('error','All field required');
				redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
				redirect(base_url('donar_prof'));
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
					redirect(base_url('donar_prof'));
					

				}else{
					//not present
					$this->session->set_flashdata('error','Current username or Password is wrong!!');
				    redirect(base_url('donar_prof'));
				}

			}

		}else{
      		//denies access
      		redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
			//$this->acessdenie($this->session->userdata('actyID'));
      	}
	}

	//edit image
	public function editimage($userID){

		// Upload image file to the server
		if(!empty($_FILES['userimage']['name'])){ 

			// Get image data
	     	$imgData = $this->data_model->getRows($userID); 
	     	$prevImage = $imgData['userPic'];


     	    // File upload configuration 
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

                $imgData = array('userPic' => $fileData['file_name']);

        	}else{ 
		        $errorimg = $this->upload->display_errors();  
		    }


	     	if(empty($errorimg)){
				// Update data_model data 
		        $updateimage = $this->data_model->updateimage($imgData, $userID); 

	            if($updateimage){

	            	//Image has been updated successfully.

	            	if ($prevImage == "female_default.jpg") {
		                
		                $this->session->set_flashdata('success', 'Image has been updated successfully'); 
	                	redirect(base_url('donar_prof'));

	                }else if($prevImage == "male_default.png"){
	                	$this->session->set_flashdata('success', 'Image has been updated successfully'); 
	                	redirect(base_url('donar_prof'));

		            }else{
		            	@unlink($this->uploadPath.$prevImage);
		            	$this->session->set_flashdata('success', 'Image has been updated successfully'); 
	                	redirect(base_url('donar_prof'));

		            } 
                }else{ 

                	$this->session->set_flashdata('error', 'Some problems occurred, please try again.'); 
                    redirect(base_url('donar_prof')); 
                } 
            }else{
            	$this->session->set_flashdata('error', $errorimg); 
				redirect(base_url('donar_prof'));
            }	
		}else{

     		$this->session->set_flashdata('error', 'Please select image file'); 
		    redirect(base_url('donar_prof'));
		}
    }


//========================================= PROFILE ==============================================

	//Set userdatasession
	public function setuserdatabyID($userID){
		if($this->session->userdata('actyID') ==='5')
      	{
			$getprofile = $this->data_model->fetch_donarprof($userID);

			if ($getprofile->num_rows() > 0) {
				$getBYID = $getprofile->row_array();
			
				$userProfar = array(
					'username' => $getBYID['username'],
					'firstname'=> $getBYID['firstname'],'midlename'=> $getBYID['midlename'],	
					'lastname'=> $getBYID['lastname'],'gender'=> $getBYID['gender'],
					'DOB'=> $this->data_model->date_break($getBYID['DOB']),'bgroupName'=> $getBYID['bgroupName'],
					'usermobile'=> $getBYID['usermobile'],'userEmail'=> $getBYID['userEmail'],
					'userregion'=>$this->data_model->returnRegion($getBYID['userAddress']),
					'userdistrict'=>$this->data_model->returnDistrict($getBYID['userAddress']),
					'userPic'=> $getBYID['userPic'],'actyName'=> $getBYID['actyName'],
					'usereg_at' => $this->data_model->date_break($getBYID['usereg_at'])
				);

				return $this->session->set_userdata($userProfar);
			}

		}else{
      		//denies access
      		redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
			//$this->acessdenie($this->session->userdata('actyID'));
      	}

		
    }




}

?>
