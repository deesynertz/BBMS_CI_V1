
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Datacontroller extends CI_Controller
{
	
	public function __construct(){
		parent:: __construct();

			if($this->session->userdata('logged_in') !== TRUE){
			//$this->session->set_flashdata('warning','Please login fist to get access');
      		redirect(base_url());
    	}

		$this->load->model('datacontroller_model','data_model');
	}



	//edit userimage
	public function aditimage($userID){
		$this->form_validation->set_rules('userimage', 'Image', 'required');

		if ($this->form_validation->run()== false) {
			//Image field required
			$this->session->set_flashdata('error','Image field required');
			redirect(base_url('profile'));
		}else{

			$config['path'] = 'http://localhost/CI/assets/images/users/';
			$config['allowed_type'] = 'jpg|png|jpeg';


			//print_r($config['path']);
			//$arryData = array('userPic' => $this->input->post('userimage'));
			//send data
			//$this->dataM->updateuserimage($userID,$arryData)
			//set flash message
			//$this->session->set_flashdata('success','Your Image changed');
			//call function to update session infomation
			//$this->setuserdatabyID($this->session->userdata('userID'));
			//redirect page
			//redirect(base_url('donar/profile'));
		}
	}

}