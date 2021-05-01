<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {


	//constructor
	function __construct()
	{
		parent:: __construct(); 

		$this->load->model('main_model','main_model');
		$this->load->model('datacontroller_model','data_model');
		
	}

	//functtions 
	public function index($page = 'home')
	{

		if($this->session->userdata('logged_in') == TRUE)
		{
			redirect(base_url('auth/acessdenie/'.$this->session->userdata('actyID')));
			
    	}else{

			//check if page exist
			if (!file_exists(APPPATH.'views/homepage/'.$page.'.php')) 
			{
				show_404();

			}else{

				$data['all']			= $this->data_model->someTittlestaffs();
				$data['title_active'] 	= ucfirst($page);

				$data['random']			= 'BB-'.mt_rand(10000,99999);
				
				//option array variable = 	$this->model_class->name_of_function_in_model();
				$data['fetch_data'] 	= 	$this->main_model->pages_content_data();
				//$data['kind_content'] 	= 	$this->main_model->fetch_contact_kind();
				$data['connect_us'] 	= 	$this->main_model->connect_us();
				$data['fetch_galley']	= 	$this->main_model->fetch_galley();

				//Camps model Functions
				$data['count_campsall']	=	$this->main_model->count_campsall();
				$data['fetch_Camps']	= 	$this->main_model->get_Camps();

				//$data['region'] 		=   $this->sharedM->returnRegion($address);
				//$data['district'] 		=   $this->sharedM->returnDistrict($address);



				//regitster
				//$data['register_user']	= 	$this->main_model->register_user();

				$this->load->view('templates/header',$data);
				$this->load->view('homepage/'.$page);
				$this->load->view('templates/footer');

			}
    	}
	}




//=============================== CAMPS ========================================

	//load data from the database after user select specific camp
	public function camps_view($camp_id = NULL){

		//model Functions
		$data['count_campsall']	= $this->main_model->count_campsall();
		$data['fetch_Camp']		= $this->main_model->get_Camps($camp_id);

		if (empty($data['fetch_Camp'])) 
		{
			show_404();

		}else{

			$data['all']			= $this->data_model->someTittlestaffs();
			$data['title_active']   = ucfirst('camp');
			$data['campbyIDshow'] 	= ucfirst($data['fetch_Camp']['campTitle']);

			// $this->load->view('folder/pagename',$data);
			
			$this->load->view('templates/header',$data);
			$this->load->view('homepage/camp_View');
			$this->load->view('templates/footer');
		}
	}



	//gather here information from the models


	public function form_validation()
	{
		//echo "OK";

		$this->load->library('form_validation');
		// fr more than one rules us '|' in parameter three eg 'required|alpha|ets'
		$this->form_validation->set_rules("full_name", "Full name", 'required'); 
		$this->form_validation->set_rules("phonenumber", "phone number", 'required');

		//if rule applied successful

		if ($this->form_validation->run()) 
		{
			#true
			$data = array(
			
				#"column_name" => $this->inpurt->post("ipurt_name");

				"full_name" => $this->input->post("full_name"),
				"email" => $this->input->post("email"), 
				"mobile" => $this->input->post("phonenumber"),
				"subj" => $this->input->post("subject"),
				"kind_id" => $this->input->post("kind_of")
				
			);

			$this->main_model->isert_data($data);

			redirect($this->index());
		}
		else
		{
			//false
			$this->index();


		}
		
	}


}