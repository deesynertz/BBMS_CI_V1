<?php  

	/**
	 * 
	 */
	class Main_model extends CI_Model
	{

	//=================================== HOME START ==============================================
			
		/*
		**	INSERT DATA
		*/

		public function isert_data($data)
		{
			$this->db->insert("contacts", $data);
		}

		/*
		**	REGISTER
		*/
		public function register_user($enc_password){

			//user data array
			$b_id = 3;
			$data = array(
			 	'name' => $this->input->post('name'),
			 	'mobile' => $this->input->post('mobile'),
			 	'b_id' => $b_id,
			 	'email' => $this->input->post('email'),
			 	'pwd' => $enc_password
			);

//'name' => $this->input->post('name').",".$this->input->post('name'),
			//Inseet user

			return $this->db->insert('donarregistration', $data);

		}


		/*
		**	FETCH DATA
		*/

		public function pages_content_data(){
			//first way retriv all record in table
			//$query = $this->db->get("pages_content"); // select * from pages_content; (1)
			//$query = $this->db->query("SELECT * FROM pages_content ORDER BY page_id ASC");(2)
			$query = $this->db->select("*"); //(3)
			$query = $this->db->where('papamission', 1);
			$query = $this->db->from("pages_content");
			$query = $this->db->get();
			return $query;
		}


		public function fetch_contact_kind()
		{
			$query = $this->db->query("SELECT * FROM kind_of_contact ORDER BY kind_id ASC");
			return $query;
		}

		public function connect_us()
		{
			$query = $this->db->get("contact_us"); // select * from pages_content; (1)
			return $query;
		}


		public function fetch_galley()
		{
			$query = $this->db->where('pammision',1);
			$query = $this->db->get("gallery");
			return $query;
		}

	//=================================== HOME END ===============================================

	//=================================== CAMPS START ============================================

		//return number from compus table 
		public function count_campsall(){
			
			$query = $this->db->get("camp");
			return $query->num_rows();
		}

		public function get_Camps($camp_id = FALSE){

			if ($camp_id === FALSE) {
				$query = $this->db->get('camp');
				return $query->result_array();
			}
			
			//if camp_id passed to the function

			$query = $this->db->get_where('camp', array('campID' => $camp_id));
			return $query->row_array();
		}
	//=================================== CAMPS ENDS ============================================

	//=================================== DONOR START ===========================================

	//=================================== DONOR END =============================================



	//=================================== LOGIN START ===========================================			/*
		

	public function user_login($username, $user_password)
	{
		//Validate
		$this->db->where('username',$username);
		$this->db->where('password', $user_password);

		$result = $this->db->get('authenticated_user',1);
		return $result;

	}

	//=================================== LOGIN END =============================================



	}




?>