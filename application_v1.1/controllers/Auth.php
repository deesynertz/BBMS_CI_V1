<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Auth extends CI_Controller
{
	
	public function __construct()
	{
		parent:: __construct();
		//$this->logout();
		$this->load->model('datacontroller_model','data_model');

	}


	public function loginfunction(){
		if($this->session->userdata('logged_in') !== TRUE){
			//Deal with login page
			$data['all']	        = $this->data_model->someTittlestaffs(); //public to all page in donor folder
			$data['title_active'] 	= ucfirst('dashboard');
			$data['title_active'] 	= ucfirst('login');

			$this->form_validation->set_rules('user_name', 'Usermane', 'required');
			$this->form_validation->set_rules('user_password', 'Password', 'required');

			if ($this->form_validation->run() == false) {

				$this->load->view('login',$data);

			}else{

				$username 		= 	$this->input->post('user_name');
				$user_password 	= 	$this->input->post('user_password');

				//model class using login_user function($$);
				$validate		=	$this->data_model->isusernamefound($username,$user_password);

				if($validate->num_rows() > 0){
			        $data  = $validate->row_array();

			        if ($data['actyID'] === '1') {
			        	// access login for Admin
			        	$this->createsession($data);
			        	if ($this->session->userdata('logged_in') == TRUE) {
			        		//$this->session->set_flashdata('success','Access Granted');
					        redirect(base_url('admin')); 

			        	}

		        		$this->session->set_flashdata('error','Access Denied Contact to admin');
	    				redirect(base_url('login'));
			        
			        }
			        else if($data['actyID'] === '5'){
			        	// access login for donor
			        	$this->createsession($data);
				        if ($this->session->userdata('logged_in') == TRUE) {
			        		$this->session->set_flashdata('success','Access Granted');
					        redirect(base_url('donar')); 

			        	}

		        		$this->session->set_flashdata('error','Access Denied Contact to admin');
	    				redirect(base_url('login'));
			        }else{
			        	 $this->session->set_flashdata('error','Access Denied');
	        			 redirect(base_url('login'));

			        }
			    }else{
			        $this->session->set_flashdata('warning','Username or Password is Wrong');
	        		redirect(base_url('login'));
				}
			}
		}else{
			$this->acessdenie($this->session->userdata('actyID'));
		}
	}


	public function lockscreen(){

		if($this->session->userdata('logged_in') == TRUE){

			$page 					= 'lockscreen';
			$data['all']	        = $this->data_model->someTittlestaffs(); //public to all page in donor folder
			$data['title_active'] 	= ucfirst('dashboard');
			$data['title_active'] 	= ucfirst($page);

			$this->form_validation->set_rules('user_password', 'Password', 'required');

			if ($this->form_validation->run() == false) {

				$this->load->view($page,$data);
			}else{
				$userID = $this->session->userdata('userID');
				$password = $this->input->post('user_password');
				$unloack = $this->data_model->unlockuser($userID,$password);

				if($unloack->num_rows() > 0){
			        $data  = $unloack->row_array();

			        if ($data['username'] == $this->session->userdata('username')) {
			        	$this->acessdenie($this->session->userdata('actyID'));
			        }else{
			        	$this->session->set_flashdata('error','Wrong password');
						//$this->load->view($page,$data);
						redirect(base_url('lock'));
			        }
			    }else{
					$this->session->set_flashdata('error','Wrong password');
					//$this->load->view($page,$data);
					redirect(base_url('lock'));
				}
			}

		}else{
			$this->acessdenie($this->session->userdata('actyID'));
		}
	}



	public function acessdenie($actyID = NULL){
		//echo "Access Denied";

		if ($actyID == "") {
			show_404();
		}else{

			if ($actyID ==  1) {
				//$this->session->set_flashdata('warning','You dont have access that page');
				redirect(base_url('admin'));

			}elseif($actyID == 2) {
				show_404();

			}elseif($actyID == 3) {
				show_404();

			}elseif($actyID == 4) {
				show_404();

			}elseif($actyID == 5) {
				//$this->session->set_flashdata('warning','You dont have access that page');
				redirect('donar');

			}elseif($actyID == 6){
				show_404();

			}else{
				show_404();
			}
		}
	}


	public function retunprofile_updates($actyID = NULL){
		//echo "Access Denied";

		if ($actyID == "") {
			show_404();
		}else{

			if ($actyID ==  1) {
				$this->session->set_flashdata('warning','You dont have access that page');
				//redirect(base_url('admin_prof'));
				$this->acessdenie($actyID);

			}elseif($actyID == 2) {
				show_404();

			}elseif($actyID == 3) {
				show_404();

			}elseif($actyID == 4) {
				show_404();

			}elseif($actyID == 5) {
				//$this->session->set_flashdata('warning','You dont have access that page');
				redirect('donar_prof');

			}elseif($actyID == 6){
				show_404();

			}else{
				show_404();
			}
		}
	}


	public function createsession($data)
	{

		if ($data['pammision'] === '1') {

			$sesdata = array(
	            'authID'  	=> $data['authID'],
	            'userID' 	=> $data['userID'],
	            'actyID' 	=> $data['actyID'],
	            'pammision' => $data['pammision'],
	            'logged_in' => TRUE
        	);

			$this->session->set_userdata($sesdata);

		}else{

			$sesdata = array('logged_in' => FALSE);
			$this->session->set_userdata($sesdata);
		}	

		return $this->session->set_userdata($sesdata);        
	}
	
	//logout user return to login page
	public function logout(){
		if ($this->session->userdata('actyID') == 1) 
		{
			$this->session->sess_destroy();
			redirect(base_url('login'));

		}else{
			$this->session->sess_destroy();
			redirect(base_url());
		}
		
	}




}
?>