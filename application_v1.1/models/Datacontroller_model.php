<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/

	class Datacontroller_model extends CI_Model
	{


		// File upload path 

		public function path(){

			$path = base_url(); //http://localhost/TEST2/
			return 'assets/images/users/';
		}
    	

	//=================================== LOGIN =====================================================

		public function isusernamefound($username, $user_password){
			//Validate
			$this->db->where('username',$username);
			$this->db->where('password', $this->encrpty_password($user_password));

			$result = $this->db->get('authenticated_user',1);
			return $result;

		}

		public function unlockuser($userID,$user_password){
			$this->db->where('userID',$userID);
			$this->db->where('password', $this->encrpty_password($user_password));

			$result = $this->db->get('authenticated_user',1);
			return $result;
		}

	//=================================== LOGIN =====================================================
	/*
	**
	*/
	//=================================== ADMIN PAGES ===============================================

		//fetch donar admin data
		public function fetch_adminprof($user_id){
			$query = $this->db->join('access_type','access_type.actyID = tbl_user.actyID');
			$query = $this->db->join('authenticated_user','authenticated_user.userID = tbl_user.userID');
			$query = $this->db->get_where('tbl_user' , array('tbl_user.userID' => $user_id));
			return $query;
		}


		//get userimage
		public function getRows($userID){ 

	        $query = $this->db->where('userID',$userID);
			$query = $this->db->get('tbl_user',1);

			if($query->num_rows() > 0){
				return $query->row_array();
			}else{
				return false;
			}
    	}

    	//update image
    	public function updateimage($imgData, $userID){
    		if(!empty($imgData) && !empty($userID)){ 
	            // Add modified date if not included 
	             
	            // Update member data 
	    		$query = $this->db->where('userID',$userID);
	            $update = $this->db->update('tbl_user',$imgData); 
	             
	            // Return the status 
	            return $update?true:false; 
        	} 
        	return false; 
    	}


		//fetch user_list except donor
		public function user_list($user_id) {
			$query = $this->db->join('access_type','access_type.actyID = tbl_user.actyID');
			$query = $this->db->join('authenticated_user','authenticated_user.userID = tbl_user.userID');
			$query = $this->db->where('tbl_user.actyID <',5);
			$query = $this->db->where('tbl_user.userID !=',$user_id);
			$query = $this->db->get('tbl_user');
			return $query->result_array();
		}

		//list all user
		public function user_listall() {
			$query = $this->db->join('access_type','access_type.actyID = tbl_user.actyID');
			$query = $this->db->join('authenticated_user','authenticated_user.userID = tbl_user.userID');
			$query = $this->db->get('tbl_user');

			return $query;
			
		}
		// show access type
		public function showaccetyall(){
			$query = $this->db->get_where('access_type', array('actyID <' => 5,));
			return $query->result_array();
		}

		//register user
		public function insertuser($userregdata){
			$query = $this->db->insert('tbl_user',$userregdata);
			return $last_id = $this->db->insert_id();
		}

		//insert user in authentication
		public function insertAuthentication($authdata){
			$query = $this->db->insert('authenticated_user',$authdata);
		}

		//add category
		public function addcategory($category){
			$query = $this->db->insert('page_category',$category);
		}

		//delete category
		public function deletecategory($pacatID){
			$query = $this->db->where('pacatID', $pacatID);
			$query = $this->db->delete('page_category');
		}

		//reset userdata
		public function reset_user($userID,$resetData){
			$query = $this->db->where('userID',$userID);
			$query = $this->db->update('authenticated_user',$resetData);
		}

		//delete user
		public function delete_user($userID){
			$query = $this->db->where('authenticated_user.userID',$userID);
			$query = $this->db->delete('authenticated_user');

			$query = $this->db->where('tbl_user.userID',$userID);
			$query = $this->db->delete('tbl_user');
		}

		//activate/deactivate user
		public function permit_user($userID,$pamissdata){
			$this->db->where('userID',$userID);
			$this->db->update('authenticated_user',$pamissdata);
		}

	
		//fetch all pages_content
		public function pages_contentall(){
			$query = $this->db->join('page_category','page_category.pacatID = pages_content.pacatID');
			$query = $this->db->order_by('posted_date', 'DESC');
			$query = $this->db->get('pages_content');
			return $query->result_array();
		}

		//add content
		public function addcontent($contentData){
			$this->db->insert('pages_content',$contentData);
		}

		//edit content
		public function editcontent($pacontID,$contentUpdate){
			$this->db->where('pacontID',$pacontID);
			$this->db->update('pages_content',$contentUpdate);
		}

		//delete content
		public function delete_content($pacontID){
			$query = $this->db->where('pacontID',$pacontID);
			$query = $this->db->delete('pages_content');
		}

		//fetch page content by ID
		public function findpageContentbyID($pacontID){
			$query = $this->db->where('pacontID',$pacontID);
			$query = $this->db->get('pages_content');
			return $query->result_array();
		}

		//activate/deactivate content in page
		public function permit_content($pacontID,$pamissdata){
			$this->db->where('pacontID',$pacontID);
			$this->db->update('pages_content',$pamissdata);
		}

		//fetch all pages_category
		public function pages_categoryall(){
			$query = $this->db->get('page_category');
			return $query->result_array();
		}


		public function imgbygalleryID($galleryID){
			$query = $this->db->where('galleryID',$galleryID);
			$query = $this->db->get('gallery',1);
			
			if($query->num_rows() > 0){
				return $query->row_array();
			}else{
				return false;
			}
		}


		//fetch all galley to admin
		public function galleryall(){
			$query = $this->db->join('page_category','page_category.pacatID = gallery.pacatID');
			$query = $this->db->order_by('posted_at','DESC');
			$query = $this->db->get('gallery');
			return $query->result_array();
		}

		//add gallery
		public function addpicgallery($newimgGallery){
			$this->db->insert('gallery', $newimgGallery);
		}


		public function updateGalley($galleryID,$newupdateGallery){
			$query = $this->db->where('galleryID',$galleryID);
			$query = $this->db->update('gallery',$newupdateGallery);
		}

		//delete picture in gallery
		public function delete_galley($galleryID){
			$query = $this->db->where('galleryID',$galleryID);
			$query = $this->db->delete('gallery');
		}

		//block picture in gallery
		public function block_galley($galleryID,$parmitArray){
			$query = $this->db->where('galleryID',$galleryID);
			$query = $this->db->update('gallery', $parmitArray);
		}

		//enable picture in gallery
		public function allow_galley($galleryID,$parmitArray){
			$query = $this->db->where('galleryID',$galleryID);
			$query = $this->db->update('gallery', $parmitArray);
		}


		
		

	//=================================== ADMIN PAGES ===============================================
    /*
	**
	*/
	//=================================== DONAR PAGES ===============================================

		//fetch donar frofile data
		public function fetch_donarprof($user_id){
			$query = $this->db->join('bloodgroup','bloodgroup.bgroupID = tbl_user.bgroupID');
			$query = $this->db->join('authenticated_user','authenticated_user.userID = tbl_user.userID');
			$query = $this->db->join('access_type','access_type.actyID = tbl_user.actyID');
			$query = $this->db->get_where('tbl_user' , array('tbl_user.userID' => $user_id));
			return $query;
		}
			
			
		//tetch donation details
		public function fetch_donation($use_id){

			$query = $this->db->join('tbl_user','tbl_user.userID = donation.userID');
			$query = $this->db->join('camp','camp.campID = donation.campID');
			$query = $this->db->get_where('donation', array('donation.userID' => $use_id));
			return $query->result_array();
		}

		//tetch request details
		public function fetch_request(){

			$status = 'request';
			
			$query = $this->db->join('tbl_user','tbl_user.userID = requestes.userID');
			$query = $this->db->join('bloodgroup','bloodgroup.bgroupID = tbl_user.bgroupID');
			$query = $this->db->order_by('requestes_at','DESC');
			$query = $this->db->get_where('requestes' , array('request_status' => $status));
			return $query->result_array();
		}

	//=================================== DONAR PAGES ===============================================
    /*
	**
	*/
	//=================================== DOCTOR PAGES ==============================================





	//=================================== DOCTOR PAGES ==============================================
    /*
	**
	*/
	//=================================== NURSE PAGES ===============================================




	//=================================== NURSE PAGES ===============================================
    /*
	**
	**
	**
	*/
	//=================================== PUBLIC FUNCTIONS ==========================================
		//Encrpy password
		public function encrpty_password($password){
			$enc_password = md5($password);
			return $enc_password;
		}

		//find user by using three argument
		public function finduserby3arg($user_id,$username,$password){
			$query = $this->db->where('userID',$user_id);
			$query = $this->db->where('username',$username);
			$query = $this->db->where('password',$this->encrpty_password($password));
			$query = $this->db->get('authenticated_user',1);

			return $query;
		}

		//find user by only userID in tbl_user
		public function finduserbyID($user_id){
			$query = $this->db->where('userID',$user_id);
			$query = $this->db->get('tbl_user',1);
			return $query;
		}

		//send data to tbl_user
		public function sendEditarry($user_id,$eduserData){
			$query = $this->db->where('userID', $user_id);
			$query = $this->db->update('tbl_user', $eduserData);
		}


		//edit username
		public function updateusername($userID,$new_username){
			$query = $this->db->where('userID', $userID);
			$query = $this->db->update('authenticated_user', $new_username);
		}

		//edit username
		public function updateuserimage($userID,$new_userimage){
			$query = $this->db->where('userID', $userID);
			$query = $this->db->update('tbl_user', $new_userimage);
		}


		//headers
		public function someTittlestaffs(){

			//Public
			$title 			= "BBMS ";
			$main_p 		= "Home";
			$active_class 	= "active";
			$title_full		= "BLOOD-BANK MS";

			$someTittlestaffsarry = array(
				'title'        => $title,
				'main_p'       => $main_p,
				'active_class' => $active_class,
				'title_full'   => $title_full
			);

			return $someTittlestaffsarry;
		}

	
		//address prosesing part
	    public function returnDistrict($address = NULL){

	    	if($address != NULL){
				$address = explode(",", $address);
	    		return $address[0];
	    	}else{
	    		return false;
	    	}
	    	
	    }

		
	    public function returnRegion($address = NULL){

	    	if($address != NULL){
				$address = explode(",", $address);
	    		return $address[1];
	    	}else{
	    		return false;
	    	}
	    }


		//date processing part
	    public function returnYear($date){
			$yearfromdate = explode("-", $date);
			return $yearfromdate[0];
		}

		public function returnMonrth($date){
			$monthfromdate = explode("-", $date);
			return $monthfromdate[1];
		}

		public function returnDay($date){
			$dayfromdate = explode("-", $date);
			return $dayfromdate[2];
		}


	    //break timestamp
		public function date_break($date){

			$year 	  = $this->returnYear($date);
			$month 	  = $this->returnMonrth($date);
			$day 	  = $this->returnDay($date);

			//$date = explode("-", $timestamparray[0]);
			//$time = explode(":", $timestamparray[1]);


			// $hour	=	$time[0];
			// $min	=	$time[1];
			// $sec 	=	$time[2];

			//$diff_time - $hour);
			$diff_date = (date("d") - $day);

			if($month == 2){

				if(date("m") == $month){
					if($diff_date == 0){
						$info_day = $info_day = "today";
					}else if($diff_date == 1){
						$info_day = $info_day = "yesterday";
					}else{
						$info_day = infoDay($day,$this->dayFormat($day),$this->monthFormat($month),$year);
					}
				}else{
					if($diff_date == -29 || $diff_date == -28){
						if(date("m") - $month == 1){
							$info_day = "yesterday";
						}else{
							$info_day = $this->infoDay($day,$this->dayFormat($day),$this->monthFormat($month),$year);
						}
					}else{
						$info_day = $this->infoDay($day,$this->dayFormat($day),$this->monthFormat($month),$year);
					}
				}	
			}else{

				if(date("m") == $month){
					if($diff_date == 0){
						$info_day = $info_day = "today";
					}else if($diff_date == 1){
						$info_day = "Yesterday";
					}else{
						$info_day = $this->infoDay($day,$this->dayFormat($day),$this->monthFormat($month),$year);
					}
				}else{
					if($diff_date == -30 || $diff_date == -29){
						if(date("m") - $month == 1){
							$info_day = "Yesterday";
						}else{
							$info_day = $this->infoDay($day,$this->dayFormat($day),$this->monthFormat($month),$year);
						}
					}else{
						$info_day = $this->infoDay($day,$this->dayFormat($day),$this->monthFormat($month),$year);
					}
				}
			}

		  	return $info_day;
		}


			//return info_day
		public function infoDay($day,$sup,$fmonth,$year){
			return $info_day = $day.$sup.' '.$fmonth.','.$year;
		}



		public function dayFormat($day){
		  if ($day == 1 || $day == 21 || $day == 31) {
		    $sup = "<sup>st</sup>";

		  }else if($day == 2 || $day == 22){
		    $sup = "<sup>nd</sup>";

		  }else if($day == 3 || $day == 23){
		    $sup = "<sup>rd</sup>";
		  }else{
		    $sup = "<sup>th</sup>";
		  }
		  return $sup;
		}

		public function monthFormat($month) {
		  if($month == 1){
		    $mnth = 'Jan';
		  }else if($month == 2){
		    $mnth = 'Feb';
		  }else if($month == 3){
		    $mnth = 'Mar';
		  }else if($month == 4){
		    $mnth = 'Apr';
		  }else if($month == 5){
		    $mnth = 'May';
		  }else if($month == 6){
		    $mnth = 'Jun';
		  }else if($month == 7){
		    $mnth = 'Jul';
		  }else if($month == 8){
		    $mnth = 'Aug';
		  }else if($month == 9){
		    $mnth = 'Sep';
		  }else if($month == 10){
		    $mnth = 'Oct';
		  }else if($month == 11){
		    $mnth = 'Nov';
		  }else {
		    $mnth = 'Des';
		  }

		  return $mnth;
		}


		//return current date
		public function toDay(){
			return date('Y-m-d');
		}


		//admin default password
		public function returnDefaultpass($actyID){
			if($actyID == 1){
				$Defaultpass = '123456';

			}else if($actyID > 1 && $actyID < 5){
				$Defaultpass = 'staff1234';

			}else{
				$Defaultpass = 'bbms123';
				
			}

			return $this->encrpty_password($Defaultpass);
		}




	//=========== SOME TOTAL=================
	

	//headers
	public function countTotal(){

		//Menu bar
		$TotalActiveContent 	= $this->db->get_where('pages_content',array('papamission' => 1))->num_rows();
		$TotalBlockedContent 	= $this->db->get_where('pages_content',array('papamission' => 0))->num_rows();
		$TotalActiveGalley 		= $this->db->get_where('gallery',array('pammision' => 1))->num_rows();
		$TotalBlockedGalley 	= $this->db->get_where('gallery',array('pammision' => 0))->num_rows();
		$Totalpagecategory 		= $this->db->get_where('page_category')->num_rows();

		//dashboard
		$TotalAdmin = $this->db->get_where('tbl_user',array('actyID' => 1))->num_rows();
		$TotalDoctor = $this->db->get_where('tbl_user',array('actyID' => 2))->num_rows();
		$TotalLabtech = $this->db->get_where('tbl_user',array('actyID' => 3))->num_rows();
		$TotalNurse = $this->db->get_where('tbl_user',array('actyID' => 4))->num_rows();
		$TotalDonar = $this->db->get_where('tbl_user',array('actyID' => 5))->num_rows();
		$TotalOthers = $this->db->get_where('tbl_user',array('actyID' => 6))->num_rows();

		//array
		$countTotal = array(
			'taContent' => $TotalActiveContent,'tbContent' => $TotalBlockedContent,
			'taGalley' => $TotalActiveGalley,'tbGalley'=> $TotalBlockedGalley,
			'tpcategory' => $Totalpagecategory,'tAdmin'=>$TotalAdmin,'tDoctor'=>$TotalDoctor,
			'tLabtech'=>$TotalLabtech,'tNurse'=>$TotalNurse,'tDonar'=>$TotalDonar,'tOthers'=>$TotalOthers
		);

		return $countTotal;
	}


	public function countTotalbloodunit($unit){
		$units = 0;
		$units = $units + $unit;
		return $units;
	}

}